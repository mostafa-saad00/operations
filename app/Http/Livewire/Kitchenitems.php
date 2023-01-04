<?php

namespace App\Http\Livewire;

use App\Models\Kitchenitem;
use Livewire\Component;

class Kitchenitems extends Component
{
    public $kitchenitem_name_search;

    public function render()
    {
        if($this->kitchenitem_name_search != '')
        {
            $kitchenitems = Kitchenitem::where('name', 'LIKE', $this->kitchenitem_name_search)->get();      
        }
        else 
        {
            $kitchenitems = Kitchenitem::all();
        }

        return view('livewire.kitchenitems', ['kitchenitems' => $kitchenitems]);
    }
}
