<?php

namespace App\Http\Livewire;

use App\Models\Kitchenreceipt;
use Livewire\Component;

class Kitchenreceipts extends Component
{
    public $search_by_date;

    public function render()
    {
        if($this->search_by_date != '')
        {
            $kitchenreceipts = Kitchenreceipt::where('date', $this->search_by_date)
                                                                    ->orderBy('date', 'DESC')
                                                                    ->get();
        }
        else
        {
            $kitchenreceipts = Kitchenreceipt::orderBy('date', 'DESC')->get();
        }

        return view('livewire.kitchenreceipts', ['kitchenreceipts' => $kitchenreceipts]);
    }
}
