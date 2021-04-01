<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class SearchDropdown extends Component
{
    public $search= '';

    public function render()
    {

        $searchResults = [];
        $searchResultsGame = [];

        if (strlen($this->search) > 2) {
            $searchResults = http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/search/multi?query='.$this->search)
            ->json()['results'];

            // $searchResultsGame =  Http::withHeaders(config('services.igdb.headers'))
            //     ->withBody(
            //         "search \"{$this->search}\";
            //             fields name, slug, cover.url;
            //             limit 7;
            //         ", "text/plain"
            //     )->post(config('services.igdb.endpoint'))
            //     ->json();
        }

        //dump($searchResultsGame);

        return view('livewire.search-dropdown', [
            'searchResults' => collect($searchResults)->take(7),
            //'searchResultsGame' => collect($searchResultsGame),

        ]);
    }

}