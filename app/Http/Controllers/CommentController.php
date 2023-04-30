<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return User::join('comments', 'users.id', '=', 'comments.user_id')
            ->select('comments.*', 'users.name')
            ->where('comments.post_id', $id)
            ->get();
    }
}
