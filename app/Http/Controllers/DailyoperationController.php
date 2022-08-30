<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dailyoperation;
use App\Http\Requests\DailyoperationFormRequest;


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

        $dailyoperation = Dailyoperation::create([
            'name' => $data['name'],
        ]);

        return redirect('/create-dailyoperation')->with('message', 'تم اضافة تشغيل بنجاح');
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
            'status' => $request->status,
        ]);

        return redirect('/dailyoperations')->with('message', 'تم تعديل تشغيل بنجاح');
    }

    public function destroy(Dailyoperation $dailyoperation)
    {
        $dailyoperation->delete();
        return redirect('/dailyoperations')->with('message', 'تم حذف التشغيل بنجاح');

    }
}
