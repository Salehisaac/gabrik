<?php

use Illuminate\Support\Facades\Route;
use Modules\FAQ\App\Http\Controllers\FAQController;

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

//faq
Route::prefix('admin-faq')->group(function () {
    Route::get('/', [FAQController::class, 'index'])->name('admin.content.faq.index');
    Route::get('/create', [FAQController::class, 'create'])->name('admin.content.faq.create');
    Route::post('/store', [FAQController::class, 'store'])->name('admin.content.faq.store');
    Route::get('/edit/{faq}', [FAQController::class, 'edit'])->name('admin.content.faq.edit');
    Route::put('/update/{faq}', [FAQController::class, 'update'])->name('admin.content.faq.update');
    Route::delete('/destroy/{faq}', [FAQController::class, 'destroy'])->name('admin.content.faq.destroy');
    Route::get('/status/{faq}', [FAQController::class, 'status'])->name('admin.content.faq.status');
});
