<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        return Inertia::render('Home', [
            'posts' => Post::whereNotNull('published_at')->with('author')->limit(10)->get(),
            'page_title' => env('APP_NAME', 'Laravel 10'),
        ]);
    }
}
