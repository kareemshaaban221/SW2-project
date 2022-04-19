<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Services\UpdatingService;
use App\Http\Controllers\Services\ValidationService;
use App\Models\Manager;
use App\Models\User;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    use ValidationService, UpdatingService;

    public function index()
    {
        return view('components.table', [
            'rows' => Manager::with('user')->limit(10)->get(),
            'title' => 'managers'
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($username)
    {
        $user = User::with('manager')->where('username', $username)->get()->first();

        return view('components.manager.profile', [
            'user' => $user
        ]);
    }

    public function edit($username)
    {
        $user = User::with('manager')->where('username', $username)->get()->first();

        return view('components.manager.edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->managerUpdateValidation($request);

        $this->updateManager($request, $id);

        return redirect(route('managers.show', User::select('username')->where('id', $id)->get()->first()->username))
            ->with('done', 'Updated!');
    }

    public function destroy($id)
    {
        //
    }
}
