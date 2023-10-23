<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use Illuminate\Support\Facades\Hash as FacadesHash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PatientAuthController extends Controller
{
    public function patientLoginIndex()
    {
        return view('auth.login.patient_login');
    }

    public function patientRegisterIndex()
    {
        return view('auth.register.patient_register');
    }

    // function to register patient in the database
    public function registerPatient(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'pa_username' => 'required|unique:patients',
            'password' => 'required|min:5|max:12',
            'cpassword' => 'required|min:5|max:12',
            'pa_email' => 'required|email|unique:patients',
            'pa_telephone' => 'required|unique:patients'
        ]);

        // if form validated succesfully, then register the new patient
        if ($request->password == $request->cpassword) {
            $patient = new Patient();
            $patient->pa_firstname = $request->firstname;
            $patient->pa_lastname = $request->lastname;
            $patient->pa_username = $request->pa_username;
            $patient->pa_password = FacadesHash::make($request->password);
            $patient->pa_email = $request->pa_email;
            $patient->pa_telephone = $request->pa_telephone;
            $patient->pa_gender = $request->gender;
            $patient->pa_birthday = date("Y-m-d");
            $patient->pa_adress = "";
            $patient->pa_city = "";
            $patient->pa_wilaya = "";
            $patient->pa_photo = "default.png";
            $patient->pa_token = Str::random(32);
            $patient->pa_deleted = false;
            $query = $patient->save();
            if ($query) {
                return redirect('registration-done');
            } else {
                return back()->with('fail', 'Something went wrong!');
            }
        } else {
            return back()->with('info', 'Not the same password');
        }
    }

    // function to redirect patient to success page
    public function patientRegistrationDone()
    {
        return view('auth.register.registration_done');
    }

    // function to check patient login
    public function checkPatientLogin(Request $request)
    {
        $request->validate([
            'pa_email' => 'required|email',
            'password' => 'required'
        ]);

        // if form validated succesfully, then login patient
        $patient = Patient::where('pa_email', '=', $request->pa_email)->first();

        if ($patient) {
            if (FacadesHash::check($request->password, $patient->pa_password)) {
                // if password match then redirect patient to his profile
                $request->session()->put('LoggedPatient', $patient->pa_id);
                return redirect('patient-dashboard');
            } else {
                return back()->with('fail', 'Invalid password!');
            }
        } else {
            return back()->with('fail', 'No account found for this email');
        }
    }

    // function to redirect patient to his dashboard page
    function patientDashboard()
    {
        if (session()->has('LoggedPatient')) {
            $patient = Patient::where('pa_id', '=', session('LoggedPatient'))->first();
            $data = [
                'LoggedPatientInfo' => $patient
            ];
        }
        return View('dashboards.patient.dashboard', $data);
    }
}
