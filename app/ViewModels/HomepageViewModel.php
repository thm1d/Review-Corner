<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;

class HomepageViewModel extends ViewModel
{
	public $lists;
    public $trailers;
    public $trendings;

    public function __construct($lists, $trailers, $trendings)
    {
        $this->lists = $lists;
        $this->trailers = $trailers;
        $this->trendings = $trendings;
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
