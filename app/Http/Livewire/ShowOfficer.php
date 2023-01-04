<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Officer;
use App\Models\Gehat;
use App\Models\Dailyoperation;
use App\Models\Weeklyofficeroperation;
use App\Models\Ma2moryat;

class ShowOfficer extends Component
{
    public $officer;
    public $gehats;
    public $dailyOperations;
    public $date_range;
    public $date_from;
    public $date_to;
    public $totalNagadatAhdaf;

    public function mount($officer)
    {
        $this->officer = Officer::find($officer);
        $this->gehats = Gehat::all();
        $this->dailyOperations = Dailyoperation::all();
    }

    public function render()
    {
        $year = date('Y');

        // Create a timestamp for the first day of the year
        $timestamp = mktime(0, 0, 0, 1, 1, $year);

        // Format the timestamp as a date
        $this->date_from = date("Y-m-d", $timestamp);
        $this->date_to = $currentDate = date("Y-m-d");

        if(strlen($this->date_range) > 15)
        {
            // Split the date range into two dates
            $dates = explode(" to ", $this->date_range);

            $this->date_from = $dates[0];
            $this->date_to = $dates[1];
          
        }


        $calculateNagadatAhdafs = Weeklyofficeroperation::where('officer_id', $this->officer->id)
                                ->whereBetween('date', [$this->date_from, $this->date_to])
                                ->get();

      

        $totalNagadatAhdaf = 0;                        


        foreach($calculateNagadatAhdafs as $nagadat)                        
        {
            $totalNagadatAhdaf = $totalNagadatAhdaf + Dailyoperation::find($nagadat->dailyoperation_id)->price;
        }

        $this->totalNagadatAhdaf = $totalNagadatAhdaf;


        $getAgazaTar2aId = Dailyoperation::where('type', 'اجازة طارئة')->first()->id;
        $OfficerAgazatTar2a = Weeklyofficeroperation::where('officer_id', $this->officer->id)
        ->where("dailyoperation_id", $getAgazaTar2aId)
        ->whereBetween('date', [$this->date_from, $this->date_to])
        ->get();
        

        $getAgazaDawryId = Dailyoperation::where('type', 'اجازة دوري')->first()->id;
        $OfficerAgazatDawry = Weeklyofficeroperation::where('officer_id', $this->officer->id)
        ->where("dailyoperation_id", $getAgazaDawryId)
        ->whereBetween('date', [$this->date_from, $this->date_to])
        ->get();


        $getAgazaMaradyId = Dailyoperation::where('type', 'اجازة مرضي')->first()->id;
        $OfficerAgazatMarady = Weeklyofficeroperation::where('officer_id', $this->officer->id)
        ->where("dailyoperation_id", $getAgazaMaradyId)
        ->whereBetween('date', [$this->date_from, $this->date_to])
        ->get();


        $UniqueofficerOperations = Weeklyofficeroperation::where('officer_id', $this->officer->id)
        ->whereBetween('date', [$this->date_from, $this->date_to])
        ->get()
        ->unique('date');

        $officerOperations = Weeklyofficeroperation::where('officer_id', $this->officer->id)
                        ->whereBetween('date', [$this->date_from, $this->date_to])
                        ->get();

        $monthsArray = [];
        foreach($officerOperations as $operation)
        {
        array_push($monthsArray, $operation->month);
        }
        $monthsUniqueArray = array_unique($monthsArray);   
        // End tash8el code

        // Ma2moryat code
        $officerMa2moryats = Ma2moryat::where('officer_id', $this->officer->id)
                        ->whereBetween('date', [$this->date_from, $this->date_to])
                        ->get();

        $officerYearsArray = [];
        foreach($officerMa2moryats as $ma2moryat)
        {
        array_push($officerYearsArray, $ma2moryat->year);
        }
        $yearsUniqueArray = array_unique($officerYearsArray); 

        // End Ma2moryat code 

        return view('livewire.show-officer', ['UniqueofficerOperations' => $UniqueofficerOperations,
                                              'OfficerAgazatTar2a' => $OfficerAgazatTar2a,
                                              'OfficerAgazatDawry' => $OfficerAgazatDawry,
                                              'OfficerAgazatMarady' => $OfficerAgazatMarady,
                                              'officerOperations' => $officerOperations,
                                              'monthsUniqueArray' => $monthsUniqueArray,
                                              'officerMa2moryats' => $officerMa2moryats,
                                              'yearsUniqueArray' => $yearsUniqueArray,
                                              'yearsUniqueArray' => $yearsUniqueArray,
                                              'date_from' => $this->date_from,
                                              'date_to' => $this->date_to,
                                              '$totalNagadatAhdaf' => $totalNagadatAhdaf,
                                              ]);
    }
}
 