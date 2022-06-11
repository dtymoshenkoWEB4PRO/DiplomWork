<?php

namespace App\Http\Controllers\Post\User;

use App\Http\Controllers\Controller;
use App\Models\User;

class UseridentificateController extends Controller
{
    public function __invoke()
    {
        $userId = auth()->user()->id;
        $user = User::find($userId);
        $role = $user->role;
        if ($role === 0) {
            return redirect()->route('admin.main.index');
        } elseif ($role === 1) {
            return redirect()->route('personal.main.index');
        } else {
            return redirect()->route('mainadmin.main.index');
        }
    }
}
