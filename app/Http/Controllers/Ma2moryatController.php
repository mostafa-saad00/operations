<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ma2moryat;
use Illuminate\Support\Facades\Validator;




class Ma2moryatController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'officer_id' => 'required|max:255',
            'dailyoperation_id' => 'required|max:255',
            'date' => 'required|max:255',
        ],$messages =[
            'officer_id.required' => 'لم يتم تحديد ضابط',
            'dailyoperation_id.required' => 'لم يتم تحديد مأمورية',
            'date.required' => 'لم يتم تحديد التاريخ',
        ]);

        if ($validator->fails())
        {
            return redirect('/ma2moryats')->withErrors($validator)->withInput(); 
        }

        $check_for_dublicated_records = Ma2moryat::where('officer_id', $request->officer_id)
                                                ->where('date', date('Y-m-d', strtotime($request->date)))
                                                ->count();

        if($check_for_dublicated_records > 0)      
        {
            return redirect('/ma2moryats')->withErrors(['errorr' => 'تأكد من ادخال البيانات بطريقة صحيحة وعدم تكرار البيانات']);
        }                                  

        $ma2moryat = Ma2moryat::create([
            'officer_id' => $request->officer_id,
            'dailyoperation_id' => $request->dailyoperation_id,
            'date' => date('Y-m-d', strtotime($request->date)),
            'day' => date('d', strtotime($request->date)),
            'month' => date('m', strtotime($request->date)),
            'year' => date('Y', strtotime($request->date)),
        ]);

        return redirect('/ma2moryats')->with('message', 'تم تعيين الضابط في المأمورية بنجاح');

    }

    public function destroy(Ma2moryat $ma2moryat)
    {
        $ma2moryat->delete();
        return redirect('/ma2moryats')->with('message', 'تم حذف تعيين الضابط في المأمورية بنجاح');
    }
}
