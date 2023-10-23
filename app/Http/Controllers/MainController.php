<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Appointment;
use App\Models\Schedule;
use App\Models\Speciality;
use App\Models\DoctorCV;
use App\Models\Diplomes;
use App\Models\Equipment;
use App\Models\Experience;
use App\Models\WorkingDay;
use App\Models\Tarif;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;

class MainController extends Controller
{
    public function index()
    {
        $doctors = Doctor::where('dr_confirmed', 1)->orderBy('dr_id', 'asc')->get();
        $patients_count = Patient::count();
        $doctors_count = Doctor::count();
        $specialities_count = Speciality::count();
        $appointemnts_count = Appointment::count();


        $data = [
            'doctors' => $doctors,
            'patients_count' => $patients_count,
            'doctors_count' => $doctors_count,
            'appointemnts_count' => $appointemnts_count,
            'specialities_count' => $specialities_count,
        ];

        return view('index',  $data);
    }

    public function doctors()
    {
        // return view('doctors_list', ['doctors' => Doctor::where('dr_active', 1)->get()]);
        return view('doctors_list');
    }

    public function doctorDetails($id)
    {
        $doctor = Doctor::where('dr_id', $id)->first();
        $contact_infos = DoctorCV::where('dr_id', '=', $id)->first();
        $diplomes = Diplomes::where('dr_id', '=', $id)->get();
        $experiences = Experience::where('dr_id', '=', $id)->get();
        $equipements = Equipment::where('dr_id', '=', $id)->get();
        $working_days = WorkingDay::where('dr_id', '=', $id)->get();
        $tarifs = Tarif::where('dr_id', '=', $id)->get();
        return view('doctor_details', [
            'doctor' => $doctor,
            'contact_infos' => $contact_infos,
            'diplomes' => $diplomes,
            'experiences' => $experiences,
            'equipments' => $equipements,
            'working_days' => $working_days,
            'tarifs' => $tarifs
        ]);
    }

    public function specialites()
    {
        return view('specialties_list', [
            'specialites' => Speciality::orderBy('sp_speciality_name', 'asc')->get()
        ]);
    }

    public function searchBySpeciality()
    {
        $speciality = request('speciality');

        $doctors = Doctor::where('dr_speciality', $speciality)
            ->orderBy('dr_id', 'asc')->paginate(6);

        return view('search-by-speciality', [
            'doctors' => $doctors
        ]);
    }

    public function makeAppointment($id)
    {
        $month = date('m');
        $year = date('Y');

        $doctor = Doctor::where('dr_id', $id)->first();

        $schedules =  Schedule::where('sc_id_doctor', $id)
            ->where('sc_month', $month)
            ->where('sc_year', '>=', $year)
            ->where('sc_year', '<=', '2050')
            ->orderBy('sc_date', 'asc')
            ->get();

        return view('make_appointment', [
            'doctor' => $doctor,
            'schedules' => $schedules
        ]);
    }

    public function contact()
    {
        return view('contact_us');
    }

    public function indexSearchDoctor(Request $request)
    {
        // dd("Nom : " . $request->dr_name  . " Secialite : " . $request->dr_specialite . "  Wilaya : " . $request->dr_wilaya);

        $dr_name = $request->dr_name;
        $dr_specialite = $request->dr_specialite;
        $dr_wilaya = $request->dr_wilaya;


        $doctors = DB::table('doctors')->where('dr_active', 1)
            ->where('dr_speciality', 'LIKE', '%' . $dr_specialite . '%')
            ->where('dr_wilaya', 'LIKE', '%' . $dr_wilaya . '%')
            ->where('dr_firstname', 'LIKE', '%' . $dr_name . '%')
            // ->where('dr_lastname', 'LIKE', '%' . $dr_name . '%')
            ->get();

        return view('search_doctor_result',  ['doctors' => $doctors]);
    }
}
