<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $popularMovies = http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/movie/popular')
        ->json()['results'];

        $nowPlayingMovies = http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/movie/now_playing')
        ->json()['results'];

        $genresArray = http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/genre/movie/list')
        ->json()['genres'];

        $genres = collect($genresArray)->mapWithKeys(function ($genre){
            return [$genre['id'] => $genre['name']];
        });

        dump($nowPlayingMovies);

        return view('index', [
            'popularMovies' => $popularMovies,
            'nowPlayingMovies' => $nowPlayingMovies,
            'genres' => $genres,
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

        $movie = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/'.$id.'?append_to_response=credits,videos,images')
            ->json();

        $apikey = 'ef1c5717';


        $imdb = Http::get('http://www.omdbapi.com/?i='.$movie['imdb_id'].'&apikey='.$apikey)
            ->Json();

        // $year = substr($movie['release_date'],0,4);
        // if ($imdb_info['Response'] == "True") {
        //     foreach ($imdb_info['Search'] as $list) {
        //         # code...
        //         if ( $list['Year'] == $year) {
        //             $imdb_id = $list['imdbID'];
        //         }
        //     }

        //     $imdb = Http::withToken($apikey)
        //         ->get('http://www.omdbapi.com/?i='.$imdb_id.'&apikey=ef1c5717')
        //         ->Json();

        //     dump($movie);
        // }
        // else {
        //     $imdb = $movie;
        //     dump($imdb);
        // }
        dump($imdb);

        return view('show', [
            'movie' => $movie,
            'imdb' => $imdb,
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
}
