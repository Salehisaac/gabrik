<?php

use Illuminate\Support\Facades\Route;
use Modules\Menue\App\Http\Controllers\MenueController;

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

//menu
Route::prefix('admin-menu')->group(function () {
    Route::get('/', [MenueController::class, 'index'])->name('admin.content.menu.index');
    Route::get('/create', [MenueController::class, 'create'])->name('admin.content.menu.create');
    Route::post('/store', [MenueController::class, 'store'])->name('admin.content.menu.store');
    Route::get('/edit/{menu}', [MenueController::class, 'edit'])->name('admin.content.menu.edit');
    Route::put('/update/{menu}', [MenueController::class, 'update'])->name('admin.content.menu.update');
    Route::delete('/destroy/{menu}', [MenueController::class, 'destroy'])->name('admin.content.menu.destroy');
    Route::get('/status/{menu}', [MenueController::class, 'status'])->name('admin.content.menu.status');
});
