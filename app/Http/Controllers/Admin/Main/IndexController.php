<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $data = [];
        $data['usersCount'] = User::whereRole(1)->count();
        $data['postsCount'] = Post::all()->count();
        $data['categoriesCount'] = Category::all()->count();
        return view('admin.main.index', compact('data'));

    }
}
