<?php

namespace App\Http\Controllers\Personal\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
class ShowController extends BaseController
{
    public function __invoke(Post $post)
    {
        $users = $post->likedUsers;
        $anonimUsers = $post->likedUsersAnonim;

        return view('personal.post.show', compact('post', 'users', 'anonimUsers'));
    }
}
