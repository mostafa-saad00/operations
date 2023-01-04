<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kitchenitem;
use App\Http\Requests\KitchenitemFormRequest;

class KitchenitemController extends Controller
{
    public function create()
    {
        return view('kitchen.create');
    }

    public function store(KitchenitemFormRequest $request)
    {
        $kitchenitem = Kitchenitem::create([
            'name' => $request->name,
            'unit' => $request->unit,
            'current_quantity' => $request->current_quantity,

            'saturday_winter_officer' => $request->saturday_winter_officer,
            'saturday_summer_officer' => $request->saturday_summer_officer,
            'saturday_winter_solider' => $request->saturday_winter_solider,
            'saturday_summer_solider' => $request->saturday_summer_solider,
            'saturday_winter_amen' => $request->saturday_winter_amen,
            'saturday_summer_amen' => $request->saturday_summer_amen,

            'sunday_winter_officer' => $request->sunday_winter_officer,
            'sunday_summer_officer' => $request->sunday_summer_officer,
            'sunday_winter_solider' => $request->sunday_winter_solider,
            'sunday_summer_solider' => $request->sunday_summer_solider,
            'sunday_winter_amen' => $request->sunday_winter_amen,
            'sunday_summer_amen' => $request->sunday_summer_amen,

            'monday_winter_officer' => $request->monday_winter_officer,
            'monday_summer_officer' => $request->monday_summer_officer,
            'monday_winter_solider' => $request->monday_winter_solider,
            'monday_summer_solider' => $request->monday_summer_solider,
            'monday_winter_amen' => $request->monday_winter_amen,
            'monday_summer_amen' => $request->monday_summer_amen,

            'tuesday_winter_officer' => $request->tuesday_winter_officer,
            'tuesday_summer_officer' => $request->tuesday_summer_officer,
            'tuesday_winter_solider' => $request->tuesday_winter_solider,
            'tuesday_summer_solider' => $request->tuesday_summer_solider,
            'tuesday_winter_amen' => $request->tuesday_winter_amen,
            'tuesday_summer_amen' => $request->tuesday_summer_amen,

            'wednesday_winter_officer' => $request->wednesday_winter_officer,
            'wednesday_summer_officer' => $request->wednesday_summer_officer,
            'wednesday_winter_solider' => $request->wednesday_winter_solider,
            'wednesday_summer_solider' => $request->wednesday_summer_solider,
            'wednesday_winter_amen' => $request->wednesday_winter_amen,
            'wednesday_summer_amen' => $request->wednesday_summer_amen,

            'thursday_winter_officer' => $request->thursday_winter_officer,
            'thursday_summer_officer' => $request->thursday_summer_officer,
            'thursday_winter_solider' => $request->thursday_winter_solider,
            'thursday_summer_solider' => $request->thursday_summer_solider,
            'thursday_winter_amen' => $request->thursday_winter_amen,
            'thursday_summer_amen' => $request->thursday_summer_amen,

            'friday_winter_officer' => $request->friday_winter_officer,
            'friday_summer_officer' => $request->friday_summer_officer,
            'friday_winter_solider' => $request->friday_winter_solider,
            'friday_summer_solider' => $request->friday_summer_solider,
            'friday_winter_amen' => $request->friday_winter_amen,
            'friday_summer_amen' => $request->friday_summer_amen,
        ]);

        return redirect()->route('index-kitchenitems')->with('message', 'تم اضافة صنف جديد بنجاح');
    }

    public function edit(Kitchenitem $kitchenitem)
    {
        return view('kitchen.edit', compact('kitchenitem'));
    }

    public function update(KitchenitemFormRequest $request, Kitchenitem $kitchenitem)
    {
        $kitchenitem = Kitchenitem::where('id', $kitchenitem->id)->update([
            'name' => $request->name,
            'unit' => $request->unit,
            'current_quantity' => $request->current_quantity,

            'saturday_winter_officer' => $request->saturday_winter_officer,
            'saturday_summer_officer' => $request->saturday_summer_officer,
            'saturday_winter_solider' => $request->saturday_winter_solider,
            'saturday_summer_solider' => $request->saturday_summer_solider,
            'saturday_winter_amen' => $request->saturday_winter_amen,
            'saturday_summer_amen' => $request->saturday_summer_amen,

            'sunday_winter_officer' => $request->sunday_winter_officer,
            'sunday_summer_officer' => $request->sunday_summer_officer,
            'sunday_winter_solider' => $request->sunday_winter_solider,
            'sunday_summer_solider' => $request->sunday_summer_solider,
            'sunday_winter_amen' => $request->sunday_winter_amen,
            'sunday_summer_amen' => $request->sunday_summer_amen,

            'monday_winter_officer' => $request->monday_winter_officer,
            'monday_summer_officer' => $request->monday_summer_officer,
            'monday_winter_solider' => $request->monday_winter_solider,
            'monday_summer_solider' => $request->monday_summer_solider,
            'monday_winter_amen' => $request->monday_winter_amen,
            'monday_summer_amen' => $request->monday_summer_amen,

            'tuesday_winter_officer' => $request->tuesday_winter_officer,
            'tuesday_summer_officer' => $request->tuesday_summer_officer,
            'tuesday_winter_solider' => $request->tuesday_winter_solider,
            'tuesday_summer_solider' => $request->tuesday_summer_solider,
            'tuesday_winter_amen' => $request->tuesday_winter_amen,
            'tuesday_summer_amen' => $request->tuesday_summer_amen,

            'wednesday_winter_officer' => $request->wednesday_winter_officer,
            'wednesday_summer_officer' => $request->wednesday_summer_officer,
            'wednesday_winter_solider' => $request->wednesday_winter_solider,
            'wednesday_summer_solider' => $request->wednesday_summer_solider,
            'wednesday_winter_amen' => $request->wednesday_winter_amen,
            'wednesday_summer_amen' => $request->wednesday_summer_amen,

            'thursday_winter_officer' => $request->thursday_winter_officer,
            'thursday_summer_officer' => $request->thursday_summer_officer,
            'thursday_winter_solider' => $request->thursday_winter_solider,
            'thursday_summer_solider' => $request->thursday_summer_solider,
            'thursday_winter_amen' => $request->thursday_winter_amen,
            'thursday_summer_amen' => $request->thursday_summer_amen,

            'friday_winter_officer' => $request->friday_winter_officer,
            'friday_summer_officer' => $request->friday_summer_officer,
            'friday_winter_solider' => $request->friday_winter_solider,
            'friday_summer_solider' => $request->friday_summer_solider,
            'friday_winter_amen' => $request->friday_winter_amen,
            'friday_summer_amen' => $request->friday_summer_amen,
        ]);
        return redirect()->route('index-kitchenitems')->with('message', 'تم تعديل الصنف بنجاح');
    }

    public function destroy(Kitchenitem $kitchenitem)
    {
        $kitchenitem->delete();
        return redirect()->route('index-kitchenitems')->with('message', 'تم حذف الصنف بنجاح');
    }
}
