<?php

namespace App\Http\Controllers\Services;

use App\Models\Manager;
use App\Models\User;
use Illuminate\Http\Request;

trait UpdatingService {
    protected function updateManager(Request $request, $id) {
        User::where('id', $id)->update([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
        ]);

        Manager::where('user_id', $id)->update([
            'national_id' => $request->national_id
        ]);
    }
}
