<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostController extends Controller
{
    public function show(Request $request, Post $post)
    {
        return Inertia::render('Post', ['post' => $post]);
    }
}
