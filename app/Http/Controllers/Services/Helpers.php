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

    protected function setRole($user, $role) {
        if(!$user) return false;

        $user->role = $role;
        $user->save();
        return true;
    }

    protected function deleteEmployee($emp) {
        $emp->delete(); // first table doctors, managers, recep...

        $emp = $emp->employee;
        $user = $emp->user;

        $emp->delete();

        $emp->user->role = NULL;
        $user->save();
    }

    protected function deletePatient($user) {
        $user->patient->delete();

        $user->role = NULL;

        $user->save();
    }
}
