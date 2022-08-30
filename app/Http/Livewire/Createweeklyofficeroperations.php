<?php

namespace App\Http\Livewire;

use App\Models\Dailyoperation;
use Livewire\Component;
use App\Models\Officer;
use App\Models\Fromtooperation;
use App\Models\Weeklyofficeroperation;

class Createweeklyofficeroperations extends Component
{
    public $officer;
    public $fromtooperation;
    public $dailyoperations;
    public $weeklyofficeroperations;
    public $satoperations;
    public $sunoperations;
    public $monoperations;
    public $tueoperations;
    public $wedoperations;
    public $thuoperations;
    public $frioperations;


    public function mount($officer, $fromtooperation)
    {
        $this->officer = Officer::find($officer);
        $this->fromtooperation = Fromtooperation::find($fromtooperation);
        $this->dailyoperations = Dailyoperation::all();
        $this->weeklyofficeroperations = Weeklyofficeroperation::where('officer_id', $this->officer->id)->where('fromtooperation_id', $this->fromtooperation->id)->get();
        $this->satoperations = Weeklyofficeroperation::where('officer_id', $this->officer->id)->where('fromtooperation_id', $this->fromtooperation->id)->where('day', 'sat')->get();
        $this->sunoperations = Weeklyofficeroperation::where('officer_id', $this->officer->id)->where('fromtooperation_id', $this->fromtooperation->id)->where('day', 'sun')->get();
        $this->monoperations = Weeklyofficeroperation::where('officer_id', $this->officer->id)->where('fromtooperation_id', $this->fromtooperation->id)->where('day', 'mon')->get();
        $this->tueoperations = Weeklyofficeroperation::where('officer_id', $this->officer->id)->where('fromtooperation_id', $this->fromtooperation->id)->where('day', 'tue')->get();
        $this->wedoperations = Weeklyofficeroperation::where('officer_id', $this->officer->id)->where('fromtooperation_id', $this->fromtooperation->id)->where('day', 'wed')->get();
        $this->thuoperations = Weeklyofficeroperation::where('officer_id', $this->officer->id)->where('fromtooperation_id', $this->fromtooperation->id)->where('day', 'thu')->get();
        $this->frioperations = Weeklyofficeroperation::where('officer_id', $this->officer->id)->where('fromtooperation_id', $this->fromtooperation->id)->where('day', 'fri')->get();
    }

    public function addOperation($day, $day_var)
    {
        Weeklyofficeroperation::create([
            'officer_id' => $this->officer->id,
            'fromtooperation_id' => $this->fromtooperation->id,
            'dailyoperation_id' => $this->dailyoperations->first->id->id,
            'day' => $day
        ]);
        $this->$day_var = Weeklyofficeroperation::where('officer_id', $this->officer->id)->where('fromtooperation_id', $this->fromtooperation->id)->where('day', $day)->get();
    }

    public function removeOperation($id, $day_var, $day)
    {
        Weeklyofficeroperation::where('id', $id)->delete();
        $this->$day_var = Weeklyofficeroperation::where('officer_id', $this->officer->id)->where('fromtooperation_id', $this->fromtooperation->id)->where('day', $day)->get();
    }




    public function render()
    {
        if($this->weeklyofficeroperations->count() < 3)
        {
            Weeklyofficeroperation::create([
                'officer_id' => $this->officer->id,
                'fromtooperation_id' => $this->fromtooperation->id,
                'dailyoperation_id' => $this->dailyoperations->first->id->id,
                'day' => 'sat'
            ]);
            Weeklyofficeroperation::create([
                'officer_id' => $this->officer->id,
                'fromtooperation_id' => $this->fromtooperation->id,
                'dailyoperation_id' => $this->dailyoperations->first->id->id,
                'day' => 'sun'
            ]);
            Weeklyofficeroperation::create([
                'officer_id' => $this->officer->id,
                'fromtooperation_id' => $this->fromtooperation->id,
                'dailyoperation_id' => $this->dailyoperations->first->id->id,
                'day' => 'mon'
            ]);
            Weeklyofficeroperation::create([
                'officer_id' => $this->officer->id,
                'fromtooperation_id' => $this->fromtooperation->id,
                'dailyoperation_id' => $this->dailyoperations->first->id->id,
                'day' => 'tue'
            ]);
            Weeklyofficeroperation::create([
                'officer_id' => $this->officer->id,
                'fromtooperation_id' => $this->fromtooperation->id,
                'dailyoperation_id' => $this->dailyoperations->first->id->id,
                'day' => 'wed'
            ]);
            Weeklyofficeroperation::create([
                'officer_id' => $this->officer->id,
                'fromtooperation_id' => $this->fromtooperation->id,
                'dailyoperation_id' => $this->dailyoperations->first->id->id,
                'day' => 'thu'
            ]);
            Weeklyofficeroperation::create([
                'officer_id' => $this->officer->id,
                'fromtooperation_id' => $this->fromtooperation->id,
                'dailyoperation_id' => $this->dailyoperations->first->id->id,
                'day' => 'fri'
            ]);
            $this->weeklyofficeroperations = Weeklyofficeroperation::where('officer_id', $this->officer->id)->where('fromtooperation_id', $this->fromtooperation->id)->get();

            $this->satoperations = Weeklyofficeroperation::where('officer_id', $this->officer->id)->where('fromtooperation_id', $this->fromtooperation->id)->where('day', 'sat')->get();
            $this->sunoperations = Weeklyofficeroperation::where('officer_id', $this->officer->id)->where('fromtooperation_id', $this->fromtooperation->id)->where('day', 'sun')->get();
            $this->monoperations = Weeklyofficeroperation::where('officer_id', $this->officer->id)->where('fromtooperation_id', $this->fromtooperation->id)->where('day', 'mon')->get();
            $this->tueoperations = Weeklyofficeroperation::where('officer_id', $this->officer->id)->where('fromtooperation_id', $this->fromtooperation->id)->where('day', 'tue')->get();
            $this->wedoperations = Weeklyofficeroperation::where('officer_id', $this->officer->id)->where('fromtooperation_id', $this->fromtooperation->id)->where('day', 'wed')->get();
            $this->thuoperations = Weeklyofficeroperation::where('officer_id', $this->officer->id)->where('fromtooperation_id', $this->fromtooperation->id)->where('day', 'thu')->get();
            $this->frioperations = Weeklyofficeroperation::where('officer_id', $this->officer->id)->where('fromtooperation_id', $this->fromtooperation->id)->where('day', 'fri')->get();
    
        }


        return view('livewire.createweeklyofficeroperations');
    }
}
