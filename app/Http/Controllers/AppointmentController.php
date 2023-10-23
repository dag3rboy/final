<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        return view('make_appointment');
    }

    public function saveAppointment(Request $request)
    {

        $request->validate([
            'ap_patient_firstname' => 'required',
            'ap_patient_lastname' => 'required',
            'ap_patient_birthday' => 'required',
            'ap_patient_gender' => 'required',
            'ap_patient_email' => 'required|email',
            'ap_patient_telephone' => 'required|min:9|max:10',
            'ap_appointment_date' => 'required'
        ]);

        // if form validated succesfully, then register the new appointment
        $appointment = new Appointment();
        $doctor = Doctor::where('dr_id', $request->dr_id)->first();
        $patient = Patient::where('pa_email', $request->ap_patient_email)
        ->orWhere('pa_telephone', $request->ap_patient_telephone)->first();

        $appointment->ap_doctor_id = $doctor->dr_id;
        $appointment->ap_patient_id = $patient->pa_id;
        $appointment->ap_doctor_firstname  = $doctor->dr_firstname;
        $appointment->ap_doctor_lastname = $doctor->dr_lastname;
        $appointment->ap_patient_firstname = $request->ap_patient_firstname;
        $appointment->ap_patient_lastname = $request->ap_patient_lastname;
        $appointment->ap_patient_birthday = $request->ap_patient_birthday;
        $appointment->ap_patient_gender = $request->ap_patient_gender;
        $appointment->ap_patient_email = $request->ap_patient_email;
        $appointment->ap_patient_telephone = $request->ap_patient_telephone;
        $appointment->ap_appointment_date = $request->ap_appointment_date;
        $appointment->ap_comment = $request->ap_comment ?? '';

        $query = $appointment->save();

        if ($query) {
            return redirect('appointment-sent');
        } else {
            return back()->with('fail', 'Something went wrong!');
        }
    }
}
