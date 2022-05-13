<?php

namespace App\Http\Controllers\Personal\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;

class CreateController extends BaseController
{
    public function __invoke()
    {
       // $user = User::whereId(auth()->user()->id);
        $categories = Category::all();
        return view('personal.post.create', compact('categories'));

    }
}
