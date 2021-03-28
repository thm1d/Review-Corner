<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;

class MovieViewModel extends ViewModel
{
	public $movie;
	public $imdb;


    public function __construct($movie, $imdb)
    {
        $this->movie = $movie;
        $this->imdb = $imdb;
    }

    public function movie()
    {
    	return collect($this->movie)->merge([
    			'poster_path' => 'https://image.tmdb.org/t/p/w500/'. $this->movie['poster_path'],
    			'release_date' => \Carbon\Carbon::parse($this->movie['release_date'])->format('M d, Y'),
    			'genres' => collect($this->movie['genres'])->pluck('name')->flatten()->implode(', '),
    			'runtime' => date('g\h i',mktime(0,$this->movie['runtime'])),
    			'crew' => collect($this->movie['credits']['crew'])->take(2),
    			'cast' => collect($this->movie['credits']['cast'])->take(5),
    			'backdrops' => collect($this->movie['images']['backdrops'])->take(9),
    			'release_year' => substr($this->movie['release_date'],0,4),
                'reviews' => collect($this->movie['reviews']['results']),
    		])->dump();
    }

    public function imdb()
    {
    	return $this->imdb;
    }
}
