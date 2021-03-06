<?php

namespace App\Models;

use App\Notifications\SendVerifyWuthQueueNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    const ROLE_ADMIN = 0;
    const ROLE_PERSONAL = 1;
    const ROLE_MAIN_ADMIN = 2;

    public static function getRoles()
    {

        return [
            self::ROLE_ADMIN => 'Admin',
            self::ROLE_PERSONAL => 'Personal',
            self::ROLE_MAIN_ADMIN => 'MainAdmin'
        ];
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sendEmailVerificationNotification()
    {
        $this->notify(new SendVerifyWuthQueueNotification());
    }

    public function post()
    {
        return $this->belongsTo(Post::class, 'user_id', 'id');
    }

    public function likedPosts()
    {
        return $this->belongsToMany(Post::class, 'post_user_likes', 'user_id','post_id');
    }

    public function likedPostsAnonim()
    {
        return $this->belongsToMany(Post::class, 'post_user_like_anonims', 'user_id', 'post_id');
    }

}
