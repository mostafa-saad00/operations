<?php

namespace App\Http\Livewire;

use App\Models\Fromtooperation;
use Livewire\Component;
use App\Models\Officer;

class Weeklyofficeroperations extends Component
{
    public $searchTerm;
    public $fromtooperation;

    public function mount($fromtooperation)
    {
        $this->fromtooperation = Fromtooperation::find($fromtooperation);
    }

    public function render()
    {
        $searchTerm = '%'.$this->searchTerm . '%';
        $officers = Officer::where('name', 'LIKE', $searchTerm)
                    ->orWhere('nick_name', 'LIKE', $searchTerm)
                    ->orWhere('phone', 'LIKE', $searchTerm)
                    ->orWhere('address', 'LIKE', $searchTerm)
                    ->get();


        return view('livewire.weeklyofficeroperations', ['officers'=>$officers]);
    }
}
