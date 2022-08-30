<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FromtooperationFormRequest;
use App\Models\Fromtooperation;


class FromtooperationController extends Controller
{

    public function create()
    {
        return view('fromtooperation.create');
    }

    public function store(FromtooperationFormRequest $request)
    {
        

        $data = $request->validated();

        $day = date("d",strtotime($data['from']));
        $month = date("m",strtotime($data['from']));
        $year = date("y",strtotime($data['from']));


        $fromtooperation = Fromtooperation::create([
            'from' => $data['from'],
            'to' => $data['to'],
            'refrence_number' => $day . $month . $year,
        ]);

        return redirect('/fromtooperations')->with('message', 'تم اضافة تشغيل اسبوعي بنجاح');        
    }



    public function destroy(Fromtooperation $fromtooperation)
    {
        $fromtooperation->delete();
        return redirect('/fromtooperations')->with('message', 'تم حذف التشغيل الاسبوعي بنجاح');
    }
}
