<?php

namespace App\Http\Controllers\Services;

use App\Models\Employee;
use App\Models\Manager;
use App\Models\User;

Trait Helpers {
    protected function userExists($email) {
        return User::where('email', $email)->first();
    }

    protected function managerExists($user_id) {
        return Manager::where('user_id', $user_id)->first();
    }

    protected function doctorExists($user_id) {
        return Employee::where('user_id', $user_id)->first()->doctor;
    }

    protected function hasRole($user_id) {
        return User::find($user_id)->role;
    }
}
