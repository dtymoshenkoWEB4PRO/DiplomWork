<?php

namespace App\Http\Controllers\Post\LikeAnonim;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostUserLike;


class StoreController extends Controller
{
    public function __invoke(Post $post)
    {
        auth()->user()->likedPostsAnonim()->toggle($post->id);
        return redirect()->route('post.show', $post->id);
    }
}
