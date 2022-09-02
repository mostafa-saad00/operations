<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OfficerFormRequest;
use App\Models\Officer;
use App\Models\Gehat;
use App\Models\Pistol;
use DB;

class OfficerController extends Controller
{
    public function index()
    { 
        $officers = Officer::all();
        return view('officer.index', compact('officers'));
    }

    public function create()
    {
        $gehats = Gehat::all();        
        

        $officers = Officer::all();

        $theArray = [];

        foreach($officers as $officer)
        {
            array_push($theArray, $officer->pistol_id);
        }
        


        $pistols = Pistol::whereNotIn('id', $theArray)->get();

        

        return view('officer.create', compact('gehats', 'pistols'));
    }

    public function store(OfficerFormRequest $request)
    {
        $data = $request->validated();

        
        $officer = Officer::create([
            'gehat_id' => $data['gehat'],
            'pistol_id' => $data['pistol'],
            'rank' => $data['rank'],
            'name' => $data['name'],
            'nick_name' => $data['nick_name'],
            'tarteb' => $data['tarteb'],
            'year_of_graduate' => $data['year_of_graduate'],
            'what_he_do' => $data['what_he_do'],
            'address' => $data['address'],
            'city' => $data['city'],
            'religion' => $data['religion'],
            'status' => $data['status'],
            'phone1' => $data['phone1'],
            'phone2' => $request->phone2,
            'health' => $data['health'],
        ]);

        if($request->officerTrainings != null)
        {
            foreach($request->officerTrainings as $officerTraining)
            {
                $officer->trainings()->attach($officerTraining);
            }
        }
        return redirect('/create-officer')->with('message', 'تم اضافة ضابط بنجاح');
    }

    public function edit(Officer $officer)
    {
        $officers = Officer::all();

        $theArray = [];

        foreach($officers as $x_officer)
        {
            array_push($theArray, $x_officer->pistol_id);
        }

        $pistols = Pistol::whereNotIn('id', $theArray)->get();
        $gehats = Gehat::all();
        return view('officer.edit', compact('officer', 'gehats', 'pistols'));
    }

    public function update(OfficerFormRequest $request, Officer $officer)
    {
        $data = $request->validated();

        if($request->officerTrainings != null)
        {
            $officer->trainings()->detach();
            foreach($request->officerTrainings as $officerTraining)
            {
                $officer->trainings()->attach($officerTraining);
            }
        }       
        

        $officer = Officer::where('id', $officer->id)->update([
            'gehat_id' => $data['gehat'],
            'pistol_id' => $data['pistol'],
            'rank' => $data['rank'],
            'name' => $data['name'],
            'nick_name' => $data['nick_name'],
            'tarteb' => $data['tarteb'],
            'year_of_graduate' => $data['year_of_graduate'],
            'what_he_do' => $data['what_he_do'],
            'address' => $data['address'],
            'city' => $data['city'],
            'religion' => $data['religion'],
            'status' => $data['status'],
            'phone1' => $data['phone1'],
            'phone2' => $request->phone2,
            'health' => $data['health'],
        ]);

        

        return redirect('/officers')->with('message', 'تم تعديل الضابط بنجاح');
    }

    public function destroy(Officer $officer)
    {
        $officer->delete();
        return redirect('/officers')->with('message', 'تم حذف الضابط بنجاح');

    }

}
