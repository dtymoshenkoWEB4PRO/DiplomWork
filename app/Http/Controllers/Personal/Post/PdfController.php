<?php

namespace App\Http\Controllers\Personal\Post;

use App\Models\Post;

use Barryvdh\DomPDF\Facade\Pdf;
class PdfController extends BaseController
{
    public function __invoke(Post $post)
    {
        $users = $post->likedUsers;
       // $anonimUsers = $post->likedUsersAnonim;

        $pdf = PDF::loadView('personal.post.index-pdf', compact('users', 'post'));
        return $pdf->download('customer-list.pdf');
    }
}
