<?php

namespace App\Http\Controllers\MainAdmin\User;

use App\Http\Controllers\Controller;
use App\Models\User;

class IndexController extends Controller
{
    public function __invoke()
    {
        $users = User::all();
        return view('mainadmin.user.index', compact('users'));

    }
}
