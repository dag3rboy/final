<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SMSSender extends Component
{
    public function render()
    {
        return view('livewire.s-m-s-sender');
    }

   // function to open doctors sms list modal 
   public function openDoctorsSMSListModal()
   {
       $this->dispatchBrowserEvent('openDoctorsSMSListModal');
   }

   // function to open patients sms list modal 
   public function openPatientsSMSListModal()
   {
       $this->dispatchBrowserEvent('openPatientsSMSListModal');
   }

   // function to send sms to a doctor or patients
   public function send()
   {
       dd("Send sms...");
   }
}
