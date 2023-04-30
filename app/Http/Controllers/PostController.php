<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User::join('posts', 'users.id', '=', 'posts.user_id')
            ->select('posts.*', 'users.name')
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
        return User::join('posts', 'users.id', '=', 'posts.user_id')
            ->select('posts.*', 'users.name')
            ->where('posts.id', $id)
            ->get();
    }
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return Post::where('id', $id)->delete();
    }
}
