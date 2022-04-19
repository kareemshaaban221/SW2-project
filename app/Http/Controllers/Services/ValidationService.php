<?php

namespace App\Http\Controllers\Services;

use Illuminate\Http\Request;

trait ValidationService {
    protected function managerUpdateValidation(Request $request) {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'national_id' => 'required',
            'password' => 'required|confirmed',
            'phone' => 'required|digits:11|starts_with:011,010,015,012'
        ]);
    }

    protected function managerCreateValidation(Request $request) {
        $request->validate([
            'email' => 'required|string|max:255|email'
        ]);
    }
}
