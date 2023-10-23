<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Appointment;
use App\Models\DoctorCV;
use App\Models\Diplomes;
use App\Models\Equipment;
use App\Models\Experience;
use App\Models\Tarif;
use App\Models\WorkingDay;
use Illuminate\Support\Facades\Hash as FacadesHash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DoctorsController extends Controller
{

    public static $activeTab = '';

    //=================================
    //      Dcotor views methods 
    //=================================
    public function doctorLoginView()
    {
        return view('auth.login.doctor_login');
    }

    public function doctorRegisterView()
    {
        return view('auth.register.doctor_register');
    }

    function assistants()
    {
        if (session()->has('LoggedDoctor')) {
            $doctor = Doctor::where('dr_id', '=', session('LoggedDoctor'))->first();
            $data = [
                'LoggedDoctorInfo' => $doctor
            ];
        }
        return View('dashboards.doctor.assistants', $data);
    }

    function calender()
    {
        if (session()->has('LoggedDoctor')) {
            $doctor = Doctor::where('dr_id', '=', session('LoggedDoctor'))->first();
            $data = [
                'LoggedDoctorInfo' => $doctor
            ];
        }
        return View('dashboards.doctor.calender', $data);
    }

    function cv()
    {
        if (session()->has('LoggedDoctor')) {
            $doctor = Doctor::where('dr_id', '=', session('LoggedDoctor'))->first();
            $contact_infos = DoctorCV::where('dr_id', '=', session('LoggedDoctor'))->first();
            $diplomes = Diplomes::where('dr_id', '=', session('LoggedDoctor'))->get();
            $experiences = Experience::where('dr_id', '=', session('LoggedDoctor'))->get();
            $equipements = Equipment::where('dr_id', '=', session('LoggedDoctor'))->get();
            $working_days = WorkingDay::where('dr_id', '=', session('LoggedDoctor'))->get();
            $tarifs = Tarif::where('dr_id', '=', session('LoggedDoctor'))->get();
            $data = [
                'LoggedDoctorInfo' => $doctor,
                'contact_infos' => $contact_infos,
                'diplomes' => $diplomes,
                'experiences' => $experiences,
                'equipments' => $equipements,
                'working_days' => $working_days,
                'tarifs' => $tarifs
            ];
        }
        return View('dashboards.doctor.cv', $data);
    }

    function settings()
    {
        if (session()->has('LoggedDoctor')) {
            $doctor = Doctor::where('dr_id', '=', session('LoggedDoctor'))->first();
            $data = [
                'LoggedDoctorInfo' => $doctor
            ];
        }
        return View('dashboards.doctor.settings', $data);
    }

    function profile()
    {
        if (session()->has('LoggedDoctor')) {
            $doctor = Doctor::where('dr_id', '=', session('LoggedDoctor'))->first();
            self::$activeTab = 'account';
            $data = [
                'LoggedDoctorInfo' => $doctor,
                'activeTab' => self::$activeTab
            ];
        }
        return View('dashboards.doctor.profile', $data);
    }

    function addAssistantIndex()
    {
        if (session()->has('LoggedDoctor')) {
            $doctor = Doctor::where('dr_id', '=', session('LoggedDoctor'))->first();
            $data = [
                'LoggedDoctorInfo' => $doctor
            ];
        }
        return View('dashboards.doctor.add_assistant', $data);
    }

    //=======================================
    //      Dcotor Login/Register methods 
    //=======================================
    // function to get last inserted id for a doctor to use it to create unique doctor cv name 
    // public function getLastDoctorID()
    // {
    //     $doctor_id = DB::table('doctors')->orderBy('dr_id', 'desc')->first();
    //     return $doctor_id + 1;
    // }

    // function to register doctor in the database
    public function registerDoctor(Request $request)
    {
        $request->validate([
            'dr_firstname' => 'required',
            'dr_lastname' => 'required',
            'dr_username' => 'required|unique:doctors',
            'dr_email' => 'required|email|unique:doctors',
            'dr_password' => 'required|min:6',
            'dr_cpassword' => 'required|min:6',
            'dr_telephone' => 'required|min:9|max:14',
            'dr_address' => 'required',
            'dr_city' => 'required',
            'dr_wilaya' => 'required'
        ]);

        // if form validated succesfully, then register the new doctor
        if ($request->password == $request->cpassword) {
            $doctor = new Doctor();
            $doctor->dr_firstname = $request->dr_firstname;
            $doctor->dr_lastname = $request->dr_lastname;
            $doctor->dr_username = $request->dr_username;
            $doctor->dr_password = FacadesHash::make($request->dr_password);
            $doctor->dr_email = $request->dr_email;
            $doctor->dr_speciality = $request->dr_speciality;
            $doctor->dr_department = "";
            $doctor->dr_service = "";
            $doctor->dr_telephone = $request->dr_telephone;
            $doctor->dr_gender = $request->dr_gender;
            $doctor->dr_birthday = date("Y-m-d");
            $doctor->dr_wilaya = $request->dr_wilaya;
            $doctor->dr_city = $request->dr_city;
            $doctor->dr_adress = $request->dr_address;
            $doctor->dr_photo = "default.png";
            $doctor->dr_appointment_active = true;
            $doctor->dr_confirmed = 0;
            $doctor->dr_active = 0;
            $doctor->dr_token = Str::random(32);
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
        return view('auth.register.registration_done');
    }

    // function to redirect doctor to error page 
    public function doctorRegistrationFailed()
    {
        return view('auth.register.registration_failed');
    }

    // function to redirect doctor to success registration request
    public function registrationRequestSent()
    {
        return view('auth.register.registration_request_send');
    }

    // function to activate doctor account
    public function activateAcoount(Request $request)
    {
        $doctorToken = request('token');

        $update = DB::table('doctors')
            ->where('dr_token', $doctorToken)
            ->update([
                'dr_active' => 1
            ]);

        if ($update) {
            return redirect('registration-done');
        } else {
            return redirect('registration-failed');
        }
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
                return redirect('doctor/dashboard');
            } else {
                return back()->with('fail', 'Invalid password!');
            }
        } else {
            return back()->with('fail', 'No account found for this email');
        }
    }

    // function to redirect doctor to his dashboard
    function index()
    {
        if (session()->has('LoggedDoctor')) {

            $today_date = date('y-m-d');
            $doctor = Doctor::where('dr_id', '=', session('LoggedDoctor'))->first();

            $patients_total = Appointment::groupBy('ap_patient_id')->select('ap_patient_id', DB::raw('count(*) as total'))
                ->where('ap_doctor_id', '=', session('LoggedDoctor'))
                ->count();
            $appointemnts_total = Appointment::where('ap_doctor_id', '=', session('LoggedDoctor'))
                ->where('ap_doctor_id', '=', session('LoggedDoctor'))
                ->count();
            $appointemnts_today = Appointment::where('ap_appointment_date', '=', $today_date)
                ->where('ap_doctor_id', '=', session('LoggedDoctor'))
                ->count();
            $appointemnts_future = Appointment::where('ap_appointment_date', '>', $today_date)
                ->where('ap_doctor_id', '=', session('LoggedDoctor'))
                ->count();


            $data = [
                'LoggedDoctorInfo' => $doctor,
                'patients_total' => $patients_total,
                'appointemnts_total' => $appointemnts_total,
                'appointemnts_future' => $appointemnts_future,
                'appointemnts_today' => $appointemnts_today,
            ];
        }
        return View('dashboards.doctor.index', $data);
    }

    // function to update doctor infos
    function updateDoctor(Request $request)
    {
        self::$activeTab = 'account';

        $request->validate([
            'dr_firstname' => 'required',
            'dr_lastname' => 'required',
            // 'dr_username' => 'required|unique:doctors',
            // 'dr_email' => 'required|email|unique:doctors',
            'dr_telephone' => 'required|min:9|max:10',
            'dr_adress' => 'required'
        ]);

        $update = DB::table('doctors')
            ->where('dr_id', $request->dr_id)
            ->update([
                'dr_firstname' => $request->dr_firstname,
                'dr_lastname' => $request->dr_lastname,
                'dr_username' => $request->dr_username,
                'dr_lastname' => $request->dr_lastname,
                'dr_email' => $request->dr_email,
                'dr_telephone' => $request->dr_telephone,
                'dr_birthday' => $request->dr_birthday,
                'dr_gender' => $request->dr_gender,
                'dr_wilaya' => $request->dr_wilaya,
                'dr_city' => $request->dr_city,
                'dr_adress' => $request->dr_adress,
                'dr_speciality' => $request->dr_speciality,
                'dr_department' => $request->dr_department ?? '',
                'dr_service' => $request->dr_service ?? ''
            ]);

        if ($update) {
            return back()->with('success', 'Mise à jour du profil réussie');
            // $this->dispatchBrowserEvent('profileInfosUpdated');
        } else {
            return back()->with('fail', 'Erreur de mise à jour, veuillez réessayer!');
        }
    }

    // function to updatae doctor password
    function updatePassword(Request $request)
    {
        self::$activeTab = 'password';

        $request->validate([
            'dr_password' => 'required',
            'new_password' => 'required|min:5',
            'confirm_password' => 'required|min:5',
        ]);

        $doctor = Doctor::where('dr_id', '=', session('LoggedDoctor'))->first();

        if (FacadesHash::check($request->dr_password, $doctor->dr_password)) {

            if ($request->new_password == $request->confirm_password) {
                $update = DB::table('doctors')
                    ->where('dr_id', $doctor->dr_id)
                    ->update([
                        'dr_password' => FacadesHash::make($request->new_password),
                    ]);

                if ($update) {
                    return back()->with('success', 'Mot de passe mis à jour avec succès');
                    // $this->dispatchBrowserEvent('profileInfosUpdated');
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

    // function to update doctor profile picture 
    public function updatePicture(Request $request)
    {
        $path = 'users-images/doctors/';
        $file = $request->file('admin-image');
        $new_name = 'DOC-IMG-' . date('ymd') . uniqid() . '.jpg';

        // upload the new image 
        $upload = $file->move(public_path($path), $new_name);

        if (!$upload) {
            return response()->json(['status' => 0, 'msg' => 'Erreur, le téléchargement de la nouvelle image a échoué']);
        } else {
            // get old picture
            $doctor = Doctor::where('dr_id', '=', session('LoggedDoctor'))->first();
            $old_picture =  $doctor->dr_photo;
        }

        // delete the old picture 
        if ($old_picture != '') {
            if (Storage::exists(public_path($path), $old_picture)) {
                Storage::delete(public_path($path), $old_picture);
            }
        }

        // update picture in database
        $update = DB::table('doctors')
            ->where('dr_id', $doctor->dr_id)
            ->update([
                'dr_photo' =>  $new_name
            ]);
        if (!$upload) {
            return response()->json(['status' => 0, 'msg' => 'Erreur, la mise à jour de l\'image dans la base de données a échoué']);
        } else {
            return response()->json(['status' => 1, 'msg' => 'Votre photo de profil a été mise à jour avec succès']);
        }
    }

    // function to updatae online appointment status
    function updateOnlineAppointment(Request $request)
    {
        self::$activeTab = 'online-appointment';

        $request->validate([
            'dr_appointment_active' => 'required'
        ]);

        $doctor = Doctor::where('dr_id', $request->dr_id)->first();

        $appointemntStatus = false;
        if ($request->dr_appointment_active == 'Activer') {
            $appointemntStatus = true;
        }

        $update = DB::table('doctors')
            ->where('dr_id', $doctor->dr_id)
            ->update([
                'dr_appointment_active' => $appointemntStatus
            ]);

        if ($update) {
            if ($appointemntStatus) {
                return back()->with('success', 'Rendez-vous online activé');
            } else {
                return back()->with('success', 'Rendez-vous online desactivé');
            }
            // $this->dispatchBrowserEvent('profileInfosUpdated');
        } else {
            return back()->with('fail', 'Erreur d\'activation, veuillez réessayer!');
        }
    }

    // function to desactivate doctor account
    function deleteDoctorAccount(Request $request)
    {
        self::$activeTab = 'delete';

        $request->validate([
            'dr_password' => 'required',
            'confirm_password' => 'required'
        ]);

        $doctor = Doctor::where('dr_id', '=', session('LoggedDoctor'))->first();

        if (FacadesHash::check($request->dr_password, $doctor->dr_password)) {

            if ($request->dr_password == $request->confirm_password) {
                $delete = DB::table('doctors')
                    ->where('dr_id', $doctor->dr_id)
                    ->update([
                        'dr_appointment_active' => false,
                        'dr_active' => 2,
                    ]);

                if ($delete) {
                    return redirect('doctor-login');
                    session()->pull('LoggedDoctor');
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

    // function to update doctor cv infos
    function updateCVInfos(Request $request)
    {

        $update = DB::table('doctor_c_v_s')
            ->where('dr_id', $request->dr_id)
            ->update([
                'cv_about' => $request->cv_about ?? '',
                'cv_phone' => $request->cv_phone ?? '',
                'cv_email' => $request->cv_email ?? '',
                'cv_website' => $request->cv_website ?? ''
            ]);

        if ($update) {
            return back()->with('success-1', 'Informations mises à jour avec succès');
        } else {
            return back()->with('fail-1', 'Erreur de mise à jour, veuillez réessayer!');
        }
    }

    // function to add doctor diplome 
    function addDiplome(Request $request)
    {

        $request->validate([
            'cv_diplome' => 'required'
        ]);

        $diplome = new Diplomes();
        $diplome->dr_id = $request->dr_id;
        $diplome->cv_diplome = $request->cv_diplome;
        $query = $diplome->save();
        if ($query) {
            return back()->with('success-2', 'Diplôme ajouté avec succès');
        } else {
            return back()->with('fail-2', "Erreur d'enregistrement, veuillez réessayer!");
        }
    }

    // function to delete doctor diplome 
    function deleteDiplome($id)
    {
        $delete = Diplomes::where('diplome_id', '=', $id)->delete();
        if ($delete) {
            return back()->with('success-2', 'Diplôme supprimé avec succès');
        } else {
            return back()->with('fail-2', 'Erreur de suppression, veuillez réessayer!');
        }
    }

    // function to add doctor experience 
    function addExperience(Request $request)
    {
        $request->validate([
            'cv_experience' => 'required'
        ]);

        $experience = new Experience();
        $experience->dr_id = $request->dr_id;
        $experience->cv_experience = $request->cv_experience;
        $query = $experience->save();
        if ($query) {
            return back()->with('success-3', 'Experince ajouté avec succès');
        } else {
            return back()->with('fail-3', "Erreur d'enregistrement, veuillez réessayer!");
        }
    }

    // function to delete doctor diplome 
    function deleteExperience($id)
    {
        $delete = Experience::where('experience_id', '=', $id)->delete();
        if ($delete) {
            return back()->with('success-3', 'Experience supprimé avec succès');
        } else {
            return back()->with('fail-3', 'Erreur de suppression, veuillez réessayer!');
        }
    }

    // function to add doctor equipment 
    function addEquipment(Request $request)
    {
        $request->validate([
            'cv_equipment' => 'required'
        ]);

        $equipment = new Equipment();
        $equipment->dr_id = $request->dr_id;
        $equipment->cv_equipment = $request->cv_equipment;
        $query = $equipment->save();
        if ($query) {
            return back()->with('success-4', 'Equipement ajouté avec succès');
        } else {
            return back()->with('fail-4', "Erreur d'enregistrement, veuillez réessayer!");
        }
    }

    // function to delete doctor equipment 
    function deleteEquipment($id)
    {
        $delete = Equipment::where('equipment_id', '=', $id)->delete();
        if ($delete) {
            return back()->with('success-4', 'Equipement supprimé avec succès');
        } else {
            return back()->with('fail-4', 'Erreur de suppression, veuillez réessayer!');
        }
    }

    // function to add doctor Wrking Day 
    function addEWorkingDay(Request $request)
    {
        $request->validate([
            'cv_working_day' => 'required'
        ]);

        $working_day = new WorkingDay();
        $working_day->dr_id = $request->dr_id;
        $working_day->cv_working_day = $request->cv_working_day;
        $query = $working_day->save();
        if ($query) {
            return back()->with('success-5', 'Horaire ajouté avec succès');
        } else {
            return back()->with('fail-5', "Erreur d'enregistrement, veuillez réessayer!");
        }
    }

    // function to delete doctor working Day 
    function deleteWorkingDay($id)
    {
        $delete = WorkingDay::where('working_day_id', '=', $id)->delete();
        if ($delete) {
            return back()->with('success-5', 'Horaire supprimé avec succès');
        } else {
            return back()->with('fail-5', 'Erreur de suppression, veuillez réessayer!');
        }
    }

    // function to add doctor Tarif
    function addTarif(Request $request)
    {
        $request->validate([
            'cv_tarif' => 'required'
        ]);

        $tarif = new Tarif();
        $tarif->dr_id = $request->dr_id;
        $tarif->cv_tarif = $request->cv_tarif;
        $query = $tarif->save();
        if ($query) {
            return back()->with('success-6', 'Tarif ajouté avec succès');
        } else {
            return back()->with('fail-6', "Erreur d'enregistrement, veuillez réessayer!");
        }
    }

    // function to delete doctor Tarif
    function deleteTarif($id)
    {
        $delete = Tarif::where('tarif_id', '=', $id)->delete();
        if ($delete) {
            return back()->with('success-6', 'Tarif supprimé avec succès');
        } else {
            return back()->with('fail-6', 'Erreur de suppression, veuillez réessayer!');
        }
    }

    // function to update doctor map 
    function updateCVMap(Request $request)
    {
        $request->validate([
            'cv_map' => 'required'
        ]);

        $update = DB::table('doctor_c_v_s')
            ->where('dr_id', $request->dr_id)
            ->update([
                'cv_map' => $request->cv_map,
            ]);

        if ($update) {
            return back()->with('success-7', 'Informations mises à jour avec succès');
        } else {
            return back()->with('fail-7', 'Erreur de mise à jour, veuillez réessayer!');
        }
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
