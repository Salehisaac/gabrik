<?php

use Illuminate\Support\Facades\Route;
use Modules\Posts\App\Http\Controllers\PostsController;

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

Route::group([], function () {
    Route::resource('posts', PostsController::class)->names('posts');
    Route::get('post/status/{post}' , [PostsController::class , 'status'])->name('posts.status');
    Route::get('post/commentable/{post}' , [PostsController::class , 'commentable'])->name('posts.commentable');
    Route::get('post/gallery/{post}' , [PostsController::class , 'gallery'])->name('posts.gallery');
    Route::put('post/gallery/{post}' , [PostsController::class , 'updateGallery'])->name('posts.update.gallery');
    Route::delete('post/gallery/{post}' , [PostsController::class , 'deleteGallery'])->name('posts.gallery.delete');


});
