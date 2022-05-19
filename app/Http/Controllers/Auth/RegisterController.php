<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Services\Helpers;
use App\Http\Controllers\Services\UpdatingService;
use App\Http\Controllers\Services\ValidationService;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    use AuthenticatesUsers, ValidationService, UpdatingService, Helpers;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function register(Request $request) {
        $this->emailValidation($request);

        $user = $this->userExists($request->email);

        if(!$user || $user->role == 'patient') { // email not found
            return back()->with(
                'err',
                'This Email Is Not Added By Managers, Please Contact With Them!'
            );
        }

        if($user->username) { // already registered registered
            return back()->with(
                'err',
                'This Email Has Already Registered In Our Website, Please Login From <a href="/login">Here</a>!'
            );
        }

        return redirect('/register2')->with('user', $user);
    }

    public function register2(Request $request, $id) {
        $user = User::find($id);

        if($validator = $this->validateRegister($request, $user)) {
            return back()
                ->with('user', $user)
                ->withErrors($validator)
                ->withInput();
        }

        $this->setUserData($request, $user);

        Auth::login($user);

        return redirect(route('home'));
    }
}
