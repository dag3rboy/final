<?php

namespace App\Http\Livewire;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Livewire\WithPagination;

use Livewire\Component;

class AppointmentsPA extends Component
{

    use WithPagination;
    public
        $pa_id,
        $ap_id,
        $pa_firstname,
        $pa_lastname,
        $dr_doctor,
        $pa_bitrhday,
        $pa_gender,
        $pa_email,
        $pa_telephone,
        $ap_date,
        $ap_comment,
        $ap_state;
    public
        $up_ap_id,
        $up_pa_firstname,
        $up_pa_lastname,
        $up_dr_doctor,
        $up_pa_bitrhday,
        $up_pa_gender,
        $up_pa_email,
        $up_pa_telephone,
        $up_ap_date,
        $up_ap_comment,
        $up_ap_state;
    public $term;
    protected $listeners = ['delete'];

    public function render(Request  $request)
    {
        $this->pa_id = $request->session()->get('LoggedPatient');
        return view('livewire.appointments-p-a', [
            'appointments' => Appointment::orderBy('ap_id', 'asc')
                ->where('ap_patient_id', $this->pa_id)
                ->paginate(6),
            // 'appointments' => Appointment::when($this->term, function($query, $term) {
            //     return $query->where('ap_patient_firstname','LIKE', "%$term%");
            // })->paginate(5), 
            'pa_id'  => $this->pa_id
        ]);
    }

    // function to open appointment infos modal 
    public function openViewAppointmentModal($ap_id)
    {
        $appointment_infos = Appointment::where('ap_id', '=', $ap_id)->first();
        $this->pa_firstname = $appointment_infos->ap_patient_firstname;
        $this->pa_lastname = $appointment_infos->ap_patient_lastname;
        $this->dr_doctor = 'Dr. ' . $appointment_infos->ap_doctor_firstname . ' ' . $appointment_infos->ap_doctor_lastname;
        $this->pa_bitrhday = $appointment_infos->ap_patient_birthday;
        $this->pa_gender = $appointment_infos->ap_patient_gender;
        $this->pa_email = $appointment_infos->ap_patient_email;
        $this->pa_telephone = $appointment_infos->ap_patient_telephone;
        $this->ap_date = $appointment_infos->ap_appointment_date;
        $this->ap_comment = $appointment_infos->ap_comment;
        $this->ap_state = $appointment_infos->ap_appointment_state;
        $this->dispatchBrowserEvent('openViewAppointmentModal', ['ap_id' => $ap_id]);
    }

    // function to open edit appointment modal 
    public function openEditAppointmentModal($ap_id)
    {
        $appointment_infos = Appointment::where('ap_id', '=', $ap_id)->first();
        $this->up_pa_firstname = $appointment_infos->ap_patient_firstname;
        $this->up_pa_lastname = $appointment_infos->ap_patient_lastname;
        $this->up_dr_doctor = 'Dr. ' . $appointment_infos->ap_doctor_firstname . ' ' . $appointment_infos->ap_doctor_lastname;
        $this->up_pa_bitrhday = $appointment_infos->ap_patient_birthday;
        $this->up_pa_gender = $appointment_infos->ap_patient_gender;
        $this->up_pa_email = $appointment_infos->ap_patient_email;
        $this->up_pa_telephone = $appointment_infos->ap_patient_telephone;
        $this->up_ap_date = $appointment_infos->ap_appointment_date;
        $this->up_ap_comment = $appointment_infos->ap_comment;
        $this->up_ap_state = $appointment_infos->ap_appointment_state;
        $this->dispatchBrowserEvent('openEditAppointmentModal', ['ap_id' => $ap_id]);
    }

    // function to update appointment
    public function update()
    {
        $ap_id =  $this->pa_id;
        $this->validate([
            'up_pa_firstname' => 'required',
            'up_pa_lastname' => 'required',
            'up_pa_email' => 'required|email',
            'up_pa_telephone' => 'required|min:7|max:15'
        ], [
            'up_pa_firstname.required' => 'Insérez le nom  s\'il vous plaît',
            'up_pa_lastname.required' => 'Insérez le prénom  s\'il vous plaît',
            'up_pa_email.unique' => 'Insérez l\'email s\'il vous plaît',
            'up_pa_telephone.required' => 'Insérez le numéro de téléphone s\'il vous plaît'
        ]);
        $update = Appointment::where('ap_id', '=', $ap_id)->update([
            'ap_patient_firstname' => $this->up_pa_firstname,
            'ap_patient_lastname' => $this->up_pa_lastname,
            'ap_patient_birthday' => $this->up_pa_bitrhday,
            'ap_patient_gender' => $this->up_pa_gender,
            'ap_patient_email' => $this->up_pa_email,
            'ap_patient_telephone' => $this->up_pa_telephone,
            'ap_appointment_date' => $this->up_ap_date,
            'ap_comment' => $this->up_ap_comment
        ]);

        if ($update) {
            $this->dispatchBrowserEvent('closeEditAppointmentModal');
        }
    }

    // function to show confirmationdeleting dialog
    public function deleteConfirm($ap_id)
    {
        $assistant_infos = Appointment::where('ap_id', '=', $ap_id)->first();
        $this->dispatchBrowserEvent('SwalConfirm', [
            'id' => $ap_id
        ]);
    }

    // function to delete assistant
    public function delete($ap_id)
    {
        $delete = Appointment::where('ap_id', '=', $ap_id)->delete();
        if($delete) {
            $this->dispatchBrowserEvent('deleted');
        }
    }
}
