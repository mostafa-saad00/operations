<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FromtooperationFormRequest;
use App\Models\Dailyoperation;
use App\Models\Fromtooperation;
use App\Models\Weeklyofficeroperation;


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

    public function table(Fromtooperation $fromtooperation)
    {
        $averageOperations = Dailyoperation::where('type', 'خدمة عادية')->get();
        $argentOperations = Dailyoperation::where('type', 'خدمة طائة')->get();
        $offDaysOperations = Dailyoperation::where('type', 'راحة اسبوعية')->orWhere('type', 'راحة تعويضية')->get();
        $twagodOperations = Dailyoperation::where('type', 'تواجد مسائي')->get();

        $agazatOperation = Dailyoperation::where('type', 'اجازات')->first();
        $maradiOperation = Dailyoperation::where('type', 'مرضي')->first();
        $sinaOperation = Dailyoperation::where('type', 'مامورية سيناء')->first();
        $sinaOffOperation = Dailyoperation::where('type', 'راحة مامورية سيناء')->first();
        
        $antedabOperation = Dailyoperation::where('type', 'انتداب')->first();
        $ferakOperation = Dailyoperation::where('type', 'فرق')->first();
        $currentOfficer1 = '';
        $currentOfficer2 = '';
        $currentOfficer3 = '';
        $currentOfficer4 = '';
        $currentOfficer5 = '';
        $currentOfficer6 = '';
       

        //$agazatweeklyofficeroperations = Weeklyofficeroperation::where('fromtooperation_id', $fromtooperation->id)->where('day', 'sat')->orWhere('day', 'sun')->orWhere('day', 'mon')->orWhere('day', 'tue')->orWhere('day', 'wed')->orWhere('day', 'thu')->orWhere('day', 'fri')->get();
        $weeklyofficeroperations = Weeklyofficeroperation::where('fromtooperation_id', $fromtooperation->id)->get();
        return view('fromtooperation.table', compact('fromtooperation',
                                                    'weeklyofficeroperations',
                                                     'averageOperations',
                                                      'argentOperations',
                                                       'offDaysOperations',
                                                        'twagodOperations',
                                                         'agazatOperation',
                                                         'maradiOperation',
                                                         'sinaOperation',
                                                         'sinaOffOperation',
                                                         'antedabOperation',
                                                         'ferakOperation',
                                                         'currentOfficer1',
                                                         'currentOfficer2',
                                                         'currentOfficer3',
                                                         'currentOfficer4',
                                                         'currentOfficer5',
                                                         'currentOfficer6',
                                                        ));
    }
}
