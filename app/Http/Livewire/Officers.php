<?php

namespace App\Http\Livewire;

use App\Models\Officer;
use Livewire\Component;
use Livewire\WithPagination;

class Officers extends Component
{
    public $search;
    public $searchTerm;
    public function render()
    {
        $searchTerm = '%'.$this->searchTerm . '%';
        $officers = Officer::where('name', 'LIKE', $searchTerm)
                    ->orWhere('nick_name', 'LIKE', $searchTerm)
                    ->orWhere('phone', 'LIKE', $searchTerm)
                    ->orWhere('address', 'LIKE', $searchTerm)
                    ->get();


        return view('livewire.officers', ['officers'=>$officers]);
    }
}
