<?php

namespace App\Http\Controllers;

use App\Models\Kitchenitem;
use App\Models\TemporaryFile;
use Illuminate\Http\Request;
use App\Http\Requests\KitchenreceiptFormRequest;
use App\Models\Kitchenreceipt;
use App\Models\Kitchenreceiptitem;
use Illuminate\Support\Facades\Storage;


class KitchenreceiptController extends Controller
{
    public function create()
    {
        $kitchenitems = Kitchenitem::all();
        return view('kitchenreceipt.create', compact('kitchenitems'));
    }

    public function store(KitchenreceiptFormRequest $request)
    {
        $tmp_file = TemporaryFile::where('folder', $request->image)->first();
        $kitchenreceipt = (object)array();

        if($tmp_file)
        {
            $kitchenreceipt = Kitchenreceipt::create([
                'image_folder' => $tmp_file->folder,
                'image_text' => $tmp_file->file,
                'date' => $request->date,
            ]);

            Storage::copy('posts/tmp/' . $tmp_file->folder . '/' . $tmp_file->file, 'kitchenreceipts/' . $tmp_file->folder . '/' . $tmp_file->file);

            Storage::deleteDirectory('posts/tmp/' . $tmp_file->folder);
            foreach(TemporaryFile::all() as $temporary_file)
            {
                $temporary_file->delete();  
            }
            
        }
        else
        {
            return back();
        }

        $kitchenitems = Kitchenitem::all();
        foreach($kitchenitems as $item)
        {
            if(request('kitchenitem' . '_' . $item->id) != null)
            {
                Kitchenreceiptitem::create([
                    'kitchenreceipt_id' => $kitchenreceipt->id,
                    'kitchenitem_id' => $item->id,
                    'quantity' => request('kitchenitem' . '_' . $item->id),
                ]);

                $selected_item = Kitchenitem::where('id', $item->id)->first();

                $selected_item->update([
                    'current_quantity' => $selected_item->current_quantity + request('kitchenitem' . '_' . $item->id),
                ]);
            }
        }


        return redirect('/kitchenreceipts')->with('message', 'تم اضافة سند الصرف بنجاح');
    }

    public function destroy(Kitchenreceipt $kitchenreceipt)
    {
        $kitchenreceiptitems = Kitchenreceiptitem::where('kitchenreceipt_id', $kitchenreceipt->id)->get();
        foreach($kitchenreceiptitems as $kitchenreceiptitem)
        {
            $selected_kitchen_item = Kitchenitem::where('id', $kitchenreceiptitem->kitchenitem_id)->first();

            $selected_kitchen_item->update([
                'current_quantity' => $selected_kitchen_item->current_quantity - $kitchenreceiptitem->quantity,
            ]);
            $kitchenreceiptitem->delete();
        }

        $kitchenreceipt->delete();
        return redirect('/kitchenreceipts')->with('message', 'تم حذف سند الصرف بنجاح وتعديل كميات الاصناف');

        
    }

    public function show()
    {
        return view('kitchenreceipt.show');
    }

    public function print_kitchenreceipt()
    {
        
    }
}
