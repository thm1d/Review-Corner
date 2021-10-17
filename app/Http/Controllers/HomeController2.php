<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ViewModels\HomepageViewModel;

class HomeController2 extends Controller
{
    public function index()
    {
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

		$viewModel = new HomepageViewModel(
            $lists,
        );
    	return view('home.home2', $viewModel);
    }
}
