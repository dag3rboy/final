<?php

namespace App\Http\Livewire;

use App\Models\Doctor;
use App\Models\Wilaya;
use Livewire\Component;

class SearchDoctor extends Component
{

    // search filtervariables 
    public
        $search,
        $searchByWilaya,
        $searchBySpeciality;

    public function render()
    {

        return view('livewire.search-doctor', [

            'doctors' => Doctor::when($this->searchByWilaya, function ($query) {
                $query->where('dr_wilaya', $this->searchByWilaya);
            })->when($this->searchBySpeciality, function ($query) {
                $query->where('dr_speciality', $this->searchBySpeciality);
            })
                ->where('dr_active', 1)
                ->search(trim($this->search))
                ->orderBy('dr_id', 'asc')
                ->paginate(20),
            'wilayas' => Wilaya::all()
        ]);

    }
}
