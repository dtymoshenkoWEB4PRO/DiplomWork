<?php


namespace App\Service;


use App\Models\Post;
use Illuminate\Support\Facades\DB;

class PostService
{
    public function store($data)
    {

        try {
            Db::beginTransaction();
            Post::create($data);
            Db::commit();
        } catch (\Exception $exception) {
            Db::rollBack();
            abort(500);
        }
    }

    public function update($data, $post)
    {
        try {
            Db::beginTransaction();
            $post->update($data);
            Db::commit();
        } catch (\Exception $exception) {
            Db::rollBack();
            abort(500);
        }

    }
}
