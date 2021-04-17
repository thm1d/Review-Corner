<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use App\Models\User;
use App\Models\Movie;
use App\Models\Tv;
use App\Models\Rating;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user()->toArray();
        dump($user);

        return view('profile.dashboard', [
            'user' => $user,
        ]);
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

            $movies[] = $movieSingle;
        }

        $userListTv = User::where('id', $user_id)->first()->watchlist_tv;

        //dump($userListMovie);

        $tvShows = [];

        foreach (array_slice($userListTv,1) as $tvShow) {
            $tvSingle = http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/tv/'. $tvShow)
            ->json();

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

        return view('profile.ratings',[
                'movies' => $movies,
                'tvShows' => $tvShows,
        ]);
    }

    public function rankUpdate(Request $request)
    {
        $user = Auth::user();
        $user_id = $user->id;
        $prevBalance = $user->balance;
        $newBalance1 = $prevBalance - $request->rank;
        $newBalance2 = $prevBalance + ($user->rank_value - $request->rank) / 2;
        $rankName = 'bronze';
        if ($request->email !== $user->email) {
            return redirect()->back()->with('message', 'Email is not correct');
        } else if ($newBalance1 < 0) {
            return redirect()->back()->with('message', 'Not Enough Balance');
        } else if ( $request->rank <= $user->rank_value ) {
            if ($request->rank === '200') {
                $rankName = 'silver';
            } else if ($request->rank === '300') {
                $rankName = 'gold';
            } else if ($request->rank === '500') {
                $rankName = 'platinum';
            } else if ($request->rank === '800') {
                $rankName = 'diamond';
            }

            $user->update([
                'rank' => $rankName,
                'rank_value' => $request->rank,
                'balance' => $newBalance2,
            ]);

            $url = URL::route('rank.update', ['#2']);

            $msg = 'Congratulations! You are now a '. ucfirst($rankName) .' Member.';
            return redirect()->to($url)->with('message', $msg);
        } else {

            if ($request->rank === '200') {
                $rankName = 'silver';
            } else if ($request->rank === '300') {
                $rankName = 'gold';
            } else if ($request->rank === '500') {
                $rankName = 'platinum';
            } else if ($request->rank === '800') {
                $rankName = 'diamond';
            }

            $user->update([
                'rank' => $rankName,
                'rank_value' => $request->rank,
                'balance' => $newBalance1,
            ]);

            $url = URL::route('rank.update', ['#2']);

            $msg = 'Congratulations! You are now a '. ucfirst($rankName) .' Member.';
            return redirect()->to($url)->with('message', $msg);
        }
    }
}
