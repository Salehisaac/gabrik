<?php

use Illuminate\Support\Facades\Route;
use Modules\Comment\App\Http\Controllers\CommentController;

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

Route::prefix('admin-comment')->group(function () {
    Route::get('/', [CommentController::class, 'index'])->name('admin.content.comment.index');
    Route::get('/show/{comment}', [CommentController::class, 'show'])->name('admin.content.comment.show');
    Route::delete('/destroy/{comment}', [CommentController::class, 'destroy'])->name('admin.content.comment.destroy');
    Route::get('/approved/{comment}', [CommentController::class, 'approved'])->name('admin.content.comment.approved');
    Route::get('/status/{comment}', [CommentController::class, 'status'])->name('admin.content.comment.status');
    Route::post('/answer/{comment}', [CommentController::class, 'answer'])->name('admin.content.comment.answer');
});
