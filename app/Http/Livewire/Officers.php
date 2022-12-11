<?php

namespace App\Http\Livewire;

use App\Models\Gehat;
use App\Models\Pistol;
use App\Models\Officer;
use Livewire\Component;
use Livewire\WithPagination;

class Officers extends Component
{
    use WithPagination;

    public $search;
    public $searchTerm;
    public $gehats;
    public $pistols;
    public $algeha;
    public $records;
    

    public function mount()
    {
        $this->gehats = Gehat::all();
        $this->pistols = Pistol::all();   
    }

    public function render()
    {
        $searchTerm = '%'.$this->searchTerm . '%';
        $officers = Officer::where('rank', 'LIKE', $searchTerm)
                    ->orWhere('name', 'LIKE', $searchTerm)
                    ->orWhere('nick_name', 'LIKE', $searchTerm)
                    ->orWhere('tarteb', 'LIKE', $searchTerm)
                    ->orWhere('year_of_graduate', 'LIKE', $searchTerm)
                    ->orWhere('what_he_do', 'LIKE', $searchTerm)
                    ->orWhere('address', 'LIKE', $searchTerm)
                    ->orWhere('city', 'LIKE', $searchTerm)
                    ->orWhere('religion', 'LIKE', $searchTerm)
                    ->orWhere('status', 'LIKE', $searchTerm)
                    ->orWhere('phone1', 'LIKE', $searchTerm)
                    ->orWhere('phone2', 'LIKE', $searchTerm)
                    ->orWhere('health', 'LIKE', $searchTerm)
                    ->orderBy('year_of_graduate', 'ASC')
                    ->orderBy('tarteb', 'ASC')
                    ->paginate($this->records);

        if($this->algeha != '')   
        {
            $officers = Officer::where('gehat_id', 'LIKE',  $this->algeha)->paginate($this->records);
        }             


        return view('livewire.officers', ['officers'=>$officers]);
    }
}
