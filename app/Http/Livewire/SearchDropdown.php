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

        if (strlen($this->search) > 2) {
            $searchResults = http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/search/multi?query='.$this->search)
            ->json()['results'];
        }

        return view('livewire.search-dropdown', [
            'searchResults' => collect($searchResults)->take(7),

        ]);
    }

}