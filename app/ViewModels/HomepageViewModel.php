<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class HomepageViewModel extends ViewModel
{
    public $lists;
    public $trailers;
    public $trendings;
    public $moviesInTheater;
    public $showsOnTv;
    public $games;
    public $popular_reviews;

    public function __construct($lists, $trailers, $trendings, $moviesInTheater, $showsOnTv, $games, $popular_reviews)
    {
        $this->lists = $lists;
        $this->trailers = $trailers;
        $this->trendings = $trendings;
        $this->moviesInTheater = $moviesInTheater;
        $this->showsOnTv = $showsOnTv;
        $this->games = $games;
        $this->popular_reviews = $popular_reviews;
    }

    public function lists()
    {
        return $this->formatLists($this->lists);
    }

    public function trailers()
    {
        return $this->formatTrailers($this->trailers);
    }

    public function trendings()
    {
        return $this->formatTrendings($this->trendings);
    }

    public function moviesInTheater()
    {
        return $this->formatMovies($this->moviesInTheater);
    }

    public function showsOnTv()
    {
        return $this->formatTv($this->showsOnTv);
    }

    public function games()
    {
        return $this->formatForView($this->games);
    }

    public function popular_reviews()
    {
        return $this->popular_reviews;
    }

    private function formatMovies($movies) 
    { 
        return collect($movies)->map(function($movie) {

            return collect($movie)->merge([
                'poster_path' => 'https://image.tmdb.org/t/p/w500/'. $movie['poster_path'],
                'release_date' => \Carbon\Carbon::parse($movie['release_date'])->format('M d, Y'),
            ])->only(['poster_path', 'id', 'title', 'vote_average', 'release_date']);
        });
    }

    private function formatTv($tv) 
    {
        return collect($tv)->map(function($tvShow) {

            return collect($tvShow)->merge([
                'poster_path' => 'https://image.tmdb.org/t/p/w500'. $tvShow['poster_path'],
                'first_air_date' => \Carbon\Carbon::parse($tvShow['first_air_date'])->format('M d, Y'),
            ])->only(['poster_path', 'id', 'name', 'vote_average', 'first_air_date']);
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

    private function formatLists($lists) 
    { 
        return collect($lists)->map(function($list) {
            return collect($list)->merge([
                'poster_path' => 'https://image.tmdb.org/t/p/w500'. $list['poster_path'],
                'release_date' => \Carbon\Carbon::parse($list['release_date'])->format('M d, Y'),
            ]);
        });
    }

    private function formatTrailers($trailers) 
    { 
        return collect($trailers)->map(function($trailer) {
            return collect($trailer)->merge([
                'poster_path' => 'https://image.tmdb.org/t/p/w92'. $trailer['poster_path'],
                'path' => 'https://www.youtube.com/embed/'. $trailer['key'],
            ]);
        });
    }

    private function formatTrendings($trendings) 
    { 
        return collect($trendings)->map(function($trending) {
            return collect($trending)->merge([
                'poster_path' => 'https://image.tmdb.org/t/p/w154'. $trending['poster_path'],
                'title' => $trending['media_type'] == 'movie' ? (strlen($trending['title']) >= 20 ? substr($trending['title'], 0, 20).'...' : $trending['title']) : (strlen($trending['name']) >= 20 ? substr($trending['name'], 0, 20).'...' : $trending['name']),
            ])->only(['poster_path', 'id', 'title', 'media_type']);
        })->take(12);
    }
}