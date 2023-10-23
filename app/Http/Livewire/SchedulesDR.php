<?php

namespace App\Http\Livewire;

use App\Models\Schedule;
use App\Models\Doctor;
use Livewire\Component;

class SchedulesDR extends Component
{
    // schedules variables 
    public
        $dr_id,
        $sc_id,
        $sc_date,
        $sc_year,
        $sc_month,
        $sc_start_hour,
        $sc_end_hour,
        $sc_max_patients,
        $sc_reserved_places;

    public
        $sc_up_date,
        $sc_up_start_hour,
        $sc_up_end_hour,
        $sc_up_max_patients;

    public function render()
    {

        $doctor = Doctor::where('dr_id', '=', session('LoggedDoctor'))->first();

        $this->dr_id = $doctor->dr_id;

        $month_numeric = date("m");
        $month_string = date("M");


        return view('livewire.schedules-d-r', [
            'schedules' => Schedule::when($this->sc_month, function ($query) {
                $query->where('sc_month', $this->sc_month);
            })->when($this->sc_year, function ($query) {
                $query->where('sc_year', $this->sc_year);
            })
                ->where('sc_id_doctor', $this->dr_id)
                // ->where('sc_month', $month)
                // ->where('sc_year', $year)
                ->orderBy('sc_date', 'asc')
                ->get(),
            'dr_id'  => $this->dr_id,
            'month_numeric'  => $month_numeric,
            'month_string'  => $month_string
        ]);

        $this->sc_month = $month_numeric;
    }

    // function to create new appointment  
    public function save()
    {
        $this->validate([
            'sc_date' => 'required',
            'sc_start_hour' => 'required',
            'sc_end_hour' => 'required',
            'sc_max_patients' => 'required'
        ], [
            'sc_date.required' => 'Date de journé requise',
            'sc_start_hour.required' => 'Heure de début requise',
            'sc_end_hour.required' => 'Heure de fermeture requise',
            'sc_max_patients.required' => 'nombre maximal de pateints requise'
        ]);


        $month = date("m", strtotime($this->sc_date));
        $year = date("Y", strtotime($this->sc_date));

        $save = Schedule::insert([
            'sc_id_doctor' => $this->dr_id,
            'sc_year' => $year ?? date("y"),
            'sc_month' => $month ?? date("m"),
            'sc_date' => $this->sc_date,
            'sc_start_hour' => $this->sc_start_hour,
            'sc_end_hour' => $this->sc_end_hour,
            'sc_max_patients' => $this->sc_max_patients
        ]);

        if ($save) {
            $this->dispatchBrowserEvent('scheduleAdded');
        }
    }

    // function to create new appointment  
    public function openUpdatedScheduleModal($sc_id)
    {
        $schedule_infos = Schedule::where('sc_id', '=', $sc_id)->first();

        $this->sc_up_date = $schedule_infos->sc_date;
        $this->sc_up_start_hour = $schedule_infos->sc_start_hour;
        $this->sc_up_end_hour = $schedule_infos->sc_end_hour;
        $this->sc_up_max_patients = $schedule_infos->sc_max_patients;

        $this->dispatchBrowserEvent('openUpdatedScheduleModal', ['sc_id' => $sc_id]);
    }

    // function to updated appointment
    public function update()
    {
        $sc_id =  $this->as_id;
        $update = Schedule::where('sc_id', '=', $sc_id)->update([
            'sc_date' => $this->sc_up_date,
            'sc_start_hour' => $this->sc_up_start_hour,
            'sc_end_hour' => $this->sc_up_end_hour,
            'sc_max_patients' => $this->sc_up_max_patients
        ]);

        if ($update) {
            $this->dispatchBrowserEvent('closeUpdatedScheduleModal');
        }
    }

    // function to show confirmationdeleting dialog
    public function deleteScheduleConfirm($sc_id)
    {

        $delete = Schedule::where('sc_id', '=', $sc_id)->delete();
        if ($delete) {
            $this->dispatchBrowserEvent('scheduleDeleted');
        }
    }
}
