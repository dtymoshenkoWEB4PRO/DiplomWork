<?php

namespace App\Http\Controllers\Personal\AnonimLiked;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $posts = auth()->user()->likedPostsAnonim;

        return view('personal.liked.index', compact('posts'));

    }
}