<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function __invoke(Category $category)
    {

        $posts = Post::whereVisible(1)->paginate(6);
        $likedPosts = Post::withCount('likedUsers')->orderBy('liked_users_count', 'DESC')->get()->take(3);
        return view('post.index', compact('posts','likedPosts','categories'));

    }
}
