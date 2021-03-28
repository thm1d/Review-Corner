<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;
use App\ViewModels\MoviesViewModel;
use App\ViewModels\MovieViewModel;
use App\ViewModels\ReviewViewModel;

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

        // $genres = collect($genresArray)->mapWithKeys(function ($genre){
        //     return [$genre['id'] => $genre['name']];
        // });

        //dump($trendingMovies);

        $viewModel = new MoviesViewModel(
            $trendingMovies, 
            $popularMovies, 
            $nowPlayingMovies, 
            $genres,
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
            ->get('https://api.themoviedb.org/3/movie/'.$id.'?append_to_response=credits,videos,images,reviews,similar')
            ->json();

        $apikey = 'ef1c5717';


        if ($movie['imdb_id'] != "") {
            $imdb = Http::get('http://www.omdbapi.com/?i='.$movie['imdb_id'].'&apikey='.$apikey)
            ->Json();
        }
        else {
            $imdb = $movie;
        }
        
        //dump($reviews);

        $viewModel = new MovieViewModel(
            $movie, 
            $imdb,
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
}
