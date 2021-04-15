<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\ViewModels\ActorsViewModel;
use App\ViewModels\ActorViewModel;
use App\Models\Actor;
use App\Models\Rating;
use App\Models\Review;
use App\Models\User;

class ActorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($page = 1)
    {
        $popularActors = http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/person/popular?page='. $page)
        ->json()['results'];

        //dump($popularActors);

        $viewModel = new ActorsViewModel(
            $popularActors, 
            $page,  
        );

        return view('actor.index', $viewModel);
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
    public function store(Request $request, $actor_id)
    {
        $validator = Validator::make($request->all(), [
            'rating' => 'required',

        ]);

        if ($validator->fails()) {

            return redirect('/actors/'. $actor_id)
                        ->withErrors($validator)
                        ->withInput();
        }

        $actor = Actor::where('actor_id', $actor_id)->first();

        dump($actor);

        if (is_null($actor)) {
            $actor = Actor::create([
                'user_id' => auth()->user()->id,
                'actor_id' => $actor_id,
                'rating' => $request->rating,
                'name' => $request->title,
            ]);

            
        }

        $actor->rateOnce($request->rating);
        Actor::first()->ratings;

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
        $actor = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/person/'.$id)
            ->json();

        $social = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/person/'.$id.'/external_ids')
            ->json();

        $credits = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/person/'.$id.'/combined_credits')
            ->json();

        $user_id = Auth::user();
        //dd($user_id->id);
        $rating = "N/A";

        if($user_id !== null) {

            $actorID = Actor::where('actor_id', $id)->first();

            if ($actorID === null) {
                $actorID = Actor::create([
                    'actor_id' => $id,
                    'name' => $actor['name'],
                ]);

                $rating = "N/A";  
            }
            else {
                $checkID = $actorID['id'];

                $rating = Rating::where([
                    ['rateable_id', '=', $checkID],
                    ['rateable_type', '=', 'App\Models\Actor'],
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
            ['item_type', '=', 'actor'],
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


        $viewModel = new ActorViewModel(
            $actor,
            $social,
            $credits,
            $rating,
            $userReviews,
        );
        return view('actor.show', $viewModel);
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
