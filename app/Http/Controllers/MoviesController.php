<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use App\ViewModels\MoviesViewModel;
use App\ViewModels\MovieViewModel;
use App\ViewModels\ReviewViewModel;
use App\Models\User;
use App\Models\Rating;
use App\Models\Movie;
use App\Models\Review;


class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trendingMovies = http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/trending/movie/week')
        ->json()['results'];
        
        $popularMovies = http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/movie/popular')
        ->json()['results'];

        $nowPlayingMovies = http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/movie/now_playing')
        ->json()['results'];

        $genres = http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/genre/movie/list')
        ->json()['genres'];


        $gcounter = 1;
        $ycounter = 1;


        // $genres = collect($genresArray)->mapWithKeys(function ($genre){
        //     return [$genre['id'] => $genre['name']];
        // });

        //dump($trendingMovies);

        $viewModel = new MoviesViewModel(
            $trendingMovies, 
            $popularMovies, 
            $nowPlayingMovies, 
            $genres,
            $gcounter,
            $ycounter,
        );

        return view('movie.index', $viewModel);

        // return view('index', [
        //     'trendingMovies' => $trendingMovies,
        //     'popularMovies' => $popularMovies,
        //     'nowPlayingMovies' => $nowPlayingMovies,
        //     'genres' => $genres,
        // ]);
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
    public function store(Request $request, $movie_id)
    {
        $validator = Validator::make($request->all(), [
            'rating' => 'required',

        ]);

        if ($validator->fails()) {

            return redirect('/movies/'. $movie_id)
                        ->withErrors($validator)
                        ->withInput();
        }

        //dd($request);

        $movie = Movie::where('movie_id', $movie_id)->first();

        //dd($movie);

        if (is_null($movie)) {
            $movie = Movie::create([
                'user_id' => auth()->user()->id,
                'movie_id' => $movie_id,
                'rating' => $request->rating,
                'title' => $request->title,
            ]);

            
        }

        $movie->rateOnce($request->rating);
        Movie::first()->ratings;

        return redirect()->back();

        

        // //$movie2 = Movie::find($movie_id)->where('user_id', auth()->user()->id)->first();
        // //dd($movie);

        
        // $rating = $movie->ratings()->where('user_id', auth()->user()->id)->first();
        // //dd($rating);

        // if(!is_null($rating)){
        //     $rating = new Rating();
        //     $rating->rating =  $request['rating'];
        //     $rating->user_id = auth()->user()->id;
        //     $movie->ratings()->save($rating);
        //     return redirect()->back();
        // }
        // else{
        //     return redirect()->back()->with("You already made a review");
        // }

        //return redirect('/movies/'. $id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $movie = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/'.$id.'?append_to_response=credits,videos,images,reviews,similar')
            ->json();

        $apikey = env('OMDB_TOKEN');


        if ($movie['imdb_id'] != "") {
            $imdb = Http::get('http://www.omdbapi.com/?i='.$movie['imdb_id'].'&apikey='.$apikey)
            ->Json();
        }
        else {
            $imdb = $movie;
        }

        $user_id = Auth::user();
        //dd($user_id->id);
        $rating = "N/A";

        if($user_id !== null) {

            $movieID = Movie::where('movie_id', $id)->first();

            if ($movieID === null) {
                $movieID = Movie::create([
                    'movie_id' => $id,
                    'title' => $movie['title'],
                ]);

                $rating = "N/A";  
            }
            else {
                $checkID = $movieID['id'];

                $rating = Rating::where([
                    ['rateable_id', '=', $checkID],
                    ['rateable_type', '=', 'App\Models\Movie'],
                    ['user_id', '=', $user_id->id]
                    ])->first();

                if ($rating == null) {
                    $rating = "N/A";
                }
                else {
                    $rating = $rating->rating;
                }
                //dd($rating);

            }

        }

        $reviews = Review::where([['item_id', '=', $id],
            ['item_type', '=', 'movie'],
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

        //dump($userReviews);


        $viewModel = new MovieViewModel(
            $movie, 
            $imdb,
            $rating,
            $userReviews,
            
        );

        return view('movie.show', $viewModel);
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
        $prevList = $user->watchlist_movie;
        $newList = array($id);
        //dd($prevList, $newList, array_merge($prevList,$newList));
        if(!in_array($id, $prevList)) {
            
            $user->watchlist_movie = array_merge($prevList,$newList);
            $user->save();
            return redirect()->back()->with('message', 'Added to the List!');
        }
        else {
            return redirect()->back()->with('message', 'This Item is Already added!');
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
