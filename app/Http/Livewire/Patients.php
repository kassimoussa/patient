<?php

namespace App\Http\Livewire;

use App\Models\Patient;
use Livewire\Component;
use App\Models\Consultation;

class Patients extends Component
{
    //public $patients;
    public $searche ;
    public $consultations;
    public $speconsult;

    public $pl;
    public $cl;
    public $spc;

    public $patient, $prenom, $nom, $telephone, $adresse, $age, $situ_fami, $assure, $edit_id, $delete_id;

    public $selectedState = NULL;

    public function mount()
    {
        //$this->patients= Patient::all();
        $this->consultations= NULL;
        $this->speconsult= NULL;
        $this->searche= "";

        $this->pl= "col-md-12";
        $this->cl= "hidden";
        $this->spc= "hidden";

    }

    public function storePatient()
    {
        $patient = new Patient();
        $patient->prenom = $this->prenom;
        $patient->nom = $this->nom;
        $patient->telephone = $this->telephone;
        $patient->adresse = $this->adresse;
        $patient->age = $this->age;
        $patient->situ_fami = $this->situ_fami;
        $patient->assure = $this->assure;
        $patient->save();

        session()->flash('success', 'Nouveau patient ajouté');

        $this->prenom = '';
        $this->nom = '';
        $this->telephone = '';
        $this->adresse = '';
        $this->age = '';
        $this->situ_fami = '';
        $this->assure = '';

        $this->dispatchBrowserEvent('close-modal');
    }

    public function resetInputs()
    {
        $this->prenom = '';
        $this->nom = '';
        $this->telephone = '';
        $this->adresse = '';
        $this->age = '';
        $this->situ_fami = '';
        $this->assure = '';
        $this->edit_id = '';
    }

    public function editPatient($id)
    {
        $patient = Patient::where('id', $id)->first();   
        $this->edit_id = $patient->id;
        $this->prenom = $patient->prenom;
        $this->nom = $patient->nom;
        $this->telephone = $patient->telephone;
        $this->adresse = $patient->adresse;
        $this->age = $patient->age;
        $this->situ_fami = $patient->situ_fami;
        $this->assure = $patient->assure;

        $this->dispatchBrowserEvent('show-patient-edit-modal');
    }

    public function updatePatient()
    {
        $patient = $patient = Patient::where('id', $this->edit_id)->first(); 
        $patient->prenom = $this->prenom;
        $patient->nom = $this->nom;
        $patient->telephone = $this->telephone;
        $patient->adresse = $this->adresse;
        $patient->age = $this->age;
        $patient->situ_fami = $this->situ_fami;
        $patient->assure = $this->assure;
        $patient->save();

        session()->flash('success', 'inofs patient modifier ');
    }

    public function deletePatientConfirme($id)
    {
        //$patient = Patient::where('id', $id)->first();   
        $this->delete_id = $id;   
        $this->dispatchBrowserEvent('show-patient-delete-modal');
    }

    public function deletePatient()
    {
        Consultation::where('id_patient', $this->delete_id)->delete();
        Patient::destroy($this->delete_id);
        
        /* $patient = Patient::where('id', $this->delete_id)->first();   
        $patient->delete;  */
        session()->flash('success', 'patient supprimer avec success ');
    }

    public function render()
    {
        $searche =  $this->searche  ;
        $patients =  Patient::where('telephone','Like', '%' . $searche . '%')->orderBy('prenom', 'asc')->get();
        return view('livewire.patients', ['patients' => $patients]); 
    }

    public function consults($id)
    {
        if (!is_null($id)) {
            $this->consultations =Consultation::where('id_patient', $id)->get();
            $this->pl= "col-md-8";
            $this->cl= "col-md-4";
            $this->spc= "hidden";
        }
    }

    public function spefconsult($id)
    {
        if (!is_null($id)) {
            $this->speconsult =Consultation::where('id', $id)->first();
            $this->pl= "col-md-6";
            $this->cl= "col-md-2";
            $this->spc= "col-md-4";
        }
    }
}
