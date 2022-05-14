<?php

namespace App\Http\Controllers\Personal\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;

class LikedShowController extends BaseController
{
    public function __invoke(Post $post)
    {
        return view('personal.post.likedshow', compact('post'));
    }
}
