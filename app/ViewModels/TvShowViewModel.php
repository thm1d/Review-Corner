<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;

class TvShowViewModel extends ViewModel
{
    public $tvShow;
    public $imdb;
    public $rating;
    public $userReviews;


    public function __construct($tvShow, $imdb, $rating, $userReviews)
    {
        $this->tvShow = $tvShow;
        $this->imdb = $imdb;
        $this->rating = $rating;
        $this->userReviews = $userReviews;
    }

    public function tvShow()
    {
    	return collect($this->tvShow)->merge([
    			'poster_path' => $this->tvShow['poster_path'] != null ? 'https://image.tmdb.org/t/p/w500/'. $this->tvShow['poster_path'] : ($this->tvShow['external_ids']['imdb_id'] != null ? ($this->imdb['Poster'] == "N/A" ? 'https://ui-avatars.com/api/?size=300&name='. $this->tvShow['name'] : $this->imdb['Poster']) : 'https://ui-avatars.com/api/?size=300&name='. $this->tvShow['name']),
    			'first_air_date' => \Carbon\Carbon::parse($this->tvShow['first_air_date'])->format('M d, Y'),
    			'genres' => collect($this->tvShow['genres'])->pluck('name')->flatten()->implode(', '),
    			'episode_run_time' => collect($this->tvShow['episode_run_time']),
    			'crew' => collect($this->tvShow['credits']['crew'])->take(2),
    			'cast' => collect($this->tvShow['credits']['cast'])->take(5),
    			'backdrops' => collect($this->tvShow['images']['backdrops'])->take(9),
    			'release_year' => substr($this->tvShow['first_air_date'],0,4),
                'reviews' => collect($this->tvShow['reviews']['results']),
                'similarTvShows' => collect($this->tvShow['similar']['results'])->take(5),
                'vote_average' => $this->tvShow['vote_average'] == 0 ? "N/A" : $this->tvShow['vote_average'],
    		]);
    }

    public function imdb()
    {
        return collect($this->imdb)->merge([
            'Year' => isset($this->imdb['Year']) ? $this->imdb['Year'] : substr($this->tvShow['first_air_date'], 0, 4),
            ]);
    }

    public function rating()
    {
        return $this->rating;
    }

    public function userReviews()
    {
        
        return $this->userReviews;

    }
}
