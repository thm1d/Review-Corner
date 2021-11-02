<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class SearchDropdownGames extends Component
{
    public $search= '';

    public function render()
    {
        $searchResults = [];

        if (strlen($this->search) > 2) {

            $searchResults =  Http::withHeaders(config('services.igdb.headers'))
                ->withBody(
                    "search \"{$this->search}\";
                        fields name, slug, cover.url;
                        limit 7;
                    ", "text/plain"
                )->post(config('services.igdb.endpoint'))
                ->json();
        }

        //dump($searchResultsGame);

        return view('livewire.search-dropdown-games', [
            'searchResultsGame' => collect($searchResults),

        ]);
    }

}