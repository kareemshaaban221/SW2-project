<?php

namespace App\Http\Middleware;

use App\Models\Employee;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class RegisterCompleted
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // if(!$this->isCompletedRegistration()) {
        //     return redirect()->route('register/step2');
        // }
        return $next($request);
    }

    protected function isCompletedRegistration() {
        if(Auth::user()->role == 'manager') return true;

        return ( Auth::user()->employee->doctor || Auth::user()->employee->receptionist || Auth::user()->employee->accountant );
    }
}
