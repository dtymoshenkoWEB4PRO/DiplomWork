<?php

namespace App\Http\Controllers\Personal\Main;

use App\Http\Controllers\Controller;
use App\Models\Post;

class IndexController extends Controller
{
    public function __invoke()
    {
        $data = [];
        $data['posts'] = Post::whereUserId(auth()->user()->id)->count();
        $data['likesCount'] = auth()->user()->likedPosts->count();
        $data['likesCountAnonim'] = auth()->user()->likedPostsAnonim->count();
        return view('personal.main.index', compact('data'));

    }
}
