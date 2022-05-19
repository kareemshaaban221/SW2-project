<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Services\CreatingService;
use App\Http\Controllers\Services\Helpers;
use App\Http\Controllers\Services\UpdatingService;
use App\Http\Controllers\Services\ValidationService;
use App\Models\Manager;
use App\Models\User;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    use ValidationService, UpdatingService, CreatingService, Helpers;

    public function __construct()
    {
        $this->middleware('isManager');
    }

    public function index()
    {
        return view('components.manager.list', [
            'managers' => Manager::with('user')->get(),
            'title' => 'managers'
        ]);
    }

    public function create()
    {
        return view('components.manager.add');
    }

    public function store(Request $request)
    {
        $this->emailValidation($request);

        if($this->userExists($request->email)) {
            return redirect(route('managers.create'))->with('exists', 'yes')->withInput();
        }

        $this->createManager($request);

        return redirect(route('managers.index'))->with('done', 'Added!');
    }

    public function show($username)
    {
        $user = User::with('manager')->where('username', $username)->get()->first();

        if(!$user || $user->role != 'manager') {
            return abort(404);
        }

        return view('components.manager.profile', [
            'user' => $user
        ]);
    }

    public function edit($username)
    {
        $user = User::with('manager')->where('username', $username)->get()->first();

        if(!$user || $user->role != 'manager') {
            return abort(404);
        }

        return view('components.manager.edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->updateValidation($request);

        UpdatingService::update($request, $id, Manager::class);

        return redirect(route('managers.show', User::select('username')->where('id', $id)->get()->first()->username))
            ->with('done', 'Updated!');
    }

    public function destroy($ids) // manager id
    {
        //! less performance because there are new db connection
        // $user_id = Manager::select('user_id')->where('id', $id)->get()->first()->user_id;

        $ids = explode('&', $ids);

        User::where('id', $ids[0])->update([
            'role' => NULL
        ]);

        Manager::destroy($ids[1]);

        return back()->with('done', 'Deleted!');
    }

    /**
     * if manager want to add two employee
     * with the same email this method handle
     * this case
     *
     * @return redirect to the previous page if
     * the email is exists otherwise add the new
     * user and @return redirect to the index page
     */
    function createWithExistingEmail(Request $request) {
        $user = User::where('email', $request->email)->first();
        if( $this->hasRole($user->id) ) {
            return redirect(route('managers.create'))->with('err', 'This Email Has Been Already Used By Another Employee!!')->withInput();
        } else {
            $this->createManager($request, $user);

            return redirect(route('managers.index'))->with('done', 'Added!');
        }
    }
}
