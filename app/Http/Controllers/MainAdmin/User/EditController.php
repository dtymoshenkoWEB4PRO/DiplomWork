<?php

namespace App\Http\Controllers\MainAdmin\User;

use App\Http\Controllers\Controller;
use App\Models\User;

class EditController extends Controller
{
    public function __invoke(User $user)
    {
        $roles = User::getRoles();
        return view('mainadmin.user.edit', compact('user', 'roles'));

    }
}
