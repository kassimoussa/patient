<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $patient = $request->all(); 
        Patient::create($patient);
        return back()->with('success', 'Patient ajouté');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        return view('show_patient', compact('patient'));
    }

    public function create_consultation(Patient $patient)
    {
        return view('consultation', compact('patient'));
    }

    public function store_consultation(Request $request)
    {
        $consultation = $request->all(); 
        Consultation::create($consultation);
        return back()->with('success', 'Consultation ajouté');
    }

    public function getConsultation(Request $request)
    {
        $cid = $request->cid;

        $consultations = Consultation::where('id', $cid)->first();
        return response()->json($consultations);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        return view('edit_patient', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Patient $patient)
    {
        $query = $patient->update($request->all());
        if($query){
            return back()->with('success', 'Changement effectué ');
        }else{
            return back()->with('fail', 'Echec ');
        }
    }

    public function edit_consultation($id)
    {
        $consultation = Consultation::where('id', $id)->first();
        return view('edit_consultation', compact('consultation'));
    }

    public function update_consultation(Request $request, Consultation $consultation)
    {
        $query = $consultation->update($request->all());
        if($query){
            return back()->with('success', 'Changement effectué ');
        }else{
            return back()->with('fail', 'Echec ');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
