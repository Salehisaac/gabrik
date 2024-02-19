<?php


use Illuminate\Support\Facades\Route;
use Modules\Category\App\Http\Controllers\CategoryController;

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

Route::prefix('admin-category')->group(function () {
    Route::get('/' , [CategoryController::class , 'index'])->name('admin.content.category.index');
    Route::get('/create' , 'CategoryController@create')->name('admin.content.category.create');
    Route::post('/store' , 'CategoryController@store')->name('admin.content.category.store');
    Route::get('/edit/{category}' , 'CategoryController@edit')->name('admin.content.category.edit');
    Route::put('/update/{category}' , 'CategoryController@update')->name('admin.content.category.update');
    Route::delete('/destroy/{category}' , 'CategoryController@destroy')->name('admin.content.category.destroy');
    Route::get('/status/{category}' , 'CategoryController@status')->name('admin.content.category.status');
});
