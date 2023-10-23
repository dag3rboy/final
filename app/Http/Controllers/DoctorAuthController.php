<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\City;
use App\Models\Wilaya;
use Illuminate\Support\Facades\Hash as FacadesHash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DoctorAuthController extends Controller
{
    //=================================
    //      Dcotor methods 
    //=================================
    public function doctorLoginView()
    {
        return view('auth.login.doctor_login');
    }

    public function doctorRegisterView()
    {
        $data['wilayas'] = Wilaya::get(["id", "nom"]);
        // $data['wilayas'] = Wilaya::get(["id", "nom"]);
        // $wilayas = Wilaya::get(["id", "nom"]);
        return view('auth.register.doctor_register', $data);
    }

    // public function fetchWilaya(Request $request)
    // {
    //     $data['states'] = State::where("country_id", $request->country_id)->get(["name", "id"]);
    //     return response()->json($data);
    // }

    public function fetchCity(Request $request)
    {
        $data['cities'] = City::where("codeWilaya", $request->wilaya_id)->get(["nom"]);
        return response()->json($data);
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
                return redirect('doctor-dashboard');
            } else {
                return back()->with('fail', 'Invalid password!');
            }
        } else {
            return back()->with('fail', 'No account found for this email');
        }
    }

    // function to redirect doctor to his profila page
    function doctorIndex()
    {
        if (session()->has('LoggedDoctor')) {
            $doctor = Doctor::where('dr_id', '=', session('LoggedDoctor'))->first();
            $data = [
                'LoggedDoctorInfo' => $doctor
            ];
        }
        return View('dashboards.doctor.index', $data);
    }

    // function to logout doctor 
    function doctorLogout()
    {
        if (session()->has('LoggedDoctor')) {
            session()->pull('LoggedDoctor');
            return redirect('doctor-login');
        }
    }
}
