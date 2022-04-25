<?php

namespace App\Http\Controllers\Services;

use App\Models\Employee;
use App\Models\Manager;
use App\Models\User;
use Illuminate\Http\Request;

trait UpdatingService {
    public static function update(Request $request, $id, $model) {
        static::updateUser($request, $id);

        $model::where('user_id', $id)->update([
            'national_id' => $request->national_id
        ]);
    }

    public static function updateUser(Request $request, $id) {
        return User::where('id', $id)->update([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
        ]);
    }
}
