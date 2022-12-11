<?php

namespace App\Http\Controllers;

use App\Models\Fromtooperation;
use App\Models\Officer;
use App\Models\Weeklyofficeroperation;
use Illuminate\Http\Request;

class WeeklyofficeroperationController extends Controller
{
    public function index()
    {
        
    }

    public function create()
    {
    }

    public function store(Request $request, Officer $officer, Fromtooperation $fromtooperation)
    {

        
        $weeklyoperations = Weeklyofficeroperation::where('officer_id', $officer->id)->where('fromtooperation_id', $fromtooperation->id)->get();
         
        
        foreach($weeklyoperations as $weeklyoperation)
        {
            $query = Weeklyofficeroperation::find($weeklyoperation->id);
            $query->delete();
        }

        foreach($request->satoperations as $satoperation)
        {
            
            Weeklyofficeroperation::create([
                'officer_id' => $officer->id,
                'fromtooperation_id' => $fromtooperation->id,
                'dailyoperation_id' => $satoperation['dailyoperation_id'],
                'day' => 'sat',
                'date' => date('Y-m-d', strtotime($fromtooperation->from. ' + 0 day')),
                'month' => date('m', strtotime($fromtooperation->from. ' + 0 day')),
                'year' => date('Y', strtotime($fromtooperation->from. ' + 0 day')),
            ]);

        }
        
        foreach($request->sunoperations as $sunoperation)
        {
            
            Weeklyofficeroperation::create([
                'officer_id' => $officer->id,
                'fromtooperation_id' => $fromtooperation->id,
                'dailyoperation_id' => $sunoperation['dailyoperation_id'],
                'day' => 'sun',
                'date' => date('Y-m-d', strtotime($fromtooperation->from. ' + 1 day')),
                'month' => date('m', strtotime($fromtooperation->from. ' + 1 day')),
                'year' => date('Y', strtotime($fromtooperation->from. ' + 1 day'))
            ]);

        }

        foreach($request->monoperations as $monoperation)
        {
            
            Weeklyofficeroperation::create([
                'officer_id' => $officer->id,
                'fromtooperation_id' => $fromtooperation->id,
                'dailyoperation_id' => $monoperation['dailyoperation_id'],
                'day' => 'mon',
                'date' => date('Y-m-d', strtotime($fromtooperation->from. ' + 2 day')),
                'month' => date('m', strtotime($fromtooperation->from. ' + 2 day')),
                'year' => date('Y', strtotime($fromtooperation->from. ' + 2 day'))
            ]);

        }

        foreach($request->tueoperations as $tueoperation)
        {
            
            Weeklyofficeroperation::create([
                'officer_id' => $officer->id,
                'fromtooperation_id' => $fromtooperation->id,
                'dailyoperation_id' => $tueoperation['dailyoperation_id'],
                'day' => 'tue',
                'date' => date('Y-m-d', strtotime($fromtooperation->from. ' + 3 day')),
                'month' => date('m', strtotime($fromtooperation->from. ' + 3 day')),
                'year' => date('Y', strtotime($fromtooperation->from. ' + 3 day'))
            ]);

        }

        foreach($request->wedoperations as $wedoperation)
        {
            
            Weeklyofficeroperation::create([
                'officer_id' => $officer->id,
                'fromtooperation_id' => $fromtooperation->id,
                'dailyoperation_id' => $wedoperation['dailyoperation_id'],
                'day' => 'wed',
                'date' => date('Y-m-d', strtotime($fromtooperation->from. ' + 4 day')),
                'month' => date('m', strtotime($fromtooperation->from. ' + 4 day')),
                'year' => date('Y', strtotime($fromtooperation->from. ' + 4 day'))
            ]);

        }

        foreach($request->thuoperations as $thuoperation)
        {
            
            Weeklyofficeroperation::create([
                'officer_id' => $officer->id,
                'fromtooperation_id' => $fromtooperation->id,
                'dailyoperation_id' => $thuoperation['dailyoperation_id'],
                'day' => 'thu',
                'date' => date('Y-m-d', strtotime($fromtooperation->from. ' + 5 day')),
                'month' => date('m', strtotime($fromtooperation->from. ' + 5 day')),
                'year' => date('Y', strtotime($fromtooperation->from. ' + 5 day'))
            ]);

        }

        foreach($request->frioperations as $frioperation)
        {
            
            Weeklyofficeroperation::create([
                'officer_id' => $officer->id,
                'fromtooperation_id' => $fromtooperation->id,
                'dailyoperation_id' => $frioperation['dailyoperation_id'],
                'day' => 'fri',
                'date' => date('Y-m-d', strtotime($fromtooperation->from. ' + 6 day')),
                'month' => date('m', strtotime($fromtooperation->from. ' + 6 day')),
                'year' => date('Y', strtotime($fromtooperation->from. ' + 6 day'))
            ]);

        }

        return redirect()->route('index-weeklyofficeroperations', $fromtooperation->id);

    }

    public function edit()
    {

    }

    public function update()
    {
       
    }

    public function destroy()
    {
       

    }
}
