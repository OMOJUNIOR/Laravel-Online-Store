<?php

namespace App\Http\Livewire;

use App\Models\products;
use Livewire\Component;

class SearchController extends Component
{
    public $search;

    public $searchResults;

    protected $queryString = ['search'];

    public function render()
    {
        $this->searchResults = [];
        if ($this->search) {
            $this->searchResults = products::where('name', 'like', '%'.$this->search.'%')->get();
        }

        return view('livewire.search-controller', [
            'searchResults' => $this->searchResults,
        ]);
    }
}
