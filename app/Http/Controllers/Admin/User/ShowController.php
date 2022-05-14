<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;

class ShowController extends Controller
{
    public function __invoke(User $user,Post $posts)
    {

        $postscount = Post::whereUserId($user->id)->count();
        return view('admin.user.show', compact('user', 'postscount'));
    }
}
