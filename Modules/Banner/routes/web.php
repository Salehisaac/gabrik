<?php



use Illuminate\Support\Facades\Route;
use Modules\Banner\App\Http\Controllers\BannerController;


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



Route::prefix('admin-banner')->group(function () {
    Route::get('/', [BannerController::class, 'index'])->name('admin.content.banner.index');
    Route::get('/create', [BannerController::class, 'create'])->name('admin.content.banner.create');
    Route::post('/store', [BannerController::class, 'store'])->name('admin.content.banner.store');
    Route::get('/edit/{banner}', [BannerController::class, 'edit'])->name('admin.content.banner.edit');
    Route::put('/update/{banner}', [BannerController::class, 'update'])->name('admin.content.banner.update');
    Route::delete('/destroy/{banner}', [BannerController::class, 'destroy'])->name('admin.content.banner.destroy');
    Route::get('/status/{banner}', [BannerController::class, 'status'])->name('admin.content.banner.status');
});
