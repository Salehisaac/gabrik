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


Route::group(['prefix' => 'admin', 'middleware' => 'auth'] , function ()
{
    //admin index page
    Route::get('/', [\App\Http\Controllers\Admin\HomeController::class , 'index'] )->name('admin.home');

    //video of the main page
    Route::get('/video', [\App\Http\Controllers\Admin\VideoController::class , 'index'] )->name('admin.video.index');
    Route::get('/video/create', [\App\Http\Controllers\Admin\VideoController::class , 'create'] )->name('admin.video.create');
    Route::post('/video/store', [\App\Http\Controllers\Admin\VideoController::class , 'store'] )->name('admin.video.store');
    Route::get('/video/edit/{video}', [\App\Http\Controllers\Admin\VideoController::class , 'edit'] )->name('admin.video.edit');
    Route::put('/video/update/{video}', [\App\Http\Controllers\Admin\VideoController::class , 'update'] )->name('admin.video.update');
    Route::delete('/video/delete/{video}', [\App\Http\Controllers\Admin\VideoController::class , 'destroy'] )->name('admin.video.destroy');
    Route::get('/video/status/{video}', [\App\Http\Controllers\Admin\VideoController::class , 'status'] )->name('admin.video.status');



    //gallery of the main page
    Route::get('/gallery', [\App\Http\Controllers\Admin\ImageGalleryController::class , 'index'] )->name('admin.gallery.index');
    Route::get('/gallery/create', [\App\Http\Controllers\Admin\ImageGalleryController::class , 'create'] )->name('admin.gallery.create');
    Route::post('/gallery/store', [\App\Http\Controllers\Admin\ImageGalleryController::class , 'store'] )->name('admin.gallery.store');
    Route::get('/gallery/edit/{imageGallery}', [\App\Http\Controllers\Admin\ImageGalleryController::class , 'edit'] )->name('admin.gallery.edit');
    Route::put('/gallery/update/{imageGallery}', [\App\Http\Controllers\Admin\ImageGalleryController::class , 'update'] )->name('admin.gallery.update');
    Route::delete('/gallery/delete/{imageGallery}', [\App\Http\Controllers\Admin\ImageGalleryController::class , 'destroy'] )->name('admin.gallery.destroy');
    Route::get('/gallery/status/{imageGallery}', [\App\Http\Controllers\Admin\ImageGalleryController::class , 'status'] )->name('admin.gallery.status');

    //main Images of the main page
    Route::get('/mainImage', [\App\Http\Controllers\Admin\MainImageController::class , 'index'] )->name('admin.main_image.index');
    Route::get('/mainImage/create', [\App\Http\Controllers\Admin\MainImageController::class , 'create'] )->name('admin.main_image.create');
    Route::post('/mainImage/store', [\App\Http\Controllers\Admin\MainImageController::class , 'store'] )->name('admin.main_image.store');
    Route::get('/mainImage/edit/{mainImage}', [\App\Http\Controllers\Admin\MainImageController::class , 'edit'] )->name('admin.main_image.edit');
    Route::put('/mainImage/update/{mainImage}', [\App\Http\Controllers\Admin\MainImageController::class , 'update'] )->name('admin.main_image.update');
    Route::delete('/mainImage/delete/{mainImage}', [\App\Http\Controllers\Admin\MainImageController::class , 'destroy'] )->name('admin.main_image.destroy');
    Route::get('/mainImage/status/{mainImage}', [\App\Http\Controllers\Admin\MainImageController::class , 'status'] )->name('admin.main_image.status');

});


Route::prefix('post')->group(function () {
    Route::get('/{slug}' , [\App\Http\Controllers\PostController::class , 'show'])->name('post.show');
});

Route::get('/contactUs' , [\App\Http\Controllers\Controller::class , 'contactUs'])->name('contactUs.show');


require __DIR__.'/auth.php';
