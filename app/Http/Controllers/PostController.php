<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Post::join('users', 'users.id', '=', 'posts.user_id')
            ->select('posts.*', 'users.name')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'post' => 'required|string|max:125'
        ]);

        Post::create([
            'post' => $request->post,
            'user_id' => $request->user()->id
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Post::join('users', 'users.id', '=', 'posts.user_id')
        ->select('posts.*', 'users.name')
        ->where('posts.id', $id)
        ->get();
    }

    public function destroy(string $id)
    {
        return Post::where('id', $id)->delete();
    }
}
