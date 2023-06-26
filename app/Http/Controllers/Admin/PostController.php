<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Requests\CreatePostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostController extends Controller
{
    public function create(CreatePostRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $post = Post::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'author_id' => $validated['author'],
        ]);

        return redirect(route('admin.posts.edit', $post->id));
    }

    public function edit(Request $request, Post $post)
    {
        return Inertia::render('Admin/EditPost', ['post' => $post, 'users' => User::all()]);
    }

    public function index(Request $request)
    {
        $posts = Post::all();

        return Inertia::render('Admin/Posts', ['posts' => $posts]);
    }

    public function new()
    {
        return Inertia::render('Admin/EditPost', ['post' => new Post, 'users' => User::all()]);
    }

    public function update(UpdatePostRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $post = Post::findOrFail($validated['id']);

        $post->update([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'author_id' => $validated['author'],
        ]);

        return back();
    }

    public function delete(Request $request)
    {

    }
}
