<?php

namespace App\Http\Livewire;

use App\Models\Schedule;
use App\Models\Assistant;
use Livewire\Component;

class SchedulesAS extends Component
{

    // schedules variables 
    public
        $as_id,
        $dr_id,
        $sc_id,
        $sc_year,
        $sc_month,
        $sc_date,
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
        $assistant = Assistant::where('as_id', '=', session('LoggedAssistant'))->first();

        $this->as_id = $assistant->as_id;
        $this->dr_id = $assistant->dr_id;
        // $this->sc_year = date('m');
        // $this->sc_month =  date('y');


        // return view('livewire.schedules-a-s', [
        //     'schedules' => Schedule::orderBy('sc_id', 'desc')->paginate(5),
        //     'dr_id'  => $this->dr_id
        // ]);

        return view('livewire.schedules-a-s', [
            'schedules' => Schedule::when($this->sc_month, function ($query) {
                $query->where('sc_month', $this->sc_month);
            })->when($this->sc_year, function ($query) {
                $query->where('sc_year', $this->sc_year);
            })
                ->where('sc_id_doctor', $this->dr_id)
                ->orderBy('sc_date', 'desc')
                ->get(),
            'dr_id'  => $this->dr_id
        ]);
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
        // $schedule_infos = Schedule::where('sc_id', '=', $sc_id)->first();
        // $this->dispatchBrowserEvent('SwalConfirmSchedule', [
        //     'id' => $sc_id
        // ]);

        $delete = Schedule::where('sc_id', '=', $sc_id)->delete();
        if ($delete) {
            $this->dispatchBrowserEvent('scheduleDeleted');
        }
    }

    // function to delete schedule
    // public function remove($sc_id)
    // {
    //     dd('Delete');
    //     $delete = Schedule::where('sc_id', '=', $sc_id)->delete();
    //     if ($delete) {
    //         $this->dispatchBrowserEvent('scheduleDeleted');
    //     }
    // }
}
