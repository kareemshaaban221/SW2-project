<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Manager;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request) {

        $request->validate([
            'identifier' => 'required',
            'password' => 'required'
        ]);

        $user = User::where(function ($q) use ($request) {
            $q->where('email', $request->identifier)
            ->orWhere('username', $request->identifier);
        })->get();

        $err = 'This user does not exist!';

        if(!$user->isEmpty()) {

            $user = $user->first();

            if($user->password) {
                if( Hash::check($request->password, $user->password) && $user->role ) {

                    Auth::login($user);
                    return redirect()->route('home');
                }

                $err = 'Wrong password, please try again!';
            } else $err = 'Your Register Process Hasn\'t Completed Yet!';
        }

        return back()->with('err', $err)->withInput();

    }

    public function logout() {
        Auth::logout();

        return back();
    }
}
