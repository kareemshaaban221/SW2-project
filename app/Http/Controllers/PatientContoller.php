<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
class PatientContoller extends Controller
{

    public function index()
    {
        return view('components.patient.list', [
            'patients' => Patient::with('user')->limit(10)->get(),
            'title' => 'Patients'
        ]);
    }


    public function create()
    {
        return view('components.patient.add');
    }


    public function store(Request $request)
    {
        $patient=new Patient();
        $patient->email=$request->email;
        $patient->save();

        return  redirect()->back();
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $patient= Patient::find($id);
        $patient->delete();
        return  redirect()->back();
    }
}
