<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $upcomingMovies = http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/movie/upcoming')
        ->json()['results'];

        $videos = [];

        foreach ($upcomingMovies as $movie) {
            $video = http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/movie/'. $movie['id']. '/videos')
        ->json()['results'];

            $videos[] = $video[0];
            if (count($videos) >10) {
                break;
            }
        }

        dump($videos);

        $release_date1 = Carbon::now()->subMonths(1)->format('Y-m-d');
        $release_date2 = Carbon::now()->format('Y-m-d');
        $release_date3 = Carbon::now()->subDays(7)->format('Y-m-d');

        $moviesInTheater = http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/discover/movie?primary_release_date.gte='. $release_date1 .'&primary_release_date.lte='. $release_date2)
        ->json()['results'];

        $genresArray = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/genre/movie/list')
            ->json()['genres'];

        // $genres = collect($genresArray)->mapWithKeys(function ($genre) {
        //     return [$genre['id'] => $genre['name']];
        // });

        //dump($moviesInTheater);

        $showsOnTv = http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/discover/tv?&air_date.gte='. $release_date3. '&air_date.lte='. $release_date2)
            ->json()['results'];

        //dump($showsOnTv);

        return view('home',[
            'videos' => $videos,
            'moviesInTheater' => $moviesInTheater,
            //'genres' => $genres,
            'showsOnTv' => $showsOnTv,
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
}
