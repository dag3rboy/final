<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash as FacadesHash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AdminAuthController extends Controller
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
}
