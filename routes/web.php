<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminController;

Route::get('/', [PostController::class, 'publicIndex'])->name('home');

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::resource('posts', App\Http\Controllers\PostController::class)->except(['show']);
    Route::resource('categories', CategoryController::class)->except(['show']);
    Route::get('admin/users', [AdminController::class,'users'])->name('admin.users')->middleware('can:isAdmin');
    Route::get('admin/posts', [AdminController::class,'posts'])->name('admin.posts')->middleware('can:isAdmin');
    Route::resource('tags', App\Http\Controllers\TagController::class)->except(['show']);
});
