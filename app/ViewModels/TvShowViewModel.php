<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;

class TvShowViewModel extends ViewModel
{
    public $tvShow;

    public function __construct($tvShow)
    {
        $this->tvShow = $tvShow;
    }

    public function tvShow()
    {
    	return collect($this->tvShow)->merge([
    			'poster_path' => 'https://image.tmdb.org/t/p/w500/'. $this->tvShow['poster_path'],
    			'first_air_date' => \Carbon\Carbon::parse($this->tvShow['first_air_date'])->format('M d, Y'),
    			'genres' => collect($this->tvShow['genres'])->pluck('name')->flatten()->implode(', '),
    			'episode_run_time' => collect($this->tvShow['episode_run_time']),
    			'crew' => collect($this->tvShow['credits']['crew'])->take(2),
    			'cast' => collect($this->tvShow['credits']['cast'])->take(5),
    			'backdrops' => collect($this->tvShow['images']['backdrops'])->take(9),
    			'release_year' => substr($this->tvShow['first_air_date'],0,4),
    		])->dump();
    }
}
