<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Doctor;
use App\Models\Assistant;
use App\Models\Patient;
use Illuminate\Support\Facades\Hash as FacadesHash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    //=================================
    //         Admin methods 
    //=================================
    public function adminLoginView()
    {
        return view('auth.login.admin_login');
    }

    // function to check admin login
    public function checkAdmin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        // if form validated succesfully, then login admin
        $admin = Admin::where('ad_username', '=', $request->username)->first();

        if ($admin) {
            if (FacadesHash::check($request->password, $admin->ad_password)) {
                // if password match then redirect admin to his profile
                $request->session()->put('LoggedAdmin', $admin->ad_id);
                return redirect('admin-profile');
            } else {
                return back()->with('fail', 'Invalid password!');
            }
        } else {
            return back()->with('fail', 'No account found for this email');
        }
    }

    // function to redirect admin to his profila page
    function adminProfile()
    {
        if (session()->has('LoggedAdmin')) {
            $admin = Admin::where('ad_id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo' => $admin
            ];
        }
        return View('dashboards.admin.profile', $data);
    }

    // function to logout admin 
    function adminLogout()
    {
        if (session()->has('LoggedAdmin')) {
            session()->pull('LoggedAdmin');
            return redirect('admin-login');
        }
    }

    //=================================
    //      Patient methods 
    //=================================
    public function patientLoginView()
    {
        return view('auth.login.patient_login');
    }

    public function patientRegisterView()
    {
        return view('auth.register.patient_register');
    }

    // function to register patient in the database
    public function createPatient(Request $request)
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
            $patient->pa_photo = "";
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
        return view('auth.register.registration_done', ['type' => 'Patient']);
    }

    // function to check patient login
    public function checkPatient(Request $request)
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
                return redirect('patient-profile');
            } else {
                return back()->with('fail', 'Invalid password!');
            }
        } else {
            return back()->with('fail', 'No account found for this email');
        }
    }

    // function to redirect patient to his profila page
    function patientProfile()
    {
        if (session()->has('LoggedPatient')) {
            $patient = Patient::where('pa_id', '=', session('LoggedPatient'))->first();
            $data = [
                'LoggedPatientInfo' => $patient
            ];
        }
        return View('dashboards.patient.profile', $data);
    }

    // function to logout patient 
    function patientLogout()
    {
        if (session()->has('LoggedPatient')) {
            session()->pull('LoggedPatient');
            return redirect('patient-login');
        }
    }
    //=================================
    //      Dcotor methods 
    //=================================
    public function doctorLoginView()
    {
        return view('auth.login.doctor_login');
    }

    public function doctorRegisterView()
    {
        return view('auth.register.doctor_register');
    }

    // function to get last inserted id for a doctor to use it to create unique doctor cv name 
    public function getLastDoctorID()
    {
        $doctor_id = DB::table('doctors')->orderBy('dr_id', 'desc')->first();
        return $doctor_id + 1;
    }

    // function to register doctor in the database
    public function createDoctor(Request $request)
    {
        $request->validate([
            'dr_firstname' => 'required',
            'dr_lastname' => 'required',
            'dr_username' => 'required|unique:doctors',
            'dr_email' => 'required|email|unique:doctors',
            'dr_password' => 'required|min:5|max:12',
            'dr_cpassword' => 'required|min:5|max:12',
            'dr_telephone' => 'required|min:9|max:10',
            'dr_telephone' => 'required',
            'dr_address' => 'required',
        ]);

        // if form validated succesfully, then register the new doctor
        if ($request->password == $request->cpassword) {
            $doctor = new Doctor();
            $doc_id = self::getLastDoctorID();
            $doctor->dr_firstname = $request->dr_firstname;
            $doctor->dr_lastname = $request->dr_lastname;
            $doctor->dr_username = $request->dr_username;
            $doctor->dr_password = FacadesHash::make($request->dr_password);
            $doctor->dr_email = $request->dr_email;
            $doctor->dr_speciality = $request->dr_speciality;
            $doctor->dr_id_cv = "dr_" . $request->dr_firstname . "_" . $request->dr_lastname . "_" . $doc_id . "_cv";
            $doctor->dr_department = "";
            $doctor->dr_service = "";
            $doctor->dr_telephone = $request->dr_telephone;
            $doctor->dr_gender = $request->dr_gender;
            $doctor->dr_birthday = date("Y-m-d");
            $doctor->dr_wilaya = $request->dr_wilaya;
            $doctor->dr_city = $request->dr_city;
            $doctor->dr_adress = $request->dr_address;
            $doctor->dr_photo = "";
            $doctor->dr_appointment_active = false;
            $doctor->dr_confirmed = false;
            $doctor->dr_active = false;
            $doctor->dr_token = Str::random(32);
            $doctor->dr_deleted = false;
            $query = $doctor->save();
            if ($query) {
                return redirect('request-sent');;
            } else {
                return back()->with('fail', 'Something went wrong!');
            }
        } else {
            return back()->with('info', 'Not the same password');
        }
    }

    // function to redirect doctor to success page
    public function doctorRegistrationDone()
    {
        return view('auth.register.registration_done', ['type' => 'Doctor']);
    }

    // function to redirect doctor to success registration request
    public function registrationRequestSent()
    {
        return view('auth.register.registration_request_send');
    }

    // function to check doctor login
    public function checkDoctor(Request $request)
    {
        $request->validate([
            'dr_email' => 'required|email',
            'dr_password' => 'required'
        ]);

        // if form validated succesfully, then login doctor
        $doctor = Doctor::where('dr_email', '=', $request->dr_email)
            ->where('dr_confirmed', '=', 1)
            ->where('dr_active', '=', 1)
            ->first();

        if ($doctor) {
            if (FacadesHash::check($request->dr_password, $doctor->dr_password)) {
                // if password match then redirect doctor to his profile
                $request->session()->put('LoggedDoctor', $doctor->dr_id);
                return redirect('doctor-profile');
            } else {
                return back()->with('fail', 'Invalid password!');
            }
        } else {
            return back()->with('fail', 'No account found for this email');
        }
    }

    // function to redirect doctor to his profila page
    function doctorProfile()
    {
        if (session()->has('LoggedDoctor')) {
            $doctor = Doctor::where('dr_id', '=', session('LoggedDoctor'))->first();
            $data = [
                'LoggedDoctorInfo' => $doctor
            ];
        }
        return View('dashboards.doctor.profile', $data);
    }

    // function to logout doctor 
    function doctorLogout()
    {
        if (session()->has('LoggedDoctor')) {
            session()->pull('LoggedDoctor');
            return redirect('doctor-login');
        }
    }

    //=================================
    //      Assistant methods 
    //=================================
    public function assistantLoginView()
    {
        return view('auth.login.assistant_login');
    }

    // function to check patient login
    public function checkAssistant(Request $request)
    {
        $request->validate([
            'as_email' => 'required|email',
            'password' => 'required'
        ]);

        // if form validated succesfully, then login assistant
        $assistant = Assistant::where('as_email', '=', $request->as_email)->first();

        if ($assistant) {
            if (FacadesHash::check($request->password, $assistant->as_password)) {
                // if password match then redirect assistant to his profile
                $request->session()->put('LoggedAssistant', $assistant->as_id);
                return redirect('assistant-profile');
            } else {
                return back()->with('fail', 'Invalid password!');
            }
        } else {
            return back()->with('fail', 'No account found for this email');
        }
    }

    // function to redirect assisatnt to his profila page
    function assistantProfile()
    {
        if (session()->has('LoggedAssistant')) {
            $assistant = Assistant::where('as_id', '=', session('LoggedAssistant'))->first();
            $data = [
                'LoggedAssistantInfo' => $assistant
            ];
        }
        return View('dashboards.assistant.profile', $data);
    }

    // function to logout assistant 
    function assistantLogout()
    {
        if (session()->has('LoggedAssistant')) {
            session()->pull('LoggedAssistant');
            return redirect('assistant-login');
        }
    }
    //=================================
    //      Reset Password methods 
    //=================================
    public function forgotPasswordView()
    {
        return view('auth.reset-password.forgot_password');
    }

    public function newPasswordView()
    {
        return view('auth.reset-password.new_password');
    }

    public function passwordChangedView()
    {
        return view('auth.reset-password.password_changed');
    }

    public function recoveryEmailSentView()
    {
        return view('auth.reset-password.recovery_email_sent');
    }
}
