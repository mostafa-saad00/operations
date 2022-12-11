<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Ma2moryat;
use App\Models\Officer;
use App\Models\Dailyoperation;

class Ma2moryats extends Component
{
    public $officers;
    public $ma2moryats_dailyoperations;
    public $ma2moryats_search;
    public $officers_search;
    public $years_search;

    public function mount()
    {
        $this->officers = Officer::all();
        $this->ma2moryats_dailyoperations = Dailyoperation::where('type', 'مأمورية خارجية')->get();
     
    }

    public function render()
    {
        if($this->ma2moryats_search != '' && $this->officers_search != '' && $this->years_search != '')
        {
            $ma2moryats = Ma2moryat::where('officer_id', 'LIKE', $this->officers_search)
                                                ->where('dailyoperation_id', 'LIKE', $this->ma2moryats_search)
                                                ->where('year', 'LIKE', $this->years_search)
                                                ->orderBy('date', 'DESC')->get();
        }

        elseif($this->ma2moryats_search != '' && $this->officers_search != '')
        {
            $ma2moryats = Ma2moryat::where('officer_id', 'LIKE', $this->officers_search)
                                                ->where('dailyoperation_id', 'LIKE', $this->ma2moryats_search)
                                                ->orderBy('date', 'DESC')->get();
        }

        elseif($this->ma2moryats_search == '' && $this->officers_search != '' && $this->years_search != '')
        {
            $ma2moryats = Ma2moryat::where('officer_id', 'LIKE', $this->officers_search)
                                                ->where('year', 'LIKE', $this->years_search)
                                                ->orderBy('date', 'DESC')->get();
        }

        elseif($this->ma2moryats_search == '' && $this->officers_search != '')
        {
            $ma2moryats = Ma2moryat::where('officer_id', 'LIKE', $this->officers_search)
                                                ->orderBy('date', 'DESC')->get();
        }

        elseif($this->ma2moryats_search != '' && $this->officers_search == '' && $this->years_search != '')
        {
            $ma2moryats = Ma2moryat::where('dailyoperation_id', 'LIKE', $this->ma2moryats_search)
                                                ->where('year', 'LIKE', $this->years_search)
                                                ->orderBy('date', 'DESC')->get();
        }

        elseif($this->ma2moryats_search != '' && $this->officers_search == '')
        {
            $ma2moryats = Ma2moryat::where('dailyoperation_id', 'LIKE', $this->ma2moryats_search)
                                                ->orderBy('date', 'DESC')->get();
        }

        elseif($this->ma2moryats_search == '' && $this->officers_search == '' && $this->years_search != '')
        {
            $ma2moryats = Ma2moryat::where('year', 'LIKE', $this->years_search)
                                                ->orderBy('date', 'DESC')->get();
        }

        else 
        {
            $ma2moryats = Ma2moryat::orderBy('date', 'DESC')
            ->get();
        }
        


        $years_of_ma2mryats = Ma2moryat::orderBy('date', 'asc')
        ->get();

        $theArray = [];
        foreach($years_of_ma2mryats as $years_of_ma2mryat)
        {
            array_push($theArray, $years_of_ma2mryat->year);
        }
        $yearsArray = array_unique($theArray);


        return view('livewire.ma2moryats', ['ma2moryats'=>$ma2moryats, 'years' => $yearsArray]);

    }
}
