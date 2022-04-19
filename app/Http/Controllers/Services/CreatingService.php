<?php

namespace App\Http\Controllers\Services;

use App\Models\Manager;
use App\Models\User;
use Illuminate\Http\Request;

trait CreatingService {
    protected function createManager(Request $request, $user = NULL) {
        if(!$user)
            $user = User::create([
                'email' => $request->email
            ]);

        $manager = new Manager();
        $manager->user_id = $user->id;
        $manager->save();

        return [
            'user' => $user,
            'manager' => $manager
        ];
    }
}
