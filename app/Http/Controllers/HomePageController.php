<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\ViewModels\HomepageViewModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class HomePageController extends Controller
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

        $lists = [
          [
            "id" => 157336,
            "poster_path" => "/gEU2QniE6E77NI6lCU6MxlNBvIx.jpg",
            "release_date" => "2014-11-05",
            "title" => "Interstellar",
            "type" => "movie",
            "vote_average" => 8.3,
          ],
          [
            "id" => 334541,
            "poster_path" => "/e8daDzP0vFOnGyKmve95Yv0D0io.jpg",
            "release_date" => "2016-11-18",
            "title" => "Manchester by the Sea",
            "type" => "movie",
            "vote_average" => 7.5,
          ],
          [
            "id" => 436305,
            "poster_path" => "/jHbSJo4FoKvqaGn3b7q49bcSYVZ.jpg",
            "release_date" => "2018-03-15",
            "title" => "The Farthest",
            "type" => "movie",
            "vote_average" => 7.7,
            
          ],
          [
            "id" => 266856,
            "poster_path" => "/kJuL37NTE51zVP3eG5aGMyKAIlh.jpg",
            "release_date" => "2014-11-26",
            "title" => "The Theory of Everything",
            "type" => "movie",
            "vote_average" => 7.9,
          ],
          [
            "id" => 85991,
            "poster_path" => "/9TGNcvMm91QXmnnCCYYqnYK0bK7.jpg",
            "release_date" => "2019-04-06",
            "title" => "Fruits Basket",
            "type" => "tv",
            "vote_average" => 8.4,
          ],
          [
            "id" => 424,
            "poster_path" => "/sF1U4EUQS8YHUYjNl3pMGNIQyr0.jpg",
            "release_date" => "1993-11-30",
            "title" => "Schindler's List",
            "type" => "movie",
            "vote_average" => 8.6,
          ],
          [
            "id" => 1422,
            "poster_path" => "/kWWAt2FMRbqLFFy8o5R4Zr8cMAb.jpg",
            "release_date" => "2006-10-05",
            "title" => "The Departed",
            "type" => "movie",
            "vote_average" => 8.2,
          ],
          [
            "id" => 1399,
            "poster_path" => "/u3bZgnGQ9T01sWNhyveQz0wH0Hl.jpg",
            "release_date" => "2011-04-17",
            "title" => "Game of Thrones",
            "type" => "tv",
            "vote_average" => 8.4,
          ],
          [
            "id" => 504253,
            "poster_path" => "/vHdVU0HyyB6k6kuYt8qjwTz9one.jpg",
            "release_date" => "2018-09-01",
            "title" => "I Want to Eat Your Pancreas",
            "type" => "movie",
            "vote_average" => 8.3,
          ],
          [
            "id" => 158445,
            "poster_path" => "/4Ht6RBo4fUmSo2tWE6umtNll58z.jpg",
            "release_date" => "2013-01-23",
            "title" => "Miracle in Cell No. 7",
            "type" => "movie",
            "vote_average" => 8.3,
          ],
          [
            "id" => 205587,
            "poster_path" => "/tefUxj4Gg9hgQNgfEYd7kJQrIlD.jpg",
            "release_date" => "2014-10-08",
            "title" => "The Judge",
            "type" => "movie",
            "vote_average" => 7.3,
          ],
          [
            "id" => 93740,
            "poster_path" => "/A1fXGFxDifQzj08OlaGTVcnXHyd.jpg",
            "release_date" => "2021-09-23",
            "title" => "Foundation",
            "type" => "tv",
            "vote_average" => 8.2,
          ]
        ];

        $trailers = [
          [
            "name" => "The Last Duel | 20th Century Studios",
            "key" => "QTBSb0i09kI",
            "title" => "The Last Duel",
            "poster_path" => "/b69kfBhuztkodJfWe9qHx7Gjwe1.jpg"
          ],
          [
            "name" => "Maya and the Three | Official Trailer | Netflix",
            "key" => "QrPMlYSbkEQ",
            "title" => "Maya and the Three",
            "poster_path" => "/zUBixNeHU0cbSUH7JMktl9OMEMV.jpg",
          ],
          [
            "name" => "NO TIME TO DIE | Final US Trailer",
            "key" => "N_gD9-Oa0fg",
            "title" => "No Time to Die",
            "poster_path" => "/iUgygt3fscRoKWCV1d0C7FbM9TP.jpg",
          ],
          [
            "name" => "The Black Phone - Official Trailer",
            "key" => "3eGP6im8AZA",
            "title" => "The Black Phone",
            "poster_path" => "/wd6WxLLR2w8aAXmLPDW5CN0iSB3.jpg",
          ],
          [
            "name" => "Needle in a Timestack (2021 Movie) Teaser Trailer – Leslie Odom Jr., Cynthia Erivo, Orlando Bloom",
            "key" => "ZPKL9aSgbCw",
            "title" => "Needle in a Timestack",
            "poster_path" => "/rjGYOszxlaUAe6EC5yZ4Q8l3aVL.jpg",
          ],
          [
            "name" => "The Matrix Resurrections – Official Trailer 1",
            "key" => "9ix7TUGVYIo",
            "title" => "The Matrix Resurrections",
            "poster_path" => "/tOqTTslEfjyvoBoBM4B29aeqntt.jpg",
          ],
          [
            "name" => "In The Beginning, Featurette | Marvel Studios' Eternals",
            "key" => "PcPIlVJ35R0",
            "title" => "Eternals",
            "poster_path" => "/6AdXwFTRTAzggD2QUTt5B7JFGKL.jpg"
          ],
          [
            "name" => "THE BATMAN – Main Trailer",
            "key" => "mqqft2x_Aa4",
            "title" => "The Batman",
            "poster_path" => "/7YncShtIGNJP5euTPSZGxGsImaN.jpg",
          ]
        ];

        $trendings = http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/trending/all/week?page=1')
        ->json()['results'];

        $moviesInTheater = http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/discover/movie?primary_release_date.gte='. $release_date1 .'&primary_release_date.lte='. $release_date2.'&page=2')
        ->json()['results'];

        $genresArray = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/genre/movie/list')
            ->json()['genres'];

        $showsOnTv = http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/tv/on_the_air?page=1')
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


        $viewModel = new HomepageViewModel(
            $lists,
            $trailers,
            $trendings,
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

    public function comingSoon()
    {
        return view('comingsoon');
    }
}
