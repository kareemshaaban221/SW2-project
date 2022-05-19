<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Services\CreatingService;
use App\Http\Controllers\Services\Helpers;
use App\Http\Controllers\Services\UpdatingService;
use App\Http\Controllers\Services\ValidationService;
use App\Models\Accountant;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountantContoller extends Controller
{
    use ValidationService, CreatingService, UpdatingService, Helpers;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role != 'manager') return abort(404);
        return view('components.accountant.list', [
            'accountants' => Accountant::with('employee')->get(),
            'title' => 'accountants'
        ]);
    }


    public function create()
    {
        if(Auth::user()->role != 'manager') return abort(404);
        return view('components.accountant.add');
    }


    public function store(Request $request)
    {
        if(Auth::user()->role != 'manager') return abort(404);
        $this->employeeCreateValidation($request);

        if($user = $this->userExists($request->email)) {
            if($user->role)
                return redirect(route('accountants.create'))
                    ->with('err', 'This Email Has Been Already Used By Another Employee!!')
                    ->withInput();
        }

        $this->createStaff($request, $user, Accountant::class, 'accountant');

        return redirect(route('accountants.index'))->with('done', 'Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($username)
    {
        if(Auth::user()->role != 'manager') return abort(404);
        $user = User::with('employee')->where('username', $username)->get()->first();

        if(!$user || $user->role != 'accountant') {
            return abort(404);
        }

        return view('components.accountant.profile', [
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
        if(Auth::user()->role != 'manager' && Auth::user()->role != 'accountant') return abort(404);
        $user = User::with('employee')->where('username', $username)->get()->first();

        if(!$user || $user->role != 'accountant') {
            return abort(404);
        }

        return view('components.accountant.edit', [
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
        if(Auth::user()->role != 'manager' && Auth::user()->role != 'accountant') return abort(404);
        $this->updateValidation($request);

        UpdatingService::update($request, $id, Employee::class);

        return redirect(route('accountants.show', User::select('username')->where('id', $id)->get()->first()->username))
            ->with('done', 'Updated!');
    }


    public function destroy($id)
    {
        if(Auth::user()->role != 'manager') return abort(404);
        $this->deleteEmployee( Accountant::with('employee')->find($id) );

        return back()->with('done', 'Deleted!');
    }
}
