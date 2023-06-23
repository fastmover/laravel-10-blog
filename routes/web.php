<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/admin', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('admin');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/admin/posts', [AdminPostController::class, 'index'])->name('admin.posts');
    Route::get('/admin/posts/{post:slug}', [AdminPostController::class, 'edit'])->name('admin.posts.edit');
    
});

require __DIR__.'/auth.php';

// Catch all other requests as post title's slug
Route::get('/{post:slug}', [PostController::class, 'show'])->name('post');

