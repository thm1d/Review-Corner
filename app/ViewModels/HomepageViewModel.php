<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;

class HomepageViewModel extends ViewModel
{
	public $lists;

    public function __construct($lists)
    {
        $this->lists = $lists;
    }

    public function lists()
    {
    	return $this->formatLists($this->lists);
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
}
