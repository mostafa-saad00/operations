<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Training;
use App\Models\Officer;

class Editofficertrainings extends Component
{

    public $officer;
    public $officerTrainings;
    public $trainings;

 
    public function mount($officer)
    {
        $this->officer = $officer;
        $this->officerTrainings = $this->officer->trainings;
        $this->trainings = Training::all();
    }

    public function addTraining($officer_id)
    {
        $currentOfficer = Officer::findOrFail($officer_id);
        $firstTraining = Training::first();
        $this->officer->trainings()->attach($firstTraining);
        $this->officerTrainings = $currentOfficer->trainings;
    }

    public function removeTraining($officerTraining_id, $officer_id, $index)
    {
        $currentOfficer = Officer::findOrFail($officer_id);
        $currentTraining = Training::where('id', $officerTraining_id)->first();
        $currentOfficer->trainings()->detach($currentTraining);
        $this->officerTrainings = $currentOfficer->trainings;
    }
    
    public function render()
    {
        return view('livewire.editofficertrainings');
    }
}
