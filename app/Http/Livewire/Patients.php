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
