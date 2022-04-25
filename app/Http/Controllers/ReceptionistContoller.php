<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Services\CreatingService;
use App\Http\Controllers\Services\Helpers;
use App\Http\Controllers\Services\UpdatingService;
use App\Http\Controllers\Services\ValidationService;
use Illuminate\Http\Request;
use App\Models\Receptionist;
use App\Models\User;

class ReceptionistContoller extends Controller
{
    use ValidationService, CreatingService, UpdatingService, Helpers;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('components.receptionist.list', [
            'receptionists' => Receptionist::with('employee')->limit(10)->get(),
            'title' => 'receptionists'
        ]);
    }


    public function create()
    {
        return view('components.receptionist.add');
    }


    public function store(Request $request)
    {
        $this->employeeCreateValidation($request);

        if($user = $this->userExists($request->email)) {
            if($user->role)
                return redirect(route('receptionists.create'))
                    ->with('err', 'This Email Has Been Already Used By Another Employee!!')
                    ->withInput();
        }

        $this->createReceptionist($request, $user);

        return redirect(route('receptionists.index'))->with('done', 'Added!');
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
        $receptionist= Receptionist::with('employee')->find($id);
        $employee = $receptionist->employee;
        $user = $employee->user;

        $receptionist->delete();
        $employee->delete();

        $user->role = NULL;
        $user->save();

        return back()->with('done', 'Deleted!');
    }
}
