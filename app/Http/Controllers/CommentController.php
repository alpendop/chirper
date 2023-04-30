<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'comment' => 'required|string|max:255'
        ]);

        Comment::create([
            'comment' => $request->comment,
            'post_id' => $request->post_id,
            'user_id' => $request->user()->id,
        ]);
    }

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
