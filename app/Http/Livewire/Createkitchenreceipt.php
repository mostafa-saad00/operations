<?php

namespace App\Http\Livewire;

use App\Models\Kitchenitem;
use App\Models\Kitchensupplier;
use Livewire\Component;

class Createkitchenreceipt extends Component
{
    public $kitchensupplier_id;

    public function render()
    {
        $kitchensuppliers = Kitchensupplier::all();

        $kitchenitems = Kitchenitem::where('kitchensupplier_id', $this->kitchensupplier_id)->get();
        
        return view('livewire.createkitchenreceipt', ['kitchenitems' => $kitchenitems, 'kitchensuppliers' => $kitchensuppliers]);
    }
}
