<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kitchenitem;
use Illuminate\Http\Request;
use App\Models\TemporaryFile;
use App\Models\Kitchenreceipt;
use App\Models\Kitchenreceiptitem;
use Illuminate\Support\Facades\Storage;
use App\Models\SectorKitchenItemTransaction;
use App\Http\Requests\KitchenreceiptFormRequest;


class KitchenreceiptController extends Controller
{
    public function create()
    {
        $kitchenitems = Kitchenitem::all();
        return view('kitchenreceipt.create', compact('kitchenitems'));
    }

    public function store(KitchenreceiptFormRequest $request, User $user)
    {
        $tmp_file = TemporaryFile::where('folder', $request->image)->first();
        $kitchenreceipt = (object)array();

        if($tmp_file)
        {
            $kitchenreceipt = Kitchenreceipt::create([
                'area_id' => $user->area_id,
                'sector_id' => $user->sector_id,
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
            $kitchenreceipt = Kitchenreceipt::create([
                'area_id' => $user->area_id,
                'sector_id' => $user->sector_id,
                'date' => $request->date,
            ]);
        }

        $kitchenitems = Kitchenitem::all();
        foreach($kitchenitems as $item)
        {
            if(request('kitchenitem' . '_' . $item->id) != null)
            {
                Kitchenreceiptitem::create([
                    'area_id' => $user->area_id,
                    'sector_id' => $user->sector_id,
                    'kitchenreceipt_id' => $kitchenreceipt->id,
                    'kitchenitem_id' => $item->id,
                    'date' => $request->date,
                    'before_quantity' => $item->current_quantity,
                    'after_quantity' => $item->current_quantity + request('kitchenitem' . '_' . $item->id),
                    'quantity' => request('kitchenitem' . '_' . $item->id),
                ]);


                $selected_item = Kitchenitem::where('id', $item->id)->first();

                $before_quantity = $selected_item->current_quantity;
                $after_quantity = $selected_item->current_quantity + request('kitchenitem' . '_' . $item->id);

                $selected_item->update([
                    'current_quantity' => $after_quantity,
                ]);

                SectorKitchenItemTransaction::create([
                    'area_id' => $user->area_id,
                    'sector_id' => $user->sector_id,
                    'kitchenitem_id' => $item->id, 
                    'kitchenreceipt_id' => $kitchenreceipt->id,
                    'in_out' => 1,
                    'date' => $request->date,
                    'before_quantity' => $before_quantity,
                    'after_quantity' => $after_quantity,
                    'transaction_quantity' => request('kitchenitem' . '_' . $item->id),
                ]);
                
            }
        }


        return redirect('/kitchenreceipts')->with('message', 'تم اضافة سند الصرف بنجاح');
    }

    public function destroy(Kitchenreceipt $kitchenreceipt)
    {
        $kitchenreceiptitems = Kitchenreceiptitem::where('kitchenreceipt_id', $kitchenreceipt->id)->get();
        $sector_kitchen_item_transactions = SectorKitchenItemTransaction::where('kitchenreceipt_id', $kitchenreceipt->id)->get();

        foreach($kitchenreceiptitems as $kitchenreceiptitem)
        {
            $selected_kitchen_item = Kitchenitem::where('id', $kitchenreceiptitem->kitchenitem_id)->first();

            $selected_kitchen_item->update([
                'current_quantity' => $selected_kitchen_item->current_quantity - $kitchenreceiptitem->quantity,
            ]);
            $kitchenreceiptitem->delete();
        }

        foreach($sector_kitchen_item_transactions as $transaction)
        {
            $transaction->delete();
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
