<?php

namespace App\Http\Controllers\Services;

use Illuminate\Http\Request;

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
}
