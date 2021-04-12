<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use App\ViewModels\HomeViewModel;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $release_date1 = Carbon::now()->subMonths(1)->format('Y-m-d');
        $release_date2 = Carbon::now()->format('Y-m-d');
        $release_date3 = Carbon::now()->subDays(7)->format('Y-m-d');

        $upcomingMovies = http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/movie/upcoming')
        ->json()['results'];

        $videos = [];

        foreach ($upcomingMovies as $movie) {
            $video = http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/'. $movie['id']. '/videos')
            ->json()['results'];

            $videos[] = $video[0];
            if (count($videos) > 20) {
                break;
            }
        }

        //dump($videos);

        $moviesInTheater = http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/discover/movie?primary_release_date.gte='. $release_date1 .'&primary_release_date.lte='. $release_date2)
        ->json()['results'];

        $genresArray = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/genre/movie/list')
            ->json()['genres'];

        $showsOnTv = http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/discover/tv?&air_date.gte='. $release_date3. '&air_date.lte='. $release_date2)
            ->json()['results'];

        //dump($showsOnTv);

        $games = Http::withHeaders(config('services.igdb.headers'))
            ->withBody(
                "fields name, cover.url, first_release_date, total_rating, platforms.abbreviation, release_dates.date, release_dates.human, slug;
                    where release_dates.date < 1617523652 &  release_dates.date > 1616917710 & total_rating != null;
                    limit 8;
                    sort total_rating desc;", "text/plain"
            )->post(config('services.igdb.endpoint'))
            ->json();

        abort_if(!$games, 404);

        $viewModel = new HomeViewModel(
            $videos,
            $moviesInTheater, 
            $genresArray, 
            $showsOnTv, 
            $games,
        );

        return view('home.home', $viewModel);
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

    public function showGenre($id)
    {
        $genreWiseMovies = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/discover/movie?with_genres='. $id. '&sort_by=popularity.desc')
        ->json()['results'];

        $genreWiseTvShows = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/discover/tv?with_genres='. $id. '&sort_by=popularity.desc')
        ->json()['results'];


        //dump($genreWiseTvShows);

        return view('home.genre',[
            'genreWiseMovies' => $genreWiseMovies,
            'genreWiseTvShows' => $genreWiseTvShows,
        ]);
    }

    public function showYear($id)
    {
        $yearWiseMovies = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/discover/movie?primary_release_year='. $id. '&sort_by=popularity.desc')
        ->json()['results'];

        $yearWiseTvShows = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/discover/tv?first_air_date_year='. $id. '&sort_by=popularity.desc')
        ->json()['results'];

        //dump($yearWiseMovies);

        return view('home.year',[
            'yearWiseMovies' => $yearWiseMovies,
            'yearWiseTvShows' => $yearWiseTvShows,
        ]);
    }

}
