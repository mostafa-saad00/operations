<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Training;

class Createofficertrainings extends Component
{
    public $officerTrainings = [];
    public $trainings = [];

    public function mount()
    {
        $this->trainings = Training::all();
    }

    public function addTraining()
    {
        $this->officerTrainings[] = [];
    }

    public function removeTraining($index)
    {
        unset($this->officerTrainings[$index]);
        array_values($this->officerTrainings);
    }

    public function render()
    {
        return view('livewire.createofficertrainings');
    }

    
}
