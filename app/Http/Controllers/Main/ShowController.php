<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Post $post)
    {

        $data = Carbon::parse($post->created_at);
        $relatedPosts = Post::where('category_id', $post->category_id)
            ->where('id','!=', $post->id)
            ->get()
            ->take(3);

        return view('main.show', compact('post', 'data', 'relatedPosts'));
    }
}
