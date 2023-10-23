<?php

namespace App\Http\Livewire;

use App\Models\Doctor;
use App\Models\Patient;
use Livewire\Component;

class EmailSender extends Component
{

    public $dr_email, $pa_email;
    
    // search filter variables 
    public $search;

    public function render()
    {
        // return view('livewire.email-sender', [
        //     'patients' => Patient::all()
        //         ->search(trim($this->search))
        //         ->orderBy('pa_id', 'desc')
        //         ->paginate(6)
        // ]);

        return view('livewire.email-sender', [
            'patients' => Patient::all(),
            'doctors' => Doctor::all()
        ]);
    }

    // function to open doctors emails list modal 
    public function openSendEmailModal($dr_email)
    {
        $this->dr_email = $dr_email;
        $this->dispatchBrowserEvent('openSendEmailModal');
    }

    // function to open patients emails list modal 
    // public function openPatientsEmailListModal()
    // {
    //     $this->dispatchBrowserEvent('openPatientsEmailListModal');
    // }

    // function to send emails to a doctor or patients
    public function send()
    {
        dd("Send email...");
    }
}
