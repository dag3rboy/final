<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assistant;
use Illuminate\Support\Facades\Hash as FacadesHash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AssistantAuthController extends Controller
{
    //=================================
    //      Assistant methods 
    //=================================
    public function assistantLoginView()
    {
        return view('auth.login.assistant_login');
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
}
