<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Appointment;
use App\Models\Assistant;
use App\Models\Contact;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Speciality;
use App\Models\Wilaya;
use Illuminate\Support\Facades\Hash as FacadesHash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AdminsController extends Controller
{
    //=================================
    //         Admin methods 
    //=================================
    public function adminLoginView()
    {
        return view('auth.login.admin_login');
    }

    function index()
    {
        if (session()->has('LoggedAdmin')) {

            // get logged doctor infos
            $admin = Admin::where('ad_id', '=', session('LoggedAdmin'))->first();

            // get statistcs
            
            $patients_count = Patient::count();
            $doctors_count = Doctor::count();
            $assistants_count = Assistant::count();
            $appointemnts_count = Appointment::count();
            $doctors_demende_count = Doctor::where('dr_confirmed', '=', 0 )->count();
            $contacts_count = Contact::count();
            $specialities_count = Speciality::count();
            $wilayas_count = Doctor::groupBy('dr_wilaya')->select('dr_wilaya', DB::raw('count(*) as total'))->get()->count();

            $data = [
                'LoggedAdminInfo' => $admin,
                'patients_count' => $patients_count,
                'doctors_count' => $doctors_count,
                'assistants_count' => $assistants_count,
                'appointemnts_count' => $appointemnts_count,
                'doctors_demende_count' => $doctors_demende_count,
                'contacts_count' => $contacts_count,
                'specialities_count' => $specialities_count,
                'wilayas_count' => $wilayas_count
            ];
        }
        return View('dashboards.admin.index', $data);
    }

    function doctors()
    {
        if (session()->has('LoggedAdmin')) {
            $admin = Admin::where('ad_id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo' => $admin
            ];
        }
        return View('dashboards.admin.doctors', $data);
    }

    function doctorsRequests()
    {
        if (session()->has('LoggedAdmin')) {
            $admin = Admin::where('ad_id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo' => $admin
            ];
        }
        return View('dashboards.admin.doctors_requests', $data);
    }

    function assistants()
    {
        if (session()->has('LoggedAdmin')) {
            $admin = Admin::where('ad_id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo' => $admin
            ];
        }
        return View('dashboards.admin.assistants', $data);
    }

    function patients()
    {
        if (session()->has('LoggedAdmin')) {
            $admin = Admin::where('ad_id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo' => $admin
            ];
        }
        return View('dashboards.admin.patients', $data);
    }

    function contacts()
    {
        if (session()->has('LoggedAdmin')) {
            $admin = Admin::where('ad_id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo' => $admin
            ];
        }
        return View('dashboards.admin.contacts', $data);
    }

    function contactPatients()
    {
        if (session()->has('LoggedAdmin')) {
            $admin = Admin::where('ad_id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo' => $admin
            ];
        }
        return View('dashboards.admin.contact-patients', $data);
    }

    function contactDoctors()
    {
        if (session()->has('LoggedAdmin')) {
            $admin = Admin::where('ad_id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo' => $admin
            ];
        }
        return View('dashboards.admin.contact-doctors', $data);
    }

    function specialites()
    {
        if (session()->has('LoggedAdmin')) {
            $admin = Admin::where('ad_id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo' => $admin
            ];
        }
        return View('dashboards.admin.specialite' , $data);
    }

    function profile()
    {
        if (session()->has('LoggedAdmin')) {
            $admin = Admin::where('ad_id', '=', session('LoggedAdmin'))->first();
            $data = [
                'LoggedAdminInfo' => $admin,
            ];
        }
        return View('dashboards.admin.profile', $data);
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
                return redirect('admin/dashboard');
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

    // function to update admin infos
    function updateAdmin(Request $request)
    {

        // escape username and email validation when the admin dosen't change them
        $admin = Admin::where('ad_id', '=', session('LoggedAdmin'))->first();

        if ($request->ad_username == $admin->ad_username) {
            $request->validate([
                'ad_firstname' => 'required',
                'ad_lastname' => 'required',
            ]);
        } else {
            $request->validate([
                'ad_firstname' => 'required',
                'ad_lastname' => 'required',
                'ad_username' => 'required|unique:admins'
            ]);
        }

        if ($request->ad_email == $admin->ad_email) {
            $request->validate([
                'ad_firstname' => 'required',
                'ad_lastname' => 'required',
            ]);
        } else {
            $request->validate([
                'ad_firstname' => 'required',
                'ad_lastname' => 'required',
                'ad_email' => 'required|email|unique:admins'
            ]);
        }

        $update = DB::table('admins')
            ->where('ad_id', $request->ad_id)
            ->update([
                'ad_firstname' => $request->ad_firstname,
                'ad_lastname' => $request->ad_lastname,
                'ad_username' => $request->ad_username,
                'ad_email' => $request->ad_email
            ]);

        if ($update) {
            return back()->with('success-1', 'Mise à jour du profil réussie');
            // $this->dispatchBrowserEvent('profileInfosUpdated');
        } else {
            return back()->with('fail-1', 'Erreur de mise à jour, veuillez réessayer!');
        }
    }

    // function to update admin profile picture 
    public function updatePicture(Request $request)
    {
        $path = 'users-images/admins/';
        $file = $request->file('admin-image');
        $new_name = 'ADM-IMG-' . date('ymd') . uniqid() . '.jpg';

        // upload the new image 
        $upload = $file->move(public_path($path), $new_name);

        if (!$upload) {
            return response()->json(['status' => 0, 'msg' => 'Erreur, le téléchargement de la nouvelle image a échoué']);
        } else {
            // get old picture
            $admin = Admin::where('ad_id', '=', session('LoggedAdmin'))->first();
            $old_picture =  $admin->ad_photo;
        }

        // delete the old picture 
        if ($old_picture != '') {
            if (Storage::exists(public_path($path), $old_picture)) {
                Storage::delete(public_path($path), $old_picture);
            }
        }

        // update picture in database
        $update = DB::table('admins')
            ->where('ad_id', $admin->ad_id)
            ->update([
                'ad_photo' =>  $new_name
            ]);
        if (!$upload) {
            return response()->json(['status' => 0, 'msg' => 'Erreur, la mise à jour de l\'image dans la base de données a échoué']);
        } else {
            return response()->json(['status' => 1, 'msg' => 'Votre photo de profil a été mise à jour avec succès']);
        }
    }

    // function to updatae admin password
    function updatePassword(Request $request)
    {

        $request->validate([
            'ad_password' => 'required',
            'new_password' => 'required|min:5',
            'confirm_password' => 'required|min:5',
        ]);

        $admin = Admin::where('ad_id', '=', session('LoggedAdmin'))->first();

        if (FacadesHash::check($request->ad_password, $admin->ad_password)) {

            if ($request->new_password == $request->confirm_password) {
                $update = DB::table('admins')
                    ->where('ad_id', $admin->ad_id)
                    ->update([
                        'ad_password' => FacadesHash::make($request->new_password),
                    ]);

                if ($update) {
                    return back()->with('success-2', 'Mot de passe mis à jour avec succès');
                } else {
                    return back()->with('fail-2', 'Erreur de mise à jour, veuillez réessayer!');
                }
            } else {
                return back()->with('info-2', 'Pas le même mot de passe!');
            }
        } else {
            return back()->with('info-2', 'Le mot de passe actuel que vous avez entré est erroné!');
        }
    }

    // function to logout admin 
    function adminLogout()
    {
        if (session()->has('LoggedAdmin')) {
            session()->pull('LoggedAdmin');
            return redirect('admin-login');
        }
    }
}
