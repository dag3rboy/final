<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomPagesController extends Controller
{
    public function pageNotFound()
    {
        return view('custom-pages.404');
    }
    
    public function messageSent()
    {
        return view('custom-pages.contact_sent');
    }

    public function appointmentSent()
    {
        return view('custom-pages.appointment_sent');
    }
}
