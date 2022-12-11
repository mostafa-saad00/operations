<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pistol;

class Pistols extends Component
{
    public $pistol_number_search;
    public $pistol_type_search;

    public function render()
    {        
        $pistol_number_search = '%'.$this->pistol_number_search . '%';

        if($this->pistol_number_search != '' && $this->pistol_type_search != '')
        {
            $pistols = Pistol::where('type', 'LIKE', $this->pistol_type_search)
                            ->Where('number', 'LIKE', $this->pistol_number_search)        
                            ->get();
        }

        elseif($this->pistol_number_search != '' && $this->pistol_type_search == '')
        {
            $pistols = Pistol::where('number', 'LIKE', $this->pistol_number_search)
                            ->get();
        }

        elseif($this->pistol_number_search == '' && $this->pistol_type_search != '')
        {
            $pistols = Pistol::where('type', 'LIKE', $this->pistol_type_search)
                            ->get();
        }

        else
        {
            $pistols = Pistol::all();
        }
        

        

        return view('livewire.pistols', ['pistols'=>$pistols]);
    }
}
