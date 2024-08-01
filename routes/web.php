<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;

Route::get('/', [ProductController::class, 'index'])->name('index');

Route::get('/blog', function () {
    return view('blog');
});


Route::get('/product/{id}', [ProductController::class, 'show'])->name('show');

Route::get('/dashboard', [ProductController::class, 'indexAdmin'])->name('indexAdmin');
Route::get('/accounts', [UserController::class, 'index'])->name('users');

Route::get('/login', function () {
    return view('admin.login');
});

// Products
Route::get('/addproduct', [ProductController::class, 'create'])->name('create');
Route::post('/addproduct', [ProductController::class, 'store'])->name('store');

Route::get('/editproduct/{id}', [ProductController::class, 'edit'])->name('edit');
Route::post('/editproduct/{id}', [ProductController::class, 'update'])->name('update');

Route::get('/delete/{id}', [ProductController::class, 'destroy'])->name('destroy');

Route::get('/soldout/{id}', [ProductController::class, 'soldOut'])->name('soldOut');

// Posts
Route::get('/post', function () {
    return view('blogs.blogdetail');
});
Route::get('/blog/{id}', [PostController::class, 'show'])->name('show');
Route::get('/blogs', [PostController::class, 'indexAdmin'])->name('indexAdmin');
Route::get('/addblog', [PostController::class, 'create'])->name('create');
Route::get('/editblog/{id}', [PostController::class, 'showEdit'])->name('showEdit');
Route::post('/addblog', [PostController::class, 'store'])->name('store');
Route::post('/editblog/{id}', [PostController::class, 'update'])->name('update');
Route::get('/deleteblog/{id}', [PostController::class, 'destroy'])->name('destroy');