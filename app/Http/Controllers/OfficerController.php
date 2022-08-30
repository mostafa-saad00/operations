<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OfficerFormRequest;
use App\Models\Officer;

class OfficerController extends Controller
{
    public function index()
    {
        $officers = Officer::all();
        return view('officer.index', compact('officers'));
    }

    public function create()
    {
        return view('officer.create');
    }

    public function store(OfficerFormRequest $request)
    {
        $data = $request->validated();

        $officer = Officer::create([
            'name' => $data['name'],
            'nick_name' => $data['nick_name'],
            'phone' => $data['phone'],
            'address' => $data['address'],
        ]);

        return redirect('/create-officer')->with('message', 'تم اضافة ضابط بنجاح');
    }

    public function edit(Officer $officer)
    {
        return view('officer.edit', compact('officer'));
    }

    public function update(OfficerFormRequest $request, Officer $officer)
    {
        $data = $request->validated();

        $officer = Officer::where('id', $officer->id)->update([
            'name' => $data['name'],
            'nick_name' => $data['nick_name'],
            'phone' => $data['phone'],
            'address' => $data['address'],
        ]);

        return redirect('/officers')->with('message', 'تم تعديل الضابط بنجاح');
    }

    public function destroy(Officer $officer)
    {
        $officer->delete();
        return redirect('/officers')->with('message', 'تم حذف الضابط بنجاح');

    }

}
