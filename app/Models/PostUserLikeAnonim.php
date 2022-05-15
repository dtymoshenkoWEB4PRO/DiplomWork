<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostUserLikeAnonim extends Model
{
    use HasFactory;
    protected $table = 'post_user_like_anonims';
    protected $guarded = 'false';
}
