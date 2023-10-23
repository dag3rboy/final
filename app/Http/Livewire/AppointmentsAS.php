<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Appointment;
use App\Models\Assistant;
use App\Models\Doctor;
use App\Models\Patient;
use Livewire\WithPagination;

class AppointmentsAS extends Component
{

    use WithPagination;

    // appointments variables 
    public
        $pa_id,
        $dr_id,
        $ap_id,
        $pa_firstname,
        $pa_lastname,
        $pa_bitrhday,
        $pa_gender,
        $pa_email,
        $pa_telephone,
        $ap_date,
        $ap_comment,
        $ap_state;

    // addd appointments variables 
    public
        $add_pa_firstname,
        $add_pa_lastname,
        $add_pa_birthday,
        $add_pa_gender,
        $add_pa_email,
        $add_pa_telephone,
        $add_ap_date,
        $add_ap_comment,
        $add_ap_state;

    // search filter variables 
    public
        $filterByState = null,
        $search,
        $searchByDate = null;

    protected $listeners = ['delete'];

    public function render()
    {
        $assistant = Assistant::where('as_id', '=', session('LoggedAssistant'))->first();

        $this->as_id = $assistant->as_id;
        $this->dr_id = $assistant->dr_id;



        return view('livewire.appointments-a-s', [
            // 'appointments' => Appointment::orderBy('ap_id', 'desc')
            //     ->where('ap_doctor_id', $this->dr_id)
            //     ->paginate(6),   

            // ->orWhere('ap_appointment_date', $this->searchByDate);
            // $query->orWhere('ap_appointment_date', $this->searchByDate);
            // ->orWhere('ap_appointment_date', $this->searchByDate);

            'appointments' => Appointment::when($this->filterByState, function ($query) {
                $query->where('ap_appointment_state', $this->filterByState);
            })->when($this->searchByDate, function ($query) {
                $query->where('ap_appointment_date', $this->searchByDate);
            })
                ->where('ap_doctor_id', $this->dr_id)
                ->search(trim($this->search))
                ->orderBy('ap_id', 'desc')
                ->paginate(6),
            'dr_id'  => $this->dr_id
        ]);
    }

    // function to open edit appointment modal 
    public function openAddAppointmentModal()
    {
        $this->dispatchBrowserEvent('openAddAppointmentModal', ['dr_id' => $this->dr_id]);
    }

    // function to refresh appointment table 
    public function refreshTable()
    {
        $this->filterByState = null;
        $this->search;
        $this->searchByDate = null;

    }

    // function to create new appointment  
    public function save()
    {
        $this->validate([
            'add_pa_firstname' => 'required',
            'add_pa_lastname' => 'required',
            'add_pa_birthday' => 'required',
            'add_pa_email' => 'required|email',
            'add_pa_telephone' => 'required|min:7|max:15',
            'add_ap_date' => 'required',
        ], [
            'add_pa_firstname.required' => 'Insérez le nom de patient',
            'add_pa_lastname.required' => 'Insérez le prénom de patient ',
            'add_pa_birthday.required' => 'Insérez la date de naissance',
            'add_pa_email.required' => 'Insérez l\'email',
            'add_pa_telephone.required' => 'Insérez le numéro de téléphone',
            'add_ap_date.required' => 'Insérez la date de rendez-vous'
        ]);

        $doctor = Doctor::where('dr_id', '=', $this->dr_id)->first();
        $patient = Patient::where('pa_email', '=', $this->add_pa_email)->first();

        $save = Appointment::insert([
            'ap_doctor_id' => $doctor->dr_id,
            'ap_patient_id' => $patient->pa_id ?? 0,
            'ap_doctor_firstname' => $doctor->dr_firstname,
            'ap_doctor_lastname' => $doctor->dr_lastname,
            'ap_patient_firstname' => $this->add_pa_firstname,
            'ap_patient_lastname' => $this->add_pa_lastname,
            'ap_patient_birthday' => $this->add_pa_birthday,
            'ap_patient_gender' => $this->add_pa_gender ?? 'Male',
            'ap_patient_email' => $this->add_pa_email,
            'ap_patient_telephone' => $this->add_pa_telephone,
            'ap_appointment_date' => $this->add_ap_date,
            'ap_comment' => $this->add_ap_comment ?? '',
            'ap_appointment_state' => 'Confirmé'
        ]);

        if ($save) {
            $this->dispatchBrowserEvent('closeAddAppointmentModal');
        }
    }

    public function openValidateAppointmentModal($ap_id)
    {
        $appointment_infos = Appointment::where('ap_id', '=', $ap_id)->first();
        $this->pa_firstname = $appointment_infos->ap_patient_firstname;
        $this->pa_lastname = $appointment_infos->ap_patient_lastname;
        $this->pa_bitrhday = $appointment_infos->ap_patient_birthday;
        $this->pa_gender = $appointment_infos->ap_patient_gender;
        $this->pa_email = $appointment_infos->ap_patient_email;
        $this->pa_telephone = $appointment_infos->ap_patient_telephone;
        $this->ap_date = $appointment_infos->ap_appointment_date;
        $this->ap_comment = $appointment_infos->ap_comment;
        $this->ap_state = $appointment_infos->ap_appointment_state;
        $this->dispatchBrowserEvent('openValidateAppointmentModal', ['ap_id' => $ap_id]);
    }

    // function to validate appointment
    public function validateAppointment($ap_id)
    {
        $validate = Appointment::where('ap_id', '=', $ap_id)->update(['ap_appointment_state' => "Confirmé"]);

        if ($validate) {
            $this->dispatchBrowserEvent('validated');
        }
    }

    // function to refuse appointment
    public function refuseAppointment($ap_id)
    {

        $refuse = Appointment::where('ap_id', '=', $ap_id)->update(['ap_appointment_state' => "Refusé"]);

        if ($refuse) {
            $this->dispatchBrowserEvent('refused');
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

    // function to delete appointemnt
    public function delete($ap_id)
    {
        $delete = Appointment::where('ap_id', '=', $ap_id)->delete();
        if ($delete) {
            $this->dispatchBrowserEvent('deleted');
        }
    }

}
