<?php

namespace App\Http\Controllers\MainAdmin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __invoke()
    {
        $roles = User::getRoles();
        return view('mainadmin.user.create', compact('roles'));

    }
}
