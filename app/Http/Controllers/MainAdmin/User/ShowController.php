<?php

namespace App\Http\Controllers\MainAdmin\User;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;

class ShowController extends Controller
{
    public function __invoke(User $user)
    {
        return view('mainadmin.user.show', compact('user'));
    }
}
