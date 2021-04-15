<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use App\ViewModels\TvViewModel;
use App\ViewModels\TvShowViewModel;
use App\Models\User;
use App\Models\Rating;
use App\Models\Tv;
use App\Models\Review;

class TvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $onTheAirShows = http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/tv/on_the_air')
        ->json()['results'];

        $popularShows = http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/tv/popular')
        ->json()['results'];

        $topRatedShows = http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/tv/top_rated')
        ->json()['results'];

        $genres = http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/genre/tv/list')
        ->json()['genres'];

        // $genres = collect($genresArray)->mapWithKeys(function ($genre){
        //     return [$genre['id'] => $genre['name']];
        // });

        //dump($trendingMovies);

        $viewModel = new TvViewModel(
            $onTheAirShows, 
            $popularShows, 
            $topRatedShows, 
            $genres,
        );

        return view('tv.index', $viewModel);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $tv_id)
    {
        $validator = Validator::make($request->all(), [
            'rating' => 'required',

        ]);
        //dd($validator);

        if ($validator->fails()) {

            return redirect('/tv/'. $tv_id)
                        ->withErrors($validator)
                        ->withInput()->with('msg', '*Enter Your Rating!');
        }



        $tv = Tv::where('tv_id', $tv_id)->first();

        //dd($movie);

        //dd($tv);


        $tv->rateOnce($request->rating);
        Tv::first()->ratings;

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tvShow = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/tv/'.$id.'?append_to_response=credits,videos,images,reviews,external_ids,similar')
            ->json();

        //dump($movie);
        $apikey = 'ef1c5717';

        if ($tvShow['external_ids']['imdb_id'] != "") {
            $imdb = Http::get('http://www.omdbapi.com/?i='.$tvShow['external_ids']['imdb_id'].'&apikey='.$apikey)
            ->Json();
        }
        else {
            $imdb = $tvShow;
        }

        $user_id = Auth::user();
        //dd($user_id->id);
        $rating = "N/A";

        if($user_id !== null) {

            $tvID = Tv::where('tv_id', $id)->first();

            if ($tvID === null) {
                $tvID = Tv::create([
                    'tv_id' => $id,
                    'title' => $tvShow['name'],
                ]);

                $rating = "N/A";  
            }
            else {
                $checkID = $tvID['id'];

                $rating = Rating::where([
                    ['rateable_id', '=', $checkID],
                    ['rateable_type', '=', 'App\Models\Tv'],
                    ['user_id', '=', $user_id->id]
                    ])->first();

                if ($rating == null) {
                    $rating = "N/A";
                }
                else {
                    $rating = $rating->rating. '/5';
                }
                //dd($rating);

            }

        }

        $reviews = Review::where([['item_id', '=', $id],
            ['item_type', '=', 'tv'],
            ])->get();

        if ($reviews != null) {
            $reviews = $reviews->toArray();
        } 
        else {
            $reviews = null;
        }

        $userReviews = [];
        foreach ($reviews as $review) {
            $user = User::find($review['user_id'])->first();
            //dump($user->name);

            $userReviews[] = collect($review)->merge([
                'user_name' => $user->name,
                'created_at' => \Carbon\Carbon::parse($review['created_at'])->format('M d, Y'),
            ])->toArray();   
            //dump($review);
        }

        dump($userReviews);

        $viewModel = new TvShowViewModel(
            $tvShow, 
            $imdb,
            $rating,
            $userReviews,
        );

        return view('tv.show', $viewModel);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function storeList($id)
    {
        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        //dd($user);
        $prevList = $user->watchlist_tv;
        $newList = array($id);
        //dd($prevList, $newList, array_merge($prevList,$newList));
        if(!in_array($id, $prevList)) {
            
            $user->watchlist_tv = array_merge($prevList,$newList);
            $user->save();
            return redirect()->back()->with('message', 'Added to the List!');
        }
        else {
            return redirect()->back()->with('message', 'This Item is Already Added!');
        }
        
    }

    public function storeReview(Request $request, $id)
    {
        $user_id = Auth::user()->id;

        $review = Review::create([
                'user_id' => $user_id,
                'item_id' => $id,
                'item_type' => $request->type,
                'review' => $request->review,
            ]);
        return redirect()->back();
        
    }
}
