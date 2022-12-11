<?php

namespace App\Http\Livewire;

use App\Models\Dailyoperation;
use Livewire\Component;

class Dailyoperations extends Component
{
    public $tash8el_name_search;
    public $tash8el_type_search;
    public $tash8el_status_search;

    public $specific_dailyoperations;

    public function mount()
    {
        $this->specific_dailyoperations = Dailyoperation::where('type', 'مأمورية خارجية')
                                        ->orWhere('type', 'خدمة عادية')
                                        ->orWhere('type', 'خدمة طارئة')
                                        ->get();

    }

    public function render()
    {
        if($this->tash8el_name_search != '' && $this->tash8el_type_search != '' && $this->tash8el_status_search != '')
        {
            $dailyoperations = Dailyoperation::where('name', 'LIKE', $this->tash8el_name_search)
            ->where('type', 'LIKE', $this->tash8el_type_search)
            ->where('status', 'LIKE', $this->tash8el_status_search)
            ->get();
        }

        elseif($this->tash8el_name_search != '' && $this->tash8el_type_search != '')
        {
            $dailyoperations = Dailyoperation::where('name', 'LIKE', $this->tash8el_name_search)
            ->where('type', 'LIKE', $this->tash8el_type_search)
            ->get();
        }

        elseif($this->tash8el_name_search == '' && $this->tash8el_type_search != '' && $this->tash8el_status_search != '')
        {
            $dailyoperations = Dailyoperation::where('type', 'LIKE', $this->tash8el_type_search)
            ->where('status', 'LIKE', $this->tash8el_status_search)
            ->get();
        }

        elseif($this->tash8el_name_search == '' && $this->tash8el_type_search == '' && $this->tash8el_status_search != '')
        {
            $dailyoperations = Dailyoperation::where('status', 'LIKE', $this->tash8el_status_search)
            ->get();
        }

        elseif($this->tash8el_name_search == '' && $this->tash8el_type_search != '' && $this->tash8el_status_search == '')
        {
            $dailyoperations = Dailyoperation::where('type', 'LIKE', $this->tash8el_type_search)
            ->get();
        }

        elseif($this->tash8el_name_search != '' && $this->tash8el_type_search == '' && $this->tash8el_status_search == '')
        {
            $dailyoperations = Dailyoperation::where('name', 'LIKE', $this->tash8el_name_search)
            ->get();
        }

        elseif($this->tash8el_name_search != '' && $this->tash8el_type_search == '' && $this->tash8el_status_search != '')
        {
            $dailyoperations = Dailyoperation::where('name', 'LIKE', $this->tash8el_name_search)
            ->get();
        }




        else 
        {
            $dailyoperations = Dailyoperation::all();
        }




        

        return view('livewire.dailyoperations', ['dailyoperations'=>$dailyoperations]);
    }
}
