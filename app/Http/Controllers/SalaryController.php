<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Services\UpdatingService;
use App\Http\Controllers\Services\ValidationService;
use App\Http\Middleware\isAccountant;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    use ValidationService, UpdatingService;

    public function __construct() {
        $this->middleware('isAccountant');
    }

    public function change() {
        return view('components.accountant.change-salary');
    }

    public function store(Request $request) {
        $this->salaryChangeValidation($request);

        $employee = $this->updateSalary($request);

        return redirect(route('salaries.change'))
            ->with('done', ucwords($employee->user->fname) . '\'s salary has been changed successfully');
    }
}
