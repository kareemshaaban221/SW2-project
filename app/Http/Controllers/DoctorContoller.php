<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Services\CreatingService;
use App\Http\Controllers\Services\Helpers;
use App\Http\Controllers\Services\UpdatingService;
use App\Http\Controllers\Services\ValidationService;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Employee;
use App\Models\User;

class DoctorContoller extends Controller
{
    use Helpers, ValidationService, CreatingService, UpdatingService;

    public function index()
    {
        return view('components.doctor.list', [
            'doctors' => Doctor::with('employee')->limit(10)->get(),
            'title' => 'doctors'
        ]);
    }


    public function create()
    {
        return view('components.doctor.add');
    }


    public function store(Request $request)
    {
        $this->employeeCreateValidation($request);

        if($user = $this->userExists($request->email)) {
            if($user->role)
                return redirect(route('doctors.create'))
                    ->with('err', 'This Email Has Been Already Used By Another Employee!!')
                    ->withInput();
        }

        $this->createStaff($request, $user, Doctor::class, 'doctor');

        return redirect(route('doctors.index'))->with('done', 'Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($username)
    {
        $user = User::with('employee')->where('username', $username)->get()->first();

        if(!$user || $user->role != 'doctor') {
            return abort(404);
        }

        return view('components.doctor.profile', [
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($username)
    {
        $user = User::with('employee')->where('username', $username)->get()->first();

        if(!$user || $user->role != 'doctor') {
            return abort(404);
        }

        return view('components.doctor.edit', [
            'user' => $user
        ]);
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
        $this->updateValidation($request);

        UpdatingService::update($request, $id, Employee::class);

        return redirect(route('doctors.show', User::select('username')->where('id', $id)->get()->first()->username))
            ->with('done', 'Updated!');
    }


    public function destroy($id)
    {
        $this->deleteEmployee( Doctor::with('employee')->find($id) );

        return back()->with('done', 'Deleted!');
    }
}
