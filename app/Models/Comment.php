<?php

namespace App\Models;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment',
        'user_id',
        'post_id'
    ];

    public function post()
    {
        $this->belongsToMany(Post::class);
    }

    public function user()
    {
        $this->belongsToMany(User::class);
    }
}
