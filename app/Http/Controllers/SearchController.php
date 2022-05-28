<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;


class SearchController extends Controller
{

    public function __invoke(Request $request)
    {
        // Get the search value from the request
        $likedPosts = Post::withCount('likedUsers')->orderBy('liked_users_count', 'DESC')->get()->take(4);
        $search = $request->input('search');

        // Search in the title and body columns from the posts table
        $posts = Post::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->get();

        $category = Category::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->get();

        return view('search', compact('posts', 'search','likedPosts'));
    }

}
