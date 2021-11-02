<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;

class MoviesViewModel extends ViewModel
{
	public $trendingMovies;
	public $popularMovies;
	public $nowPlayingMovies;
	public $genres;
    public $gcounter;
    public $ycounter;

    public function __construct($trendingMovies, $popularMovies, $nowPlayingMovies, $genres, $gcounter, $ycounter)
    {
        $this->trendingMovies = $trendingMovies;
        $this->popularMovies = $popularMovies;
        $this->nowPlayingMovies = $nowPlayingMovies;
        $this->genres = $genres;
        $this->gcounter = $gcounter;
        $this->ycounter = $ycounter;
    }

    public function trendingMovies()
    {
    	return $this->formatMovies($this->trendingMovies);
    }

    public function popularMovies()
    {
    	return $this->formatMovies($this->popularMovies);
    }

    public function nowPlayingMovies()
    {
    	return $this->formatMovies($this->nowPlayingMovies);
    }

    

    public function genres()
    {
    	return collect($this->genres)->mapWithKeys(function ($genre){
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
    			'poster_path' => 'https://image.tmdb.org/t/p/w500/'. $movie['poster_path'],
    			'release_date' => \Carbon\Carbon::parse($movie['release_date'])->format('M d, Y'),
    			'genres' => $genresFormatted,
    		]);
    	})->take(15);
    }
}
