<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assistant;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Schedule;
use Illuminate\Support\Facades\Hash as FacadesHash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AssistantsController extends Controller
{
    //=================================
    //      Assistant methods 
    //=================================
    public function assistantLoginView()
    {
        return view('auth.login.assistant_login');
    }

    function index()
    {
        if (session()->has('LoggedAssistant')) {

            $assistant = Assistant::where('as_id', '=', session('LoggedAssistant'))->first();
            $today_date = date('y-m-d');
            $patients_total = Appointment::groupBy('ap_patient_id')->select('ap_patient_id', DB::raw('count(*) as total'))
                ->where('ap_doctor_id', '=', $assistant->dr_id)
                ->count();
            $appointemnts_total = Appointment::where('ap_doctor_id', '=', $assistant->dr_id)->count();
            $appointemnts_today = Appointment::where('ap_appointment_date', '=', $today_date)->count();
            $appointemnts_future = Appointment::where('ap_appointment_date', '>', $today_date)->count();
            // $appointemnts_total = Appointment::where('dr_id', '=', session('LoggedDoctor'))->count();

            $data = [
                'LoggedAssistantInfo' => $assistant,
                'patients_total' => $patients_total,
                'appointemnts_total' => $appointemnts_total,
                'appointemnts_future' => $appointemnts_future,
                'appointemnts_today' => $appointemnts_today,
            ];
        }
        return View('dashboards.assistant.index', $data);
    }

    function calender()
    {
        if (session()->has('LoggedAssistant')) {
            $assistant = Assistant::where('as_id', '=', session('LoggedAssistant'))->first();
            // $dr_id = $assistant->dr_id;
            // $month = date('m');
            // $schedules =  Schedule::where('dr_id', '=', $dr_id)
            // ->where('sc_mounth', '=', $month)
            // ->get();

            $data = [
                'LoggedAssistantInfo' => $assistant
                // 'dr_id' => $dr_id,
                // 'schedules' => $schedules,

            ];
        }
        return View('dashboards.assistant.calender', $data);
    }

    function appointments()
    {
        if (session()->has('LoggedAssistant')) {
            $assistant = Assistant::where('as_id', '=', session('LoggedAssistant'))->first();
            $data = [
                'LoggedAssistantInfo' => $assistant
            ];
        }
        return View('dashboards.assistant.appointments', $data);
    }

    function settings()
    {
        if (session()->has('LoggedAssistant')) {
            $assistant = Assistant::where('as_id', '=', session('LoggedAssistant'))->first();
            $data = [
                'LoggedAssistantInfo' => $assistant
            ];
        }
        return View('dashboards.Assistant.settings', $data);
    }


    // function to check assistant login
    public function checkAssistant(Request $request)
    {
        $request->validate([
            'as_username' => 'required',
            'as_password' => 'required'
        ]);

        // if form validated succesfully, then login assistant
        $assistant = Assistant::where('as_username', '=', $request->as_username)->first();

        if ($assistant) {
            // if (FacadesHash::check($request->as_password, $assistant->as_password)) {
            if ($request->as_password == $assistant->as_password) {
                // if password match then redirect assistant to his profile
                $request->session()->put('LoggedAssistant', $assistant->as_id);
                return redirect('assistant/dashboard');
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
}
