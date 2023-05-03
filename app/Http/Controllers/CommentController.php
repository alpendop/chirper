<?php

namespace App\Http\Controllers;

use App\Models\Comment;
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
        return Comment::join('users', 'users.id', '=', 'comments.user_id')
            ->select('comments.*', 'users.name')
            ->where('comments.post_id', $id)
            ->get();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return Comment::where('id', $id)->delete();
    }
}
