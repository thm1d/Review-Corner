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
            "name" => "UNCHARTED - Official Trailer (HD)",
            "key" => "eHp3MbsCbMg",
            "title" => "Uncharted",
            "poster_path" => "/77dlklwA1VJOLCqIhhmkmS39BLH.jpg",
            
          ],
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
            "name" => "Needle in a Timestack (2021 Movie) Teaser Trailer",
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

        $popular_reviews = [
          [
            "poster" => "https://image.tmdb.org/t/p/w154/d5NXSklXo0qyIYkgV94XAgMIckC.jpg",
            "title" => "Dune",
            "id" => 438631,
            "year" => 2021,
            "user_avatar" => "https://www.themoviedb.org/t/p/w64_and_h64_face/ngkjR9NuSpIzRFlMSbOPRrbHM1i.jpg",
            "user_name" => "Radio1'sMr.Movie!-MadAmi🌠",
            "rating" => 10.0,
            "review_short" => " **FABULOUS 🥇🥇🥇🥇 . . . . And , Oh , Yes . . . . Hans Zimmers Score has Already Got OSCAR Written On It 😉 ; & EXPECT A WHOLE  HOST OF OTHER _MAJOR_ NOMINATIONS - AS WELL ** This Is A **- _B I G_ -** Screen - MINI - Review. Picture Viewed Oct. 07, 2021 ; At Vox Cinemas , U . A . E ______________________________________________________ Paul Atreides...",
            "review_full" => "**FABULOUS 🥇🥇🥇🥇 . . . . And , Oh , Yes . . . . Hans Zimmers Score has Already Got OSCAR Written On It 😉 ; & EXPECT A WHOLE HOST OF OTHER _MAJOR_ NOMINATIONS - AS WELL ** This Is A **- _B I G_ -** Screen - MINI - Review. Picture Viewed Oct. 07, 2021 ; At Vox Cinemas , U . A . E ______________________________________________________ Paul Atreides :  Fear is the mind-killer. Fear is the little death that brings total obliteration. I will face my fear, and I will permit it to pass over me. When the fear has gone, there will be nothing. Only I will remain . _______________________________________ _______________ **1.** If you are  one of the -Millions- of people around the world who loved Denis Villeneuves hauntingly riveting 2015 thriller Sicario, ( yours truly included ) ; then strap in for one hell of an Interstellar ride, with an -{ EQUALLY }- ** INTERSTELLAR 🌠 ** CAST . . . . that -literally- presents itself like a Who is-who of Hollywoods Best, And Brightest. This time around, the unequivocally -{ Prolific }- Academy Award nominated French Canadian director has taken acclaimed American author Frank Herberts 1965 sci-fi thriller, ( once touted as the worlds -Best- selling science fiction novel ), & turned it into a veritable masterpiece of a movie. -Make Sure- to keep a special eye out for Rebecca Fergusons completely Stunning portrayal of Lady Jessica Atreides . . . . I can promise that you most certainly -Will Not- regret it. **2.** Almost needless to say, the Music, Acting , Cinematography 🔥 , Art-direction, C.g.i, Dramatic pacing & the sprawling, lavish Set-pieces are all, well . . . -{  Past Compare  }- . When it comes to 2021s cinematic big budget smorgasbord : if you want to see the -Very- best Popcorn Flick Sensation of the year, it is most unequivocally going to be Bond 25 : No Time To Die. But, on the -other- hand, if you are more in the mood for some -equally- magnificent **Artfilm Meets Blockbuster ( no seriously )** fare . . . that may -Well- hold you in a state of Absolute Rapture from start to finish, then Dune should most -Definitely- be your first choice. Just make sure to come to said movie with a { Genuinely } open and unbiased --- Heart , And Mind 🙃 . **3.  Final Analysis  :** The only -{ Pronounced }- lack you will feel, if any at all, is that of -{ Humour }‐ . . . . especially if you are someone who enjoys their big screen delights served with, well, a generous side of unrestrained -Mirth- . I counted -Literally- only about 3.5 barely plausible funny moments in the -Entire- flick. But the obvious reason for that is : it simply -Would not- have worked within this sort of a Deadly Serious dark, dramatic, & super futuristic setting ( 10,191 a.g, to be precise ). So, having taken -that- aspect of the production into consideration ; it really ended up -_NOT_ - bothering me very much, AT ALL. Thus, in sum . . . . I was utterly **-{ MESMERIZED }-** by  Dune : Part 1  and hence ; I chose to give it a ** Wholehearted, Adoring, MEGA-APPRECIATIVE 13 Marks Out Of 10❗ .**",
            "media_type" => "movie"
          ],
          [
            "poster" => "https://image.tmdb.org/t/p/w154/rjkmN1dniUHVYAtwuV3Tji7FsDO.jpg",
            "title" => "Venom: Let There Be Carnage",
            "id" => 580489,
            "year" => 2021,
            "user_avatar" => "https://secure.gravatar.com/avatar/3593437cbd05cebe0a4ee753965a8ad1.jpg",
            "user_name" => "garethmb",
            "rating" => 9.0,
            "review_short" => "When audiences last saw Eddie Brock (Tom Hardy); the journalist and his parasitic symbiote Venom; had just saved the day and cemented their unusual bond with one another. In the new film Venom: Let There Be Carnage; Eddie and Venom are at the end of their Honeymoon phase as Venom is...",
            "review_full" => "When audiences last saw Eddie Brock (Tom Hardy); the journalist and his parasitic symbiote Venom; had just saved the day and cemented their unusual bond with one another. In the new film “Venom: Let There Be Carnage”; Eddie and Venom are at the end of their Honeymoon phase as Venom is lingering to be free to eat bad people and do what is natural for him. Eddie meanwhile wants a more conservative approach feeding Venom chicken and chocolate as he knows the eyes of the authorities are still upon him and he has to convince the world that Venom is dead and no longer a threat. At the same time; serial killer Cletus Kasady (Woody Harrelson) has selected Eddie to interview him in San Quentin and the two form an unusual connection as Cletus cryptically speaks to Eddie which underlines a deeper motivation.  With the help of Venom; Eddie is able to decipher clues found on the walls of Cletuss cell which leads authorities to several of his victims. This results in a rapid rise in status for Eddie and fast tracks Cletus for execution as his main means of leverage is now gone. This leads to a rift where Eddie and Venom split and each has to struggle to adjust to life without one another. At this point, the film has mainly been odd bits of whimsy between Venom and Eddie around the establishment of the plot and threat. However, things go into chaos mode when Cletus becomes infected with a Symbiote and turns into a destruction spewing death machine known as “Carnage”. Cletus and Carnage both have their own agendas and Cletus uses Carnage to exact his revenge as well as locate a figure from his past that is as big a danger as he is. As any fan of films of this genre knows; this scenario leads to a showdown between the central characters which are awash in abundant CGI, loud noises, and destruction. While this is not a bad thing and certainly one of the main reasons I enjoy films of this type; the film never seemed to fully click for me and as such was not as good as I thought it could have been. In many ways, the film reminded me of how comic-based films were done before Marvel started their own studios and their phenomenal run of hits based on their work. There have been multiple attempts to adapt comics into films over the last few decades and many of them have not lived up to expectations or failed outright. One of the biggest reasons is in my opinion is that those behind the projects were hindered by the studio, wanted to put their own spin on the material and strayed from the source; or failed to show the attributes that made the characters so appealing to fans. What we often get is action sequences and CGI galore but without stories or characters that fully draw in the audience and fail to capture the essence of the comics. Director Andy Serkis has done a great job with the visuals of the film but the tone seems off. The early part of the film is filled with comedic moments that are either hit or miss. Some of which was almost to the point where I wondered if it was supposed to be a parody. The plot is fairly linear with nothing unexpected as it is simply bad guys get loose; bad guys cause death and destruction, can the heroes stop them. The climactic scene lacks any wow moments for me as it was mainly CGI characters rapidly moving around causing damage to one another and their environment. There was no real tension for me and the ultimate resolution seemed a bit anti-climactic. For me the best moment of the film was a mid-credits scene that really popped as it sets up all sorts of interesting options and indicates that Venom may be about to graduate to bigger and better things. For now; the cast is solid as is the CGI; I just wish the story was more engaging as it had the potential to be so much more. 3 stars out of 5",
            "media_type" => "movie"
          ],
          [
            "poster" => "https://image.tmdb.org/t/p/w154/qmJGd5IfURq8iPQ9KF3les47vFS.jpg",
            "title" => "Halloween Kills",
            "id" => 610253,
            "year" => 2021,
            "user_avatar" => "https://www.themoviedb.org/t/p/w64_and_h64_face/xNLOqXXVJf9m7WngUMLIMFsjKgh.jpg",
            "user_name" => "JPV852",
            "rating" => 9.0,
            "review_short" => "Given I was not a big fan of Halloween 2018, the bar on Halloween Kills was rather low and... pretty much met it. While some of the deaths were pretty gruesome, the rest was kind of bland and character decisions as dumb as others. Like the initial sequel, Halloween II, Jamie Lee Curtis spends...",
            "review_full" => "Given I was not a big fan of Halloween 2018, the bar on Halloween Kills was rather low and... pretty much met it. While some of the deaths were pretty gruesome, the rest was kind of bland and character decisions as dumb as others. Like the initial sequel, Halloween II, Jamie Lee Curtis spends the bulk of her time in the hospital. There was also a scene early on when Michael fights a bunch of firefighters just came off as silly looking, maybe because I am so used to seeing him butcher people one by one, the shot, beyond being clumsily choreographed, showed him taking on 5-6 people; just looked strange. I do not know, there is not a whole lot to this sequel and like Halloween 18, not sure I look forward to revisiting. **2.0/5**",
            "media_type" => "movie"
          ],
          [
            "poster" => "https://image.tmdb.org/t/p/w154/iUgygt3fscRoKWCV1d0C7FbM9TP.jpg",
            "title" => "No Time to Die",
            "id" => 370172,
            "year" => 2021,
            "user_avatar" => "https://secure.gravatar.com/avatar/992eef352126a53d7e141bf9e8707576.jpg",
            "user_name" => "msbreviews",
            "rating" => 8.0,
            "review_short" => "FULL SPOILER-FREE REVIEW  https://www.msbreviews.com/movie-reviews/no-time-to-die-spoiler-free-review. No Time To Die is the most emotional, personal James Bond movie of Daniel Craigs Era, holding a heartfelt farewell to the now-iconic actor. Delivering his best performance...",
            "review_full" => "FULL SPOILER-FREE REVIEW  https://www.msbreviews.com/movie-reviews/no-time-to-die-spoiler-free-review. No Time To Die is the most emotional, personal James Bond movie of Daniel Craigs Era, holding a heartfelt farewell to the now-iconic actor. Delivering his best performance as 007, Craig finishes his memorable run in a high-stakes film with some of the best action sequences of the entire franchise. Technically, the practical sets and locations, stunt work, cinematography, and editing are all no short of impressive, working together beautifully to create magnificent set pieces. Despite an overlong runtime with an exposition-heavy second act and a terribly stereotyped villain with unclear motivations, the emotionally compelling narrative sets up a powerful third act boosted by an epic score. Cary Joji Fukunaga brilliantly directs a movie packed with phenomenal performances that will leave no viewer indifferent. Massive praise to the outstanding ensemble cast. And a humble thank you to Craig… Daniel Craig. Rating: A-",
            "media_type" => "movie"
          ],
          [
            "poster" => "https://image.tmdb.org/t/p/w154/yxIdKGEjagaLs5kMjw92kAHmopH.jpg",
            "title" => "You",
            "id" => 78191,
            "year" => "2018-",
            "user_avatar" => "https://www.themoviedb.org/t/p/w64_and_h64_face/8bVLBVaYKiNVdvpLoYlIr3hU6qw.jpg",
            "user_name" => "Kewl_Kat",
            "rating" => 8.0,
            "review_short" => "So far, so good with You. It has a Dexter feel. You find yourself rooting for Joe, despite his deeply troubling behavior. He is a great guy in some ways and a horrible criminal in others. Lots of modern day stalking going on using smartphones and computers plus...",
            "review_full" => "So far, so good with You. It has a Dexter feel. You find yourself rooting for Joe, despite his deeply troubling behavior. He is a great guy in some ways and a horrible criminal in others. Lots of modern day stalking going on using smartphones and computers plus just good old fashioned regular creeping around. Its disturbing, sexy and fun all rolled into one. Enjoy! 8/10 stars.",
            "media_type" => "tv"
          ]
        ];
        //dump($popular_reviews);

        $trendings = http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/trending/all/week?page=1')
        ->json()['results'];

        $moviesInTheater = http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/discover/movie?primary_release_date.gte='. $release_date1 .'&primary_release_date.lte='. $release_date2.'&page=1')
        ->json()['results'];

        $showsOnTv = http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/tv/on_the_air?page=1')
            ->json()['results'];

        $games = Http::withHeaders(config('services.igdb.headers'))
            ->withBody(
                "fields name, cover.url, first_release_date, total_rating, platforms.abbreviation, release_dates.date, release_dates.human, slug;
                    where release_dates.date < 1617523652 &  release_dates.date > 1616917710 & total_rating != null;
                    limit 18;
                    sort total_rating desc;", "text/plain"
            )->post(config('services.igdb.endpoint'))
            ->json();

        //abort_if(!$games, 404);

        $viewModel = new HomepageViewModel(
            $lists,
            $trailers,
            $trendings,
            $moviesInTheater, 
            $showsOnTv,
            $games,
            $popular_reviews,
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

    public function showGenre(Request $request, $id, $value)
    {
        //dump($request);
        
        $genreWiseList = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/discover/'. $request->type .'?with_genres='. $id. '&sort_by=popularity.desc&page='. $request->page)
        ->json();

        //dump($genreWiseMovieList);


        //$genreWiseMovies = $this->formatMovies($genreWiseMovieList);

        //dump($genreWiseTvShows);



        return view('home.genre',[
            'genreWiseList' => $genreWiseList['results'],
            'total_results' => $genreWiseList['total_results'],
            'type' => $request->type,
            'value' => $value,
            'key' => $id,
            'counter' => $request->page,
        ]);
    }

    public function showYear(Request $request, $year)
    {
        if ($request->type == 'movie') {
            $yearWiseList = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/discover/movie?primary_release_year='. $year. '&sort_by=popularity.desc&page='. $request->page)
            ->json();
        }
        else {
            $yearWiseList = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/discover/tv?first_air_date_year='. $year. '&sort_by=popularity.desc&page='. $request->page)
            ->json();
        }

        //dump($yearWiseMovies);

        return view('home.year',[
            'yearWiseList' => $yearWiseList['results'],
            'total_results' => $yearWiseList['total_results'],
            'type' => $request->type,
            'year' => $year,
            'counter' => $request->page,
        ]);
    }

    public function comingSoon()
    {
        return view('comingsoon');
    }

    private function genres()
    {
      $genres = http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/genre/movie/list')
        ->json()['genres'];

      return collect($genres)->mapWithKeys(function ($genre){
            return [$genre['id'] => $genre['name']];
        });
    }

    private function formatMovies($movies) 
    { 
      return collect($movies)->map(function($movie) {
        $genresFormatted = collect($movie['genre_ids'])->mapWithKeys(function($value) {
                return [$value => $this->genres()->get($value)];
            })->implode(', ');

        return collect($movie)->merge([
          'genres' => $genresFormatted,
        ])->only(['poster_path', 'id', 'genres', 'title', 'vote_average', 'release_date', 'original_language', 'overview']);
      });
    }

    public function previous() 
    {
      return $this->page > 1 ? $this->page - 1 : 500;
    }

    public function next() 
    {
      return $this->page < 500 ? $this->page + 1 : 1;
    }
}
