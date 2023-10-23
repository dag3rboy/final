<?php

namespace App\Http\Livewire;

use App\Models\Patient;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash as FacadesHash;
use Livewire\Component;
use Livewire\WithPagination;

class Patients extends Component
{

    use WithPagination;

    public
        $pa_id,
        $pa_firstname,
        $pa_lastname,
        $pa_username,
        $pa_password,
        $pa_gender,
        $pa_email,
        $pa_telephone,
        $pa_wilaya,
        $pa_city,
        $pa_adress,
        $pa_stat,
        $pa_registration_date,
        $pa_birthday;
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
        $add_birthday,
        $add_adress;
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
        $edit_birthday;

    protected $listeners = ['deletePA'];


    public function render()
    {
        return view('livewire.patients', [
            'patients' => Patient::orderBy('pa_id', 'asc')->paginate(7)
        ]);
    }

    // function to open add patient modal 
    public function openAddPatientModal()
    {
        $this->dispatchBrowserEvent('openAddPatientModal');
    }

    // function to open view Patient modal 
    public function openViewPatientModal($pa_id)
    {
        $patient_infos = Patient::where('pa_id', '=', $pa_id)->first();

        $this->pa_id = $patient_infos->pa_id;
        $this->pa_firstname = $patient_infos->pa_firstname;
        $this->pa_lastname = $patient_infos->pa_lastname;
        $this->pa_username = $patient_infos->pa_username;
        $this->pa_password = $patient_infos->pa_password;
        $this->pa_gender = $patient_infos->pa_gender;
        $this->pa_email = $patient_infos->pa_email;
        $this->pa_telephone = $patient_infos->pa_telephone;
        $this->pa_wilaya = $patient_infos->pa_wilaya;
        $this->pa_city = $patient_infos->pa_city;
        $this->pa_adress = $patient_infos->pa_adress;
        $this->pa_stat = $patient_infos->pa_deleted;
        $this->pa_birthday = $patient_infos->pa_birthday;
        $this->pa_registration_date = $patient_infos->pa_registration_date;

        $this->dispatchBrowserEvent('openViewPatientModal');
    }

    // function to open edit Patient modal 
    public function openEditPatientModal($pa_id)
    {
        $patient_infos = Patient::where('pa_id', '=', $pa_id)->first();

        $this->pa_id = $patient_infos->pa_id;
        $this->edit_firstname = $patient_infos->pa_firstname;
        $this->edit_lastname = $patient_infos->pa_lastname;
        $this->edit_username = $patient_infos->pa_username;
        $this->edit_password = $patient_infos->pa_password;
        $this->edit_gender = $patient_infos->pa_gender;
        $this->edit_email = $patient_infos->pa_email;
        $this->edit_telephone = $patient_infos->pa_telephone;
        $this->edit_wilaya = $patient_infos->pa_wilaya;
        $this->edit_city = $patient_infos->pa_city;
        $this->edit_adress = $patient_infos->pa_adress;
        $this->edit_birthday = $patient_infos->pa_birthday;

        $this->dispatchBrowserEvent('openEditPatientModal',  ['pa_id' => $pa_id]);
    }

    // function to create new patient  
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
            'add_adress' => 'required'
        ], [
            'add_firstname.required' => 'Insérez le nom de patient',
            'add_lastname.required' => 'Insérez le prénom de patient ',
            'add_username.required' => 'Insérez le nom d\'utilisateur',
            'add_password.required' => 'Insérez le mot de passe',
            'add_email.required' => 'Insérez l\'adresse email',
            'add_telephone.required' => 'Insérez numéro de telephone',
            'add_gender.required' => 'Insérez le genre',
            'add_wilaya.required' => 'Insérez la wilaya',
            'add_city.required' => 'Insérez la ville',
            'add_adress.required' => 'Insérez l\'adresse de patient'
        ]);

        $save = Patient::insert([
            'pa_firstname' => $this->add_firstname,
            'pa_lastname' => $this->add_lastname,
            'pa_username' => $this->add_username,
            'pa_password' => FacadesHash::make($this->add_password),
            'pa_email' => $this->add_email,
            'pa_telephone' => $this->add_telephone,
            'pa_gender' => $this->add_gender,
            'pa_birthday' => $this->add_birthday,
            'pa_adress' => $this->add_adress,
            'pa_city' => $this->add_city,
            'pa_wilaya' => $this->add_wilaya,
            'pa_photo' => "default.png",
            'pa_token' => Str::random(32),
            'pa_deleted' => false
        ]);

        if ($save) {
            $this->dispatchBrowserEvent('closeAddPatientModal');
        }
    }

    // function to update doctor
    public function update()
    {
        $pa_id =  $this->pa_id;
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

        $patient = Patient::where('pa_id', '=', $pa_id)
            ->where('pa_deleted', '=', 0)
            ->first();

        if ($this->edit_password == $patient->pa_password) {
            $update = Patient::where('pa_id', '=', $pa_id)->update([
                'pa_firstname' => $this->edit_firstname,
                'pa_lastname' => $this->edit_lastname,
                'pa_username' => $this->edit_username,
                'pa_email' => $this->edit_email,
                'pa_telephone' => $this->edit_telephone,
                'pa_gender' => $this->edit_gender,
                'pa_birthday' => $this->edit_birthday,
                'pa_adress' => $this->edit_adress,
                'pa_city' => $this->edit_city,
                'pa_wilaya' => $this->edit_wilaya,
            ]);
        } else {
            $update = Patient::where('pa_id', '=', $pa_id)->update([
                'pa_firstname' => $this->edit_firstname,
                'pa_lastname' => $this->edit_lastname,
                'pa_username' => $this->edit_username,
                'pa_password' => FacadesHash::make($this->edit_password),
                'pa_email' => $this->edit_email,
                'pa_telephone' => $this->edit_telephone,
                'pa_gender' => $this->edit_gender,
                'pa_birthday' => $this->edit_birthday,
                'pa_adress' => $this->edit_adress,
                'pa_city' => $this->edit_city,
                'pa_wilaya' => $this->edit_wilaya
            ]);
        }

        if ($update) {
            $this->dispatchBrowserEvent('closeEditPatientModal');
        }
    }

    // function to show confirmation deleting dialog
    public function deleteConfirm($pa_id)
    {
        $this->dispatchBrowserEvent('SwalConfirmPA', [
            'id' => $pa_id
        ]);
    }

    // function to delete doctor
    public function deletePA($pa_id)
    {
        $delete = Patient::where('pa_id', '=', $pa_id)->delete();
        if ($delete) {
            $this->dispatchBrowserEvent('deletedPA');
        }
    }
}
