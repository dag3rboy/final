<?php

namespace App\Http\Livewire;

use App\Models\Assistant;
use Illuminate\Http\Request;
use Livewire\WithPagination;
use Illuminate\Support\Str;

use Livewire\Component;

class Assistants extends Component
{
    use WithPagination;
    public $dr_id, $firstname, $lastname, $as_username, $password;
    public $as_id, $upd_firstname, $upd_lastname, $upd_as_username, $upd_password;

    protected $listeners = ['delete'];
    
    public function render(Request  $request)
    {
        $this->dr_id = $request->session()->get('LoggedDoctor');
        return view('livewire.assistants', [
            'assistants' => Assistant::where('dr_id',$this->dr_id)->orderBy('as_id', 'asc')->paginate(5),
            'dr_id'  =>$this->dr_id
        ]);
    }

    // function to open add assistant modal 
    public function openAddAssistantModal()
    {
        $this->dispatchBrowserEvent('openAddAssistantModal');
    }

    // function to create new assistant  
    public function save()
    {
        $this->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'as_username' => 'required|unique:assistants',
            'password' => 'required|min:5'
        ]);

        $save = Assistant::insert([
            'dr_id' => $this->dr_id,
            'as_firstname' => $this->firstname,
            'as_lastname' => $this->lastname,
            'as_username' => $this->as_username,
            'as_password' => $this->password,
            'as_token' => Str::random(32),
            'as_deleted' => false
        ]);

        if ($save) {
            $this->dispatchBrowserEvent('closeAddAssistantModal');
        }
    }

    // function to open edit assistant modal 
    public function openEditAssistantModal($as_id)
    {
        $assistant_infos = Assistant::where('as_id', '=', $as_id)->first();
        $this->as_id = $assistant_infos->as_id;
        $this->upd_firstname = $assistant_infos->as_firstname;
        $this->upd_lastname = $assistant_infos->as_lastname;
        $this->upd_as_username = $assistant_infos->as_username;
        $this->upd_password = $assistant_infos->as_password;
        $this->dispatchBrowserEvent('openEditAssistantModal', ['as_id' => $as_id]);
    }

    // function to update assistant
    public function update()
    {
        $as_id =  $this->as_id;
        $this->validate([
            'upd_firstname' => 'required',
            'upd_lastname' => 'required',
            'upd_as_username' => 'required',
            'upd_password' => 'required|min:5'
        ], [
            'upd_firstname.required' => 'Insérez le nom d\'utilisateur s\'il vous plaît',
            'upd_lastname.required' => 'Insérez le prénom  s\'il vous plaît',
            'upd_as_username.unique' => 'Insérez le nom d\'utilisateur s\'il vous plaît',
            'upd_password.required' => 'Insérez le Mot de passe s\'il vous plaît'
        ]);
        $update = Assistant::where('as_id', '=', $as_id)->update([
            'as_firstname' => $this->upd_firstname,
            'as_lastname' => $this->upd_lastname,
            'as_username' => $this->upd_as_username,
            'as_password' => $this->upd_password
        ]);

        if ($update) {
            $this->dispatchBrowserEvent('closeEditAssistantModal');
        }
    }

    // function to show confirmationdeleting dialog
    public function deleteConfirm($as_id)
    {
        $assistant_infos = Assistant::where('as_id', '=', $as_id)->first();
        $this->dispatchBrowserEvent('SwalConfirm', [
            'title' => 'Supprimer l\'assistant',
            'html' => 'Voulez-vous supprimer cet assistant',
            'id' => $as_id
        ]);
    }

    // function to delete assistant
    public function delete($as_id)
    {
        $delete = Assistant::where('as_id', '=', $as_id)->delete();
        if($delete) {
            $this->dispatchBrowserEvent('deleted');
        }
    }
}
