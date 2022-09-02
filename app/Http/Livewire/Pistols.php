<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pistol;

class Pistols extends Component
{
    public $searchTerm;

    public function render()
    {        
        $searchTerm = '%'.$this->searchTerm . '%';

        $pistols = Pistol::where('type', 'LIKE', $searchTerm)
                            ->orWhere('number', 'LIKE', $searchTerm)        
                            ->get();

        return view('livewire.pistols', ['pistols'=>$pistols]);
    }
}
