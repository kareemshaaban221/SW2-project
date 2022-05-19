<?php

namespace App\Http\Controllers\Services;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

trait ValidationService {
    protected function updateValidation(Request $request) {
        $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'national_id' => 'required|digits:14',
            'password' => 'required|confirmed|string|max:255|min:8',
            'phone' => 'required|digits:11|starts_with:011,010,015,012'
        ]);
    }

    protected function emailValidation(Request $request) {
        $request->validate([
            'email' => 'required|string|max:255|email'
        ]);
    }

    protected function employeeCreateValidation(Request $request) {
        $request->validate([
            'email' => 'required|string|max:255|email',
            'manager_id' => 'required|integer|exists:managers,id'
        ]);
    }

    protected function patientCreateValidation(Request $request) {
        $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|email|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|digits:11|starts_with:011,010,015,012',
            'clinic' => 'required|exists:clinics,id',
        ]);
    }

    protected function patientUpdateValidation(Request $request) {
        $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|digits:11|starts_with:011,010,015,012',
            'clinic' => 'required|exists:clinics,id',
        ]);
    }

    protected function validateRegister(Request $request, User $user) {
        $validator = Validator::make($request->all(), [
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'username' => 'required|string|max:255|min:6|alpha_num|unique:users,username',
            'address' => 'required|string|max:255',
            'phone' => 'required|digits:11|starts_with:011,010,015,012',
            'national_id' => 'required|digits:14',
            'password' => 'required|confirmed|string|max:255|min:8',
        ]);

        if($validator->fails()) {
            return $validator;
        }

        return NULL;
    }

    protected function reportCreateValidation(Request $request) {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'status' => 'required|in:Healthy,Good,Need diagnosis,Late state',
            'report' => 'required|string'
        ]);
    }

    protected function salaryChangeValidation(Request $request) {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'salary' => 'required|numeric|max:50000|min:1000'
        ]);
    }
}
