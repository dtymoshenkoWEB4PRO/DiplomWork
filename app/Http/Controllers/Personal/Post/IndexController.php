<?php

namespace App\Http\Controllers\Personal\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;

class IndexController extends BaseController
{
    public function __invoke()
    {

        $posts = Post::whereUserId(auth()->user()->id)->orderByDesc('created_at')->paginate();
       // $posts = Post::all();
        return view('personal.post.index', compact('posts'));

    }
}
