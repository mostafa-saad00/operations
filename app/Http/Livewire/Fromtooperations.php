<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Fromtooperation;

class Fromtooperations extends Component
{
    public $searchTerm;

    public function render()
    {        
        $searchTerm = '%'.$this->searchTerm . '%';

        $fromtooperations = Fromtooperation::where('refrence_number', 'LIKE', $searchTerm)->orderBy('id', 'DESC')->get();

        return view('livewire.fromtooperations', ['fromtooperations'=>$fromtooperations]);
    }
}
