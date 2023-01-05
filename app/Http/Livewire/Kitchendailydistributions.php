<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Kitchendailydistribution;

class Kitchendailydistributions extends Component
{
    public $search_by_date;

    public function render()
    {
        if($this->search_by_date != '')
        {
            $kitchendailydistributions = Kitchendailydistribution::where('date', $this->search_by_date)
                                                                    ->orderBy('date', 'DESC')
                                                                    ->get();
        }
        else
        {
            $kitchendailydistributions = Kitchendailydistribution::orderBy('date', 'DESC')->get();
        }
        return view('livewire.kitchendailydistributions', ['kitchendailydistributions' => $kitchendailydistributions]);
    }
}
