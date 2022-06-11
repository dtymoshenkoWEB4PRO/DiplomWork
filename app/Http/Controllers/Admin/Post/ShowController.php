<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;

class ShowController extends BaseController
{
    public function __invoke(Post $post, User $user)
    {
        $users = $post->likedUsers;
        return view('admin.post.show', compact('post','user','users'));
    }
}
