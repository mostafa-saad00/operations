<?php

namespace App\Http\Livewire;

use App\Models\Fromtooperation;
use Livewire\Component;
use App\Models\Officer;
use App\Models\Weeklyofficeroperation;
use App\Models\Dailyoperation;

class Weeklyofficeroperations extends Component
{
    public $searchTerm;
    public $fromtooperation;
    public $weeklyofficeroperations;
    public $dailyoperations;

    public function mount($fromtooperation)
    {
        $this->dailyoperations = Dailyoperation::all();
        $this->fromtooperation = Fromtooperation::find($fromtooperation);
        $this->weeklyofficeroperations = Weeklyofficeroperation::where('fromtooperation_id', $fromtooperation)->get();
    }

    public function render()
    {
        $searchTerm = '%'.$this->searchTerm . '%';
        $officers = Officer::where('rank', 'LIKE', $searchTerm)
                            ->orWhere('name', 'LIKE', $searchTerm)
                            ->orWhere('nick_name', 'LIKE', $searchTerm)
                            ->orWhere('tarteb', 'LIKE', $searchTerm)
                            ->orWhere('year_of_graduate', 'LIKE', $searchTerm)
                            ->orWhere('what_he_do', 'LIKE', $searchTerm)
                            ->orWhere('address', 'LIKE', $searchTerm)
                            ->orWhere('city', 'LIKE', $searchTerm)
                            ->orWhere('religion', 'LIKE', $searchTerm)
                            ->orWhere('status', 'LIKE', $searchTerm)
                            ->orWhere('phone1', 'LIKE', $searchTerm)
                            ->orWhere('phone2', 'LIKE', $searchTerm)
                            ->orWhere('health', 'LIKE', $searchTerm)
                            ->orderBy('year_of_graduate', 'ASC')
                            ->orderBy('tarteb', 'ASC')
                            ->get();


        return view('livewire.weeklyofficeroperations', ['officers'=>$officers]);
    }
}
