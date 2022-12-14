<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dailyoperation;
use App\Http\Requests\DailyoperationFormRequest;
use App\Models\Fromtooperation;
use App\Models\Weeklyofficeroperation;
use App\Models\Gehat;

class DailyoperationController extends Controller
{
    public function index()
    {
        $dailyoperations = Dailyoperation::all();
        return view('dailyoperation.index', compact('dailyoperations'));
    }

    public function create()
    {
        return view('dailyoperation.create');
    }

    public function store(DailyoperationFormRequest $request)
    {
        $data = $request->validated();
        if ($data['price'])
        {
            $operation_price = $data['price'];
        }
        else
        {
            $operation_price = 0;
        }

        $dailyoperation = Dailyoperation::create([
            'name' => $data['name'],
            'type' => $data['type'],
            'price' => $operation_price,
        ]);

        return redirect('/dailyoperations')->with('message', 'تم اضافة خدمة بنجاح');
    }

    public function edit(Dailyoperation $dailyoperation)
    {
        return view('dailyoperation.edit', compact('dailyoperation'));
    }

    public function update(DailyoperationFormRequest $request, Dailyoperation $dailyoperation)
    {
        $data = $request->validated();

        $dailyoperation = Dailyoperation::where('id', $dailyoperation->id)->update([
            'name' => $data['name'],
            'type' => $data['type'],
            'price' => $data['price'],
            'status' => $request->status,
        ]);

        return redirect('/dailyoperations')->with('message', 'تم تعديل خدمة بنجاح');
    }

    public function destroy(Dailyoperation $dailyoperation)
    {
        $dailyoperation->delete();
        return redirect('/dailyoperations')->with('message', 'تم حذف الخدمة بنجاح');

    }

    public function table(Fromtooperation $fromtooperation, $day)
    {
        $gehats = Gehat::all();
        $weeklyOfficerOperations = Weeklyofficeroperation::where('fromtooperation_id', $fromtooperation->id)->where('day', $day)->get();
        return view('dailyoperation.table', compact('gehats', 'weeklyOfficerOperations'));
    }
}
