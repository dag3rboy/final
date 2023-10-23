<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Support\Facades\Hash as FacadesHash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PatientsController extends Controller
{

    public function patientLoginIndex()
    {
        return view('auth.login.patient_login');
    }

    public function patientRegisterIndex()
    {
        return view('auth.register.patient_register');
    }

    // function to redirect patient to his dashboard page
    function index()
    {
        if (session()->has('LoggedPatient')) {

            $patient = Patient::where('pa_id', '=', session('LoggedPatient'))->first();
            $doctors = Doctor::paginate(5);

            $today_date = date('y-m-d');

            $appointemnts_total = Appointment::where('ap_patient_id', '=', session('LoggedPatient'))
                ->where('ap_patient_id', '=', session('LoggedPatient'))
                ->count();
            $appointemnts_valid = Appointment::where('ap_appointment_state', '=', 'Confirmé')
                ->where('ap_patient_id', '=', session('LoggedPatient'))
                ->count();
            $appointemnts_waiting = Appointment::where('ap_appointment_state', '=', 'En attente')
                ->where('ap_patient_id', '=', session('LoggedPatient'))
                ->count();
            $appointemnts_refused = Appointment::where('ap_appointment_state', '>', 'Refusé')
                ->where('ap_patient_id', '=', session('LoggedPatient'))
                ->count();
            $appointemnts_future = Appointment::where('ap_appointment_date', '>', $today_date)
                ->where('ap_appointment_state', '=', 'Confirmé')
                ->where('ap_patient_id', '=', session('LoggedPatient'))->paginate(7);

            $data = [
                'LoggedPatientInfo' => $patient,
                'doctors' => $doctors,
                'appointemnts_total' => $appointemnts_total,
                'appointemnts_valid' => $appointemnts_valid,
                'appointemnts_waiting' => $appointemnts_waiting,
                'appointemnts_refused' => $appointemnts_refused,
                'appointemnts_future' => $appointemnts_future,
            ];
        }
        return View('dashboards.patient.index', $data);
    }

    function appointments()
    {
        if (session()->has('LoggedPatient')) {
            $patient = Patient::where('pa_id', '=', session('LoggedPatient'))->first();
            $data = [
                'LoggedPatientInfo' => $patient
            ];
        }
        return View('dashboards.patient.appointments', $data);
    }

    function password()
    {
        if (session()->has('LoggedPatient')) {
            $patient = Patient::where('pa_id', '=', session('LoggedPatient'))->first();
            $data = [
                'LoggedPatientInfo' => $patient
            ];
        }
        return View('dashboards.patient.password', $data);
    }

    function account()
    {
        if (session()->has('LoggedPatient')) {
            $patient = Patient::where('pa_id', '=', session('LoggedPatient'))->first();
            $data = [
                'LoggedPatientInfo' => $patient
            ];
        }
        return View('dashboards.patient.account', $data);
    }

    function profile()
    {
        if (session()->has('LoggedPatient')) {
            $patient = Patient::where('pa_id', '=', session('LoggedPatient'))->first();
            // self::$activeTab = 'account';
            $data = [
                'LoggedPatientInfo' => $patient
            ];
        }
        return View('dashboards.patient.profile', $data);
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
        return view('auth.register.registration_done', ['type' => 'Patient']);
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
                return redirect('patient/dashboard');
            } else {
                return back()->with('fail', 'Invalid password!');
            }
        } else {
            return back()->with('fail', 'No account found for this email');
        }
    }

    // function to update Patient infos
    function updatePatient(Request $request)
    {

        $request->validate([
            'pa_firstname' => 'required',
            'pa_lastname' => 'required',
            // 'pa_username' => 'required|unique:Patients',
            // 'pa_email' => 'required|email|unique:Patients',
            'pa_telephone' => 'required|min:9|max:10',
        ]);

        $update = DB::table('Patients')
            ->where('pa_id', $request->pa_id)
            ->update([
                'pa_firstname' => $request->pa_firstname,
                'pa_lastname' => $request->pa_lastname,
                'pa_username' => $request->pa_username,
                'pa_lastname' => $request->pa_lastname,
                'pa_email' => $request->pa_email,
                'pa_telephone' => $request->pa_telephone,
                'pa_birthday' => $request->pa_birthday,
                'pa_gender' => $request->pa_gender,
                'pa_wilaya' => $request->pa_wilaya,
                'pa_city' => $request->pa_city,
                'pa_adress' => $request->pa_adress ?? '',
            ]);

        if ($update) {
            return back()->with('success', 'Mise à jour du profil réussie');
        } else {
            return back()->with('fail', 'Erreur de mise à jour, veuillez réessayer!');
        }
    }

    // function to updatae Patient password
    function updatePassword(Request $request)
    {

        $request->validate([
            'pa_password' => 'required',
            'new_password' => 'required|min:5',
            'confirm_password' => 'required|min:5',
        ]);

        $patient = Patient::where('pa_id', '=', session('LoggedPatient'))->first();

        if (FacadesHash::check($request->pa_password, $patient->pa_password)) {

            if ($request->new_password == $request->confirm_password) {
                $update = DB::table('Patients')
                    ->where('pa_id', $patient->pa_id)
                    ->update([
                        'pa_password' => FacadesHash::make($request->new_password),
                    ]);

                if ($update) {
                    return back()->with('success', 'Mot de passe mis à jour avec succès');
                } else {
                    return back()->with('fail', 'Erreur de mise à jour, veuillez réessayer!');
                }
            } else {
                return back()->with('info', 'Pas le même mot de passe!');
            }
        } else {
            return back()->with('info', 'Le mot de passe actuel que vous avez entré est erroné!');
        }
    }


    // function to desactivate Patient Account
    function desactivatePatientAccount(Request $request)
    {

        $request->validate([
            'pa_password' => 'required',
            'confirm_password' => 'required'
        ]);

        $Patient = Patient::where('pa_id', '=', session('LoggedPatient'))->first();

        if (FacadesHash::check($request->pa_password, $Patient->pa_password)) {

            if ($request->pa_password == $request->confirm_password) {
                $delete = DB::table('Patients')
                    ->where('pa_id', $Patient->pa_id)
                    ->update([
                        'pa_deleted' => true,
                    ]);

                if ($delete) {
                    return redirect('patient-login');
                    session()->pull('LoggedPatient');
                } else {
                    return back()->with('fail', 'Erreur de suppression, veuillez réessayer!');
                }
            } else {
                return back()->with('info', 'Pas le même mot de passe!');
            }
        } else {
            return back()->with('info', 'Le mot de passe actuel que vous avez entré est erroné!');
        }
    }

    // function to update admin profile picture 
    public function updatePicture(Request $request)
    {
        $path = 'users-images/patients/';
        $file = $request->file('admin-image');
        $new_name = 'PAT-IMG-' . date('ymd') . uniqid() . '.jpg';

        // upload the new image 
        $upload = $file->move(public_path($path), $new_name);

        if (!$upload) {
            return response()->json(['status' => 0, 'msg' => 'Erreur, le téléchargement de la nouvelle image a échoué']);
        } else {
            // get old picture
            $patient = Patient::where('pa_id', '=', session('LoggedPatient'))->first();
            $old_picture =  $patient->pa_photo;
        }

        // delete the old picture 
        if ($old_picture != '') {
            if (Storage::exists(public_path($path), $old_picture)) {
                Storage::delete(public_path($path), $old_picture);
            }
        }

        // update picture in database
        $update = DB::table('Patients')
            ->where('pa_id', $patient->pa_id)
            ->update([
                'pa_photo' =>  $new_name
            ]);
        if (!$upload) {
            return response()->json(['status' => 0, 'msg' => 'Erreur, la mise à jour de l\'image dans la base de données a échoué']);
        } else {
            return response()->json(['status' => 1, 'msg' => 'Votre photo de profil a été mise à jour avec succès']);
        }
    }


    // function to logout patient 
    function patientLogout()
    {
        if (session()->has('LoggedPatient')) {
            session()->pull('LoggedPatient');
            return redirect('patient-login');
        }
    }
}
