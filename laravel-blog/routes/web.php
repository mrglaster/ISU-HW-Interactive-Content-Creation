<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;


Auth::routes();
Route::middleware('auth')->group(function () {
    Route::get('/posts/create', [PostController::class, 'createForm'])->name('posts.createForm');
    Route::post('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
    Route::post('/posts/{post}/comment', [CommentController::class, 'store'])->name('comments.store');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/user/{user}', [UserController::class, 'show'])->name('user.show');
    Route::get('/user/{user}/get-posts', [UserController::class, 'getPosts'])->name('user.getPosts');
    Route::get('/user/{user}/get-comments', [UserController::class, 'getComments'])->name('user.getComments');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
    Route::get('/dbcheck', function () {
        return view('testdb');
    });

});

Route::middleware(['auth', 'isadmin'])->group(function () {
    Route::get('/admin/comments', [AdminController::class, 'comments'])->name('admin.comments');
    Route::post('/admin/comments/{comment}/approve', [AdminController::class, 'approveComment'])->name('admin.approveComment');
    Route::post('/admin/comments/{comment}/reject', [AdminController::class, 'rejectComment'])->name('admin.rejectComment');
});




Route::get('/', function () {
    if (auth()->check()) {
        return redirect('/home');
    }
    return view('welcome');
});

