<?php

namespace App\Http\Livewire;

use App\Models\Doctor;
use App\Models\DoctorCV;
use Livewire\Component;
use Illuminate\Support\Facades\Hash as FacadesHash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class Doctors extends Component
{
    use WithPagination;

    public
        $dr_id,
        $dr_firstname,
        $dr_lastname,
        $dr_username,
        $dr_password,
        $dr_gender,
        $dr_email,
        $dr_telephone,
        $dr_wilaya,
        $dr_city,
        $dr_adress,
        $dr_service,
        $dr_stat,
        $dr_department,
        $dr_speciality,
        $dr_birthday;
    public
        $add_firstname,
        $add_lastname,
        $add_username,
        $add_password,
        $add_gender,
        $add_email,
        $add_telephone,
        $add_wilaya,
        $add_city,
        $add_adress,
        $add_speciality;
    public
        $edit_firstname,
        $edit_lastname,
        $edit_username,
        $edit_password,
        $edit_gender,
        $edit_email,
        $edit_telephone,
        $edit_wilaya,
        $edit_city,
        $edit_adress,
        $edit_speciality,
        $edit_service,
        $edit_department,
        $edit_birthday;

    protected $listeners = ['deleteDR'];

    public function render()
    {
        return view('livewire.doctors', ['doctors' => Doctor::where('dr_confirmed', 1)
        ->orderBy('dr_id', 'asc')->paginate(7)]);
    }

    // function to open add doctor modal 
    public function openAddDoctorModal()
    {
        $this->dispatchBrowserEvent('openAddDoctorModal');
    }

    // function to open add doctor modal 
    public function openViewDoctorModal($dr_id)
    {
        $doctor_infos = Doctor::where('dr_id', '=', $dr_id)->first();

        $this->dr_id = $doctor_infos->dr_id;
        $this->dr_firstname = $doctor_infos->dr_firstname;
        $this->dr_lastname = $doctor_infos->dr_lastname;
        $this->dr_username = $doctor_infos->dr_username;
        $this->dr_password = $doctor_infos->dr_password;
        $this->dr_gender = $doctor_infos->dr_gender;
        $this->dr_email = $doctor_infos->dr_email;
        $this->dr_telephone = $doctor_infos->dr_telephone;
        $this->dr_wilaya = $doctor_infos->dr_wilaya;
        $this->dr_city = $doctor_infos->dr_city;
        $this->dr_adress = $doctor_infos->dr_adress;
        $this->dr_department = $doctor_infos->dr_department;
        $this->dr_service = $doctor_infos->dr_service;
        $this->dr_stat = $doctor_infos->dr_active;
        $this->dr_speciality = $doctor_infos->dr_speciality;
        $this->dr_birthday = $doctor_infos->dr_birthday;

        $this->dispatchBrowserEvent('openViewDoctorModal');
    }

    // function to open add doctor modal 
    public function openEditDoctorModal($dr_id)
    {
        $doctor_infos = Doctor::where('dr_id', '=', $dr_id)->first();

        $this->dr_id = $doctor_infos->dr_id;
        $this->edit_firstname = $doctor_infos->dr_firstname;
        $this->edit_lastname = $doctor_infos->dr_lastname;
        $this->edit_username = $doctor_infos->dr_username;
        $this->edit_password = $doctor_infos->dr_password;
        $this->edit_gender = $doctor_infos->dr_gender;
        $this->edit_email = $doctor_infos->dr_email;
        $this->edit_telephone = $doctor_infos->dr_telephone;
        $this->edit_wilaya = $doctor_infos->dr_wilaya;
        $this->edit_city = $doctor_infos->dr_city;
        $this->edit_adress = $doctor_infos->dr_adress;
        $this->edit_department = $doctor_infos->dr_department;
        $this->edit_service = $doctor_infos->dr_service;
        $this->edit_stat = $doctor_infos->dr_active;
        $this->edit_speciality = $doctor_infos->dr_speciality;
        $this->edit_birthday = $doctor_infos->dr_birthday;

        $this->dispatchBrowserEvent('openEditDoctorModal', ['dr_id' => $dr_id]);
    }

    // function to get last inserted id for a doctor to use it to create unique doctor cv name 
    public function getLastDoctorID()
    {
        $doctor = DB::table('doctors')->orderBy('dr_id', 'desc')->first();
        $last_id =  intval($doctor->dr_id);
        return $last_id;
    }

    // function to create new doctor  
    public function save()
    {
        $this->validate([
            'add_firstname' => 'required',
            'add_lastname' => 'required',
            'add_username' => 'required',
            'add_password' => 'required',
            'add_email' => 'required|email',
            'add_telephone' => 'required|min:7|max:15',
            'add_gender' => 'required',
            'add_wilaya' => 'required',
            'add_city' => 'required',
            'add_speciality' => 'required',
            'add_adress' => 'required'
        ], [
            'add_firstname.required' => 'Insérez le nom de médecin',
            'add_lastname.required' => 'Insérez le prénom de médecin ',
            'add_username.required' => 'Insérez le nom d\'utilisateur',
            'add_password.required' => 'Insérez le mot de passe',
            'add_email.required' => 'Insérez l\'adresse email',
            'add_telephone.required' => 'Insérez numéro de telephone',
            'add_gender.required' => 'Insérez le genre',
            'add_wilaya.required' => 'Insérez la wilaya',
            'add_city.required' => 'Insérez la ville',
            'add_speciality.required' => 'Insérez la spécialité',
            'add_adress.required' => 'Insérez l\'adresse de médecin'
        ]);

        $save = Doctor::insert([
            'dr_firstname' => $this->add_firstname,
            'dr_lastname' => $this->add_lastname,
            'dr_username' => $this->add_username,
            'dr_password' => FacadesHash::make($this->add_password),
            'dr_email' => $this->add_email,
            'dr_speciality' => $this->add_speciality,
            'dr_department' => "",
            'dr_service' => "",
            'dr_telephone' => $this->add_telephone,
            'dr_gender' => $this->add_gender,
            'dr_birthday' => date("Y-m-d"),
            'dr_adress' => $this->add_adress,
            'dr_city' => $this->add_city,
            'dr_wilaya' => $this->add_wilaya,
            'dr_photo' => "default.png",
            'dr_appointment_active' => true,
            'dr_confirmed' => true,
            'dr_active' => true,
            'dr_token' => Str::random(32),
        ]);

        if ($save) {
            $id =  $this->getLastDoctorID();
            DoctorCV::insert([
                'dr_id' => $id,
                'cv_about' => "",
                'cv_phone' => "",
                'cv_email' => "",
                'cv_website' => "",
                'cv_map' => ""
            ]);
            $this->dispatchBrowserEvent('closeAddDoctorModal');
        }
    }

    // function to update doctor
    public function update()
    {
        $dr_id =  $this->dr_id;
        $this->validate([
            'edit_firstname' => 'required',
            'edit_lastname' => 'required',
            'edit_username' => 'required',
            'edit_password' => 'required',
            'edit_email' => 'required|email',
            'edit_telephone' => 'required|min:7|max:15',
        ], [
            'edit_firstname.required' => 'Insérez le nom d\'utilisateur',
            'edit_lastname.required' => 'Insérez le prénom',
            'edit_username.required' => 'Insérez le nom d\'utilisateur',
            'edit_password.required' => 'Insérez le Mot de passe',
            'edit_email.required' => 'Insérez l\'adress email',
            'edit_email.unique' => 'Cet email est déja utilisé!',
            'edit_telephone.required' => 'Insérez le numéro du telephone'
        ]);

        $doctor = Doctor::where('dr_id', '=', $dr_id)
            ->where('dr_confirmed', '=', 1)
            ->where('dr_active', '=', 1)
            ->first();

        if ($this->edit_password == $doctor->dr_password) {
            $update = Doctor::where('dr_id', '=', $dr_id)->update([
                'dr_firstname' => $this->edit_firstname,
                'dr_lastname' => $this->edit_lastname,
                'dr_username' => $this->edit_username,
                'dr_email' => $this->edit_email,
                'dr_speciality' => $this->edit_speciality,
                'dr_department' => $this->edit_department,
                'dr_service' => $this->edit_service,
                'dr_telephone' => $this->edit_telephone,
                'dr_gender' => $this->edit_gender,
                'dr_birthday' => $this->edit_birthday,
                'dr_adress' => $this->edit_adress,
                'dr_city' => $this->edit_city,
                'dr_wilaya' => $this->edit_wilaya,
            ]);
        } else {
            $update = Doctor::where('dr_id', '=', $dr_id)->update([
                'dr_firstname' => $this->edit_firstname,
                'dr_lastname' => $this->edit_lastname,
                'dr_username' => $this->edit_username,
                'dr_password' => FacadesHash::make($this->edit_password),
                'dr_email' => $this->edit_email,
                'dr_speciality' => $this->edit_speciality,
                'dr_department' => $this->edit_department,
                'dr_service' => $this->edit_service,
                'dr_telephone' => $this->edit_telephone,
                'dr_gender' => $this->edit_gender,
                'dr_birthday' => $this->edit_birthday,
                'dr_adress' => $this->edit_adress,
                'dr_city' => $this->edit_city,
                'dr_wilaya' => $this->edit_wilaya
            ]);
        }

        if ($update) {
            $this->dispatchBrowserEvent('closeEditDoctorModal');
        }
    }

    // function to show confirmation deleting dialog
    public function deleteConfirm($dr_id)
    {
        $this->dispatchBrowserEvent('SwalConfirmDR', [
            'id' => $dr_id
        ]);
    }

    // function to delete doctor
    public function deleteDR($dr_id)
    {
        $delete = Doctor::where('dr_id', '=', $dr_id)->delete();
        if ($delete) {
            $this->dispatchBrowserEvent('deletedDR');
        }
    }
}
