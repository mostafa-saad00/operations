<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Fromtooperation;

class Fromtooperations extends Component
{
    public $searchTerm;
    public $month;
    public $year;

    public function render()
    {        
        $searchTerm = '%'.$this->searchTerm . '%';

        if($this->month != '' && $this->year != '')
        {
            $fromtooperations = Fromtooperation::where('month', 'LIKE', $this->month)
                                                ->where('year', 'LIKE', $this->year)
                                                ->orderBy('from', 'DESC')->get();
        }
        elseif($this->month != '' && $this->year == '')
        {
            $fromtooperations = Fromtooperation::where('month', 'LIKE', $this->month)
                                                ->orderBy('from', 'DESC')->get();
        }
        elseif($this->month == '' && $this->year != '')
        {
            $fromtooperations = Fromtooperation::where('year', 'LIKE', $this->year)
                                                ->orderBy('from', 'DESC')->get();
        }
        else
        {
            $fromtooperations = Fromtooperation::orderBy('from', 'DESC')      
                                                ->get();
        }
        
        $all_fromtooperations = Fromtooperation::orderBy('year', 'DESC')
        ->get();

        $theArray = [];
        foreach($all_fromtooperations as $fromto)
        {
            array_push($theArray, $fromto->year);
        }
        $yearsArray = array_unique($theArray);
        

        return view('livewire.fromtooperations', ['fromtooperations'=>$fromtooperations, 'years' => $yearsArray]);
    }
}
