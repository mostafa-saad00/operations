<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PistolFormRequest;
use App\Models\Pistol;


class PistolController extends Controller
{
    public function create()
    {
        return view('pistol.create');
    }

    public function store(PistolFormRequest $request)
    {
        $data = $request->validated();

        $pistol = Pistol::create([
            'type' => $data['type'],
            'number' => $data['number'],
        ]);

        return redirect()->route('create-pistol');
    }

    public function edit(Pistol $pistol)
    {
        return view('pistol.edit', compact('pistol'));
    }

    public function update(PistolFormRequest $request, Pistol $pistol)
    {
        $data = $request->validated();
        $pistol = Pistol::where('id', $pistol->id)->update([
            'type' => $data['type'],
            'number' => $data['number'],
        ]);

        return redirect()->route('index-pistols')->with('message', 'تم تعديل الطبنجة بنجاح');
    }

    public function destroy(Pistol $pistol)
    {
        $pistol->delete();
        return redirect()->route('index-pistols')->with('message', 'تم حذف الطبنجة بنجاح');
    }
}
