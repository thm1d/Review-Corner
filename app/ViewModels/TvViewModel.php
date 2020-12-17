<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;

class TvViewModel extends ViewModel
{
	public $onTheAirShows; 
    public $popularShows;
    public $topRatedShows;
    public $genres;
    public function __construct($onTheAirShows, $popularShows, $topRatedShows, $genres)
    {
        $this->onTheAirShows = $onTheAirShows;
	    $this->popularShows = $popularShows;
	    $this->topRatedShows = $topRatedShows;
	    $this->genres = $genres;
    }

    public function onTheAirShows()
    {
    	return $this->formatTv($this->onTheAirShows);
    }

    public function popularShows()
    {
    	return $this->formatTv($this->popularShows);
    }

    public function topRatedShows()
    {
    	return $this->formatTv($this->topRatedShows);
    }

    public function genres()
    {
    	return collect($this->genres)->mapWithKeys(function ($genre){
            return [$genre['id'] => $genre['name']];
        });
    }

    private function formatTv($tv) 
    { 
    	return collect($tv)->map(function($tvShow) {
    		$genresFormatted = collect($tvShow['genre_ids'])->mapWithKeys(function($value) {
                return [$value => $this->genres()->get($value)];
            })->implode(', ');

    		return collect($tvShow)->merge([
    			'poster_path' => 'https://image.tmdb.org/t/p/w500'. $tvShow['poster_path'],
    			'first_air_date' => \Carbon\Carbon::parse($tvShow['first_air_date'])->format('M d, Y'),
    			'genres' => $genresFormatted,
    		])->dump();
    	});
    }
}
