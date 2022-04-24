<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
class DoctorContoller extends Controller
{

    public function index()
    {
        return view('components.doctors.alldoctors', [
            'rows' => Doctor::with('user')->limit(10)->get(),
            'title' => 'doctors'
        ]);
    }


    public function create()
    {
        return view('components.doctors.adddoctor');
    }

  
    public function store(Request $request)
    {
        $doctor=new Doctor();
        $doctor->email=$request->email;
        $doctor->save();

        return  redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        $doctor= Doctor::find($id);
        $doctor->delete();
        return  redirect()->back();
    }
}
