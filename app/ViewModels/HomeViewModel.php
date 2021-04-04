<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class HomeViewModel extends ViewModel
{
	public $videos;
	public $moviesInTheater;
	public $genresArray;
	public $showsOnTv;
	public $games;

    public function __construct($videos, $moviesInTheater, $genresArray, $showsOnTv, $games)
    {
    	$this->videos = $videos;
        $this->moviesInTheater = $moviesInTheater;
        $this->genresArray = $genresArray;
        $this->showsOnTv = $showsOnTv;
        $this->games = $games;
    }

    public function videos()
    {
    	return $this->videos;
    }

    public function moviesInTheater()
    {
    	return $this->formatMovies($this->moviesInTheater);
    }

    public function genresArray()
    {
    	return collect($this->genresArray)->mapWithKeys(function ($genre){
            return [$genre['id'] => $genre['name']];
        });
    }

    public function showsOnTv()
    {
    	return $this->formatTv($this->showsOnTv);
    }

    public function games()
    {
    	return $this->formatForView($this->games);
    }

    private function formatMovies($movies) 
    { 
    	return collect($movies)->map(function($movie) {
    		$genresFormatted = collect($movie['genre_ids'])->mapWithKeys(function($value) {
                return [$value => $this->genresArray()->get($value)];
            })->implode(', ');

    		return collect($movie)->merge([
    			'poster_path' => 'https://image.tmdb.org/t/p/w500/'. $movie['poster_path'],
    			'release_date' => \Carbon\Carbon::parse($movie['release_date'])->format('M d, Y'),
    			'genres' => $genresFormatted,
    		]);
    	})->take(8);
    }

    private function formatTv($tv) 
    { 
    	return collect($tv)->map(function($tvShow) {
    		$genresFormatted = collect($tvShow['genre_ids'])->mapWithKeys(function($value) {
                return [$value => $this->genresArray()->get($value)];
            })->implode(', ');

    		return collect($tvShow)->merge([
    			'poster_path' => 'https://image.tmdb.org/t/p/w500'. $tvShow['poster_path'],
    			'first_air_date' => \Carbon\Carbon::parse($tvShow['first_air_date'])->format('M d, Y'),
    			'genres' => $genresFormatted,
    		]);
    	})->take(8);
    }

    private function formatForView($games)
    {
        return collect($games)->map(function ($game) {
            return collect($game)->merge([
                'coverImageUrl' => Str::replaceFirst('thumb', 'cover_big', $game['cover']['url']),
                'rating' => isset($game['rating']) ? round($game['rating']) : null,
                'platforms' => collect($game['platforms'])->pluck('abbreviation')->implode(', '),
            ]);
        })->toArray();
    }
}
