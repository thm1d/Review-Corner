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

        // $upcomingMovies = http::withToken(config('services.tmdb.token'))
        // ->get('https://api.themoviedb.org/3/movie/upcoming?language=en-US&page=1&region=US')
        // ->json()['results'];

        $videos = [
          [
            "name" => "Final Trailer",
            "key" => "w0HgHet0sxg",
            "title" => "Dune"
          ],
          [
            "name" => "Official Trailer",
            "key" => "hL6R3HmQfPc",
            "title" => "Halloween Kills"
          ],
          [
            "name" => "The Last Duel | 20th Century Studios",
            "key" => "QTBSb0i09kI",
            "title" => "The Last Duel"
          ],
          [
            "name" => "Official Trailer",
            "key" => "8I8nMtzN05s",
            "title" => "Ron's Gone Wrong"
          ],
          [
            "name" => "COURAGEOUS Movie Trailer",
            "key" => "i9VT_NBIVfs",
            "title" => "Courageous"
          ],
          [
            "name" => "ANTLERS | Official Trailer [HD] | FOX Searchlight",
            "key" => "2aiYxwVuZ1o",
            "title" => "Antlers"
          ],
          [
            "name" => "LAST NIGHT IN SOHO - Official Trailer [HD] - Only in Theaters October 29",
            "key" => "AcVnFrxjPjI",
            "title" => "Last Night in Soho"
          ],
          [
            "name" => "Arts and Artists",
            "key" => "qrpbzEwPNyE",
            "title" => "The French Dispatch"
          ],
          [
            "name" => "Jeepers Creepers Reborn A look at the creeper stunt",
            "key" => "pxrw6sDzNSo",
            "title" => "Jeepers Creepers: Reborn"
          ],
          [
            "name" => "Metrograph Pictures presents POSSESSION [4K Restoration, Official Trailer]",
            "key" => "Ah4Z1yIAoFM",
            "title" => "Possession"
          ],
          [
            "name" => "Hard Luck Love Song  | Official Trailer  |  In Theaters October 15",
            "key" => "lP5OX-zEgrw",
            "title" => "Hard Luck Love Song"
          ],
          [
            "name" => "The Velvet Underground — Official Trailer | Apple TV+",
            "key" => "hWq7a8Tin8g",
            "title" => "The Velvet Underground"
          ],
          [
            "name" => "Official Trailer",
            "key" => "nrlVHVid-20",
            "title" => "Bergman Island"
          ],
          [
            "name" => "The Harder They Fall | Official Trailer | Netflix",
            "key" => "Poc55U2RPMw",
            "title" => "The Harder They Fall"
          ],
          [
            "name" => "Needle in a Timestack (2021 Movie) Teaser Trailer – Leslie Odom Jr., Cynthia Erivo, Orlando Bloom",
            "key" => "ZPKL9aSgbCw",
            "title" => "Needle in a Timestack"
          ],
          [
            "name" => "The Grand Duke of Corsica | Official Trailer (HD) | Vertical Entertainment",
            "key" => "WRPx0a3Tv_8",
            "title" => "The Grand Duke Of Corsica"
          ],
          [
            "name" => "Introducing, Selma Blair | In Theaters Oct 15 | Streaming Oct 21 on discovery+",
            "key" => "pSJey-ieiU0",
            "title" => "Introducing, Selma Blair"
          ],
          [
            "name" => "The Blazing World | Official Trailer (HD) | Vertical Entertainment",
            "key" => "3PFP2XlOeTY",
            "title" => "The Blazing World"
          ]
        ];
        dump($videos);

        // foreach ($upcomingMovies as $movie) {
        //     $video = http::withToken(config('services.tmdb.token'))
        //     ->get('https://api.themoviedb.org/3/movie/'. $movie['id']. '/videos')
        //     ->json()['results'];

        //     //dump($video);

        //     if ($video != null) {
        //         $video[0]['title'] = $movie['title'];
        //         $videos[] = $video[0];
        //         if (count($videos) > 20) {
        //             break;
        //         }
        //     }
        // }

        

        $moviesInTheater = http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/discover/movie?primary_release_date.gte='. $release_date1 .'&primary_release_date.lte='. $release_date2.'&page=1')
        ->json()['results'];

        $genresArray = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/genre/movie/list')
            ->json()['genres'];

        $showsOnTv = http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/discover/tv?&air_date.gte='. $release_date3. '&air_date.lte='. $release_date2.'&page=1')
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

    public function comingSoon()
    {
        return view('comingsoon');
    }

}
