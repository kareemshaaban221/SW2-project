<?php

namespace App\Http\Controllers\Services;

use App\Models\Manager;
use App\Models\User;

Trait Helpers {
    protected function userExists($email) {
        return User::where('email', $email)->first();
    }

    protected function managerExists($user_id) {
        return Manager::where('user_id', $user_id)->first();
    }
}
