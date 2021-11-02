<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Movie;
use App\Models\Tv;
use App\Models\Rating;
use App\Models\Review;
use App\Models\Contact;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->hasRole('user')) {
            $user = Auth::user()->toArray();

            $userName = explode(" ", $user['name']);
            //dump(Auth::user());

            return view('profile.dashboard', [
                'user' => $user,
                'userName' => $userName,
            ]);
        } elseif(Auth::user()->hasRole('admin')) {
            return view('admin.index');
        } elseif(Auth::user()->hasRole('superadmin')) {
            return view('superadmin.dashboard');
        }
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //dump($request);

        if (Auth::user()) {
            $user = User::whereId($id)->update([
                'name' => $request->first_name . ' ' . $request->last_name,
                'email' => $request->email_address,
                'gender' => $request->gender,
                'current_address' => $request->current_address,
                'permanent_address' => $request->permanent_address,
                'birthday' => $request->birthday,
                'mobile' => $request->mobile,
            ]);
            return redirect()->back()->with('msg', 'Profile Updated!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }

    public function showList()
    {
        $user_id = Auth::user()->id;

        $userListMovie = User::where('id', $user_id)->first()->watchlist_movie;

        //dump($userListMovie);

        $movies = [];

        foreach (array_slice($userListMovie,1) as $movie) {
            $movieSingle = http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/'. $movie)
            ->json();

            $apikey = 'ef1c5717';


            if ($movieSingle['imdb_id'] != "") {
                $imdb = Http::get('http://www.omdbapi.com/?i='.$movieSingle['imdb_id'].'&apikey='.$apikey)
                ->Json();

                $movieSingle['rated'] = $imdb['Rated'];
                $movieSingle['imdbRating'] = $imdb['imdbRating'];
                $movieSingle['Genre'] = $imdb['Genre'];
                $movieSingle['stars'] = $imdb['Actors'];
            }
            $movies[] = $movieSingle;
        }

        $userListTv = User::where('id', $user_id)->first()->watchlist_tv;

        //dump($userListMovie);

        $tvShows = [];

        foreach (array_slice($userListTv,1) as $tvShow) {
            $tvSingle = http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/tv/'. $tvShow)
            ->json();

            $apikey = 'ef1c5717';


            if ($tvSingle['external_ids']['imdb_id'] != "") {
                $imdb = Http::get('http://www.omdbapi.com/?i='.$tvSingle['external_ids']['imdb_id'].'&apikey='.$apikey)
                ->Json();

                $tvSingle['rated'] = $imdb['Rated'];
                $tvSingle['imdbRating'] = $imdb['imdbRating'];
                $tvSingle['Genre'] = $imdb['Genre'];
                $tvSingle['stars'] = $imdb['Actors'];
                $tvSingle['runtime'] = $imdb['Runtime'];
            }

            $tvShows[] = $tvSingle;
        }

        //dd($tvShows);
        
        return view('profile.watchlist',[
            'movies' => $movies,
            'tvShows' => $tvShows,
        ]);
        
    }

    public function showRatings()
    {
        $user_id = Auth::user()->id;

        $userRatings = collect(DB::table('ratings')
                            ->join('movies', 'ratings.rateable_id', '=', 'movies.id')->get());

        if ($userRatings != null)
        {
            $userRatings = $userRatings->toArray();

            $userRatingsMovie = [];
            foreach ($userRatings as $key => $value)
            {
                if (($value->rateable_type === 'App\Models\Movie') and ($value->user_id === $user_id))
                {
                    $userRatingsMovie[] = json_decode(json_encode($value), true);
                }
            }
        }
        else 
        {
            $userRatingsMovie = [];
        }

        $movies = [];

        foreach ($userRatingsMovie as $movie) {
            $movieSingle = http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/'. $movie['movie_id'])
            ->json();

            $apikey = 'ef1c5717';


            if ($movieSingle['imdb_id'] != "") {
                $imdb = Http::get('http://www.omdbapi.com/?i='.$movieSingle['imdb_id'].'&apikey='.$apikey)
                ->Json();

                $movieSingle['rated'] = $imdb['Rated'];
                $movieSingle['Genre'] = $imdb['Genre'];
                $movieSingle['stars'] = $imdb['Actors'];
            }

            $movieSingle['rating'] = $movie['rating'];
            $movieSingle['rated_on'] = $movie['updated_at'];
            

            $movies[] = $movieSingle;
        }

        //dump($movies);

        $userRatings = collect(DB::table('ratings')
                            ->join('tvs', 'ratings.rateable_id', '=', 'tvs.id')->get());

        //dd($userRatings->toArray());

        if ($userRatings != null)
        {
            $userRatings = $userRatings->toArray();

            $userRatingsTv = [];

            foreach ($userRatings as $key => $value)
            {
                if (($value->rateable_type === 'App\Models\Tv') and ($value->user_id === $user_id) )
                {
                    $userRatingsTv[] = json_decode(json_encode($value), true);
                }
            }
        }
        else 
        {
            $userRatingsTv = [];
        }

        $tvShows = [];

        foreach ($userRatingsTv as $tvShow) {
            $tvSingle = http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/tv/'. $tvShow['tv_id']. '?append_to_response=external_ids')
            ->json();

            $apikey = 'ef1c5717';


            if ($tvSingle['external_ids']['imdb_id'] != "") {
                $imdb = Http::get('http://www.omdbapi.com/?i='.$tvSingle['external_ids']['imdb_id'].'&apikey='.$apikey)
                ->Json();

                $tvSingle['rated'] = $imdb['Rated'];
                $tvSingle['Genre'] = $imdb['Genre'];
                $tvSingle['stars'] = $imdb['Actors'];
                $tvSingle['runtime'] = $imdb['Runtime'];
            }

            $tvSingle['rating'] = $tvShow['rating'];
            $tvSingle['rated_on'] = $tvShow['updated_at'];

            $tvShows[] = $tvSingle;
        }
        
        //dump($userRatingsTv);

        $userRatings = collect(DB::table('ratings')
                            ->join('games', 'ratings.rateable_id', '=', 'games.id')->get());

        if ($userRatings != null)
        {
            $userRatings = $userRatings->toArray();

            $userRatingsMovie = [];
            foreach ($userRatings as $key => $value)
            {
                if (($value->rateable_type === 'App\Models\Game') and ($value->user_id === $user_id))
                {
                    $userRatingsGame[] = json_decode(json_encode($value), true);
                }
            }
        }
        else 
        {
            $userRatingsGame = [];
        }

        $games = [];

        foreach ($userRatingsGame as $game) {
            $gameSingle = Http::withHeaders(config('services.igdb.headers'))
            ->withBody(
                "fields name, id, cover.url, first_release_date, platforms.abbreviation, rating,
                    slug, genres.name, aggregated_rating, summary;
                    where slug=\"{$game['game_slug']}\";
                ", "text/plain"
            )->post(config('services.igdb.endpoint'))
            ->json();

            $gameSingle[0]['rating'] = $game['rating'];
            $gameSingle[0]['rated_on'] = $game['updated_at'];
            $gameSingle[0]['coverImageUrl'] = Str::replaceFirst('thumb', 'cover_big', $gameSingle[0]['cover']['url']);
            $gameSingle[0]['platform'] = collect($gameSingle[0]['platforms'])->pluck('abbreviation')->implode(', ');
            

            $games[] = $gameSingle[0];
        }

        //dump($games);

        return view('profile.ratings',[
                'movies' => $movies,
                'tvShows' => $tvShows,
                'games' => $games,
        ]);

    }

}
