<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Training;
use App\Http\Requests\TrainingFormRequest;



class TrainingController extends Controller
{
    public function index()
    {
        $trainings = Training::all();
        return view('training.index', compact('trainings'));
    }

    public function create()
    {
        return view('training.create');
    }

    public function store(TrainingFormRequest $request)
    {
        $data = $request->validated();

        $training = Training::create([
            'name' => $data['name'],
        ]);

        return redirect('/trainings')->with('message', 'تم اضافة الفرقة بنجاح');
    }  
    
    public function edit(Training $training)
    {
        return view('training.edit', compact('training'));
    }

    public function update(TrainingFormRequest $request, Training $training)
    {
        $data = $request->validated();

        $training = Training::where('id', $training->id)->update([
            'name' => $data['name'],
        ]);

        return redirect('/trainings')->with('message', 'تم تعديل الفرقة بنجاح');
    }

    public function destroy(Training $training)
    {
        $training->delete();
        return redirect('/trainings')->with('message', 'تم حذف الفرقة بنجاح');

    }
    
}
