<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Game;
use App\Models\Rating;
use App\Models\Review;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('game.index');
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
    public function store(Request $request, $game_slug)
    {
        $validator = Validator::make($request->all(), [
            'rating' => 'required',

        ]);

        if ($validator->fails()) {

            return redirect('/games/'. $game_slug)
                        ->withErrors($validator)
                        ->withInput();
        }

        $game = Game::where('game_slug', $game_slug)->first();

        //dump($game);

        if (is_null($game)) {
            $game = Game::create([
                'user_id' => auth()->user()->id,
                'game_slug' => $game_slug,
                'rating' => $request->rating,
                'title' => $request->title,
            ]);

            
        }

        $game->rateOnce($request->rating);
        Game::first()->ratings;

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $game = Http::withHeaders(config('services.igdb.headers'))
            ->withBody(
                "fields name, id, cover.url, first_release_date, platforms.abbreviation, rating,
                    slug, involved_companies.company.name, genres.name, aggregated_rating, summary, websites.*, videos.*, screenshots.*, similar_games.cover.url, similar_games.name, similar_games.rating,similar_games.platforms.abbreviation, similar_games.slug;
                    where slug=\"{$slug}\";
                ", "text/plain"
            )->post(config('services.igdb.endpoint'))
            ->json();

        abort_if(!$game, 404);
        //dump($game[0]['id']);

        $user_id = Auth::user();
        //dd($user_id->id);
        $rating = "N/A";

        if($user_id !== null) {

            $gameID = Game::where('game_slug', $game[0]['slug'])->first();

            if ($gameID === null) {
                $gameID = Game::create([
                    'game_slug' => $game[0]['slug'],
                    'title' => $game[0]['name'],
                ]);

                $rating = "N/A";  
            }
            else {
                $checkID = $gameID['id'];

                $rating = Rating::where([
                    ['rateable_id', '=', $checkID],
                    ['rateable_type', '=', 'App\Models\Game'],
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

        $reviews = Review::where([['item_id', '=', $game[0]['id']],
            ['item_type', '=', 'game'],
            ])->get();

        if ($reviews != null) {
            $reviews = $reviews->toArray();
        } 
        else {
            $reviews = null;
        }
        //dump($game[0]['id']);

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

        return view('game.show', [
            'game' => $this->formatGameForView($game[0]),
            'userReviews' => $userReviews,
            'rating' => $rating,
        ]);
    }

    private function formatGameForView($game)
    {
        $game['videos'] = array_key_exists('videos', $game) ? $game['videos'][0]['video_id'] : null;
        return collect($game)->merge([
            'coverImageUrl' => Str::replaceFirst('thumb', 'cover_big', $game['cover']['url']),
            'genres' => collect($game['genres'])->pluck('name')->implode(', '),
            'involvedCompanies' => $game['involved_companies'][0]['company']['name'],
            'platforms' => collect($game['platforms'])->pluck('abbreviation')->implode(', '),
            'memberRating' => array_key_exists('rating', $game) ? round($game['rating']) : '0',
            'criticRating' => array_key_exists('aggregated_rating', $game) ? round($game['aggregated_rating']) : '0',
            'trailer' => 'https://youtube.com/embed/'. $game['videos'],
            'screenshots' => collect($game['screenshots'])->map(function ($screenshot) {
                return [
                    'big' => Str::replaceFirst('thumb', 'screenshot_big', $screenshot['url']),
                    'huge' => Str::replaceFirst('thumb', 'screenshot_huge', $screenshot['url']),
                ];
            })->take(9),
            'similarGames' => collect($game['similar_games'])->map(function ($game) {
                return collect($game)->merge([
                    'coverImageUrl' => array_key_exists('cover', $game)
                        ? Str::replaceFirst('thumb', 'cover_big', $game['cover']['url'])
                        : 'https://via.placeholder.com/264x352',
                    'rating' => isset($game['rating']) ? round($game['rating']) : null,
                    'platforms' => array_key_exists('platforms', $game)
                        ? collect($game['platforms'])->pluck('abbreviation')->implode(', ')
                        : null,
                ]);
            })->take(6),
            'social' => [
                'website' => collect($game['websites'])->first(),
                'facebook' => collect($game['websites'])->filter(function ($website) {
                    return Str::contains($website['url'], 'facebook');
                })->first(),
                'twitter' => collect($game['websites'])->filter(function ($website) {
                    return Str::contains($website['url'], 'twitter');
                })->first(),
                'instagram' => collect($game['websites'])->filter(function ($website) {
                    return Str::contains($website['url'], 'instagram');
                })->first(),
            ]
        ]);
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

    public function storeReview(Request $request, $slug)
    {
        $user_id = Auth::user()->id;

        //dump($request);

        $review = Review::create([
                'user_id' => $user_id,
                'item_id' => $request->game_id,
                'item_type' => $request->type,
                'review' => $request->review,
            ]);
        return redirect()->back();
        
    }
}
