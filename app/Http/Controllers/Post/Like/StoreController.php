<?php

namespace App\Http\Controllers\Post\Like;

use App\Http\Controllers\Controller;
use App\Mail\User\PasswordMail;
use App\Mail\User\PostsMail;
use App\Models\Post;
use App\Models\PostUserLike;
use Illuminate\Support\Facades\Mail;


class StoreController extends Controller
{
    public function __invoke(Post $post)
    {
        auth()->user()->likedPosts()->toggle($post->id);
        $email = $post->user->email;
        $allVotes = count($post->likedUsers)+count($post->likedUsersAnonim);

        if( $allVotes === $post->votes)
        {
            Mail::to($email)->send(new PostsMail($allVotes));
        }

        return redirect()->route('post.show', $post->id);
    }
}
