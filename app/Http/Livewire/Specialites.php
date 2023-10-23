<?php

namespace App\Http\Livewire;

use App\Models\Speciality;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Specialites extends Component
{

    use WithFileUploads;
    use WithPagination;

    public $spe_id,
        $spe_code,
        $spe_name,
        $spe_image;

    public $up_spe_code, $up_spe_name, $up_spe_image;

    protected $listeners = ['deleteSP'];

    public function render()
    {
        return view('livewire.specialites', [
            // 'specialites' => Speciality::orderBy('sp_id', 'asc')->paginate(8)
            'specialites' => Speciality::orderBy('sp_id', 'asc')->get()
        ]);
    }

    // function to open add Speciality modal 
    public function openAddSpecialityModal()
    {
        $this->dispatchBrowserEvent('openAddSpecialityModal');
    }

    // function to open edit Speciality modal 
    public function openEditSpecialityModal($spe_id)
    {
        $speciality = Speciality::where('sp_id', '=', $spe_id)->first();

        $this->spe_id = $speciality->sp_id;
        $this->up_spe_code = $speciality->sp_speciality_label;
        $this->up_spe_name = $speciality->sp_speciality_name;

        $this->dispatchBrowserEvent('openEditSpecialityModal', [
            'spe_id' => $spe_id,
            'spe_image' => $this->up_spe_image
        ]);
    }

    // function to create new Speciality  
    public function save()
    {
        $this->validate([
            'spe_code' => 'required',
            'spe_name' => 'required',
            'spe_image' => 'required|image|mimes:jpg,jpeg,png,svg,gif|max:2048',
        ]);

        $upload = $this->spe_image->storeAs('public/specialties-images', $this->spe_image->getClientOriginalName());

        $save = Speciality::insert([
            'sp_speciality_label' => $this->spe_code,
            'sp_speciality_name' => $this->spe_name,
            'sp_speciality_image' => $this->spe_image->getClientOriginalName() ?? 'default.png'
        ]);

        if ($save && $upload) {
            $this->dispatchBrowserEvent('closeAddSpecialityModal');
        }
    }

    // function to update Speciality
    public function update()
    {
        $spe_id =  $this->spe_id;

        if (!empty($this->up_spe_image)) {
            $this->validate([
                'up_spe_code' => 'required',
                'up_spe_name' => 'required',
                'up_spe_image' => 'image|mimes:jpg,jpeg,png,svg,gif|max:2048'
            ], [
                'up_spe_code.required' => 'Insérez le code de la specialité s\'il vous plaît',
                'up_spe_name.required' => 'Insérez le nom de la specialité s\'il vous plaît',
                'up_spe_image.required' => 'Insérez l\'image de la specialité s\'il vous plaît',
                'up_spe_image.image' => 'Insérez l\'image de la specialité s\'il vous plaît',
                'up_spe_image.image' => 'Extension invalide'
            ]);
        } else {
            $this->validate([
                'up_spe_code' => 'required',
                'up_spe_name' => 'required',
            ], [
                'up_spe_code.required' => 'Insérez le code de la specialité s\'il vous plaît',
                'up_spe_name.required' => 'Insérez le nom de la specialité s\'il vous plaît',
            ]);
        }

        if (!empty($this->up_spe_image)) {
            $this->up_spe_image->storeAs('public/specialties-images', $this->up_spe_image->getClientOriginalName());
            $update = Speciality::where('sp_id', '=', $spe_id)->update([
                'sp_speciality_label' => $this->up_spe_code,
                'sp_speciality_name' => $this->up_spe_name,
                'sp_speciality_image' => $this->up_spe_image->getClientOriginalName()
            ]);
        } else {
            $update = Speciality::where('sp_id', '=', $spe_id)->update([
                'sp_speciality_label' => $this->up_spe_code,
                'sp_speciality_name' => $this->up_spe_name
            ]);
        }

        if ($update) {
            $this->dispatchBrowserEvent('closeEditSpecialityModal');
        }
    }

    // function to show confirmation deleting dialog
    public function deleteConfirm($spe_id)
    {
        //  $Speciality_infos = Speciality::where('sp_id', '=', $spe_id)->first();
        $this->dispatchBrowserEvent('SwalConfirmSP', [
            'id' => $spe_id
        ]);
    }

    // function to delete Speciality
    public function deleteSP($spe_id)
    {
        $delete = Speciality::where('sp_id', '=', $spe_id)->delete();
        if ($delete) {
            $this->dispatchBrowserEvent('deletedSP');
        }
    }
}
