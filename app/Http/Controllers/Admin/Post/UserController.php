<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;

class UserController extends BaseController
{
    public function __invoke(User $user,Post $posts)
    {
        $posts = Post::whereUserId($user->id)->orderByDesc('created_at')->paginate();
        return view('admin.post.user', compact('posts'));
    }
}
