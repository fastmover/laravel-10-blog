<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::all();

        return Inertia::render('Admin/Posts', ['posts' => $posts]);
    }

    public function edit(Request $request, Post $post)
    {
        return Inertia::render('Admin/EditPost', ['post' => $post]);
    }

    public function update(Request $request)
    {

    }

    public function delete(Request $request)
    {

    }
}
