<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [\App\Http\Controllers\Controller::class , 'index'])->name('home');

Route::get('/admin', [\App\Http\Controllers\Admin\HomeController::class , 'index'] )->name('admin.home');
Route::get('/video', [\App\Http\Controllers\Admin\VideoController::class , 'index'] )->name('admin.video.index');
Route::get('/gallery', [\App\Http\Controllers\Admin\ImageGalleryController::class , 'index'] )->name('admin.gallery.index');

Route::prefix('post')->group(function () {
    Route::get('/{post}' , [\App\Http\Controllers\PostController::class , 'show'])->name('post.show');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
