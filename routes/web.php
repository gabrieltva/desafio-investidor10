<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;
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

Route::controller(NewsController::class)->name('news.')->group(function () {
  Route::get('/', 'index')->name('index');

  Route::prefix('/news')->group(function () {
    Route::get('/search', 'search')->name('search');
    Route::get('/show/{news:slug}', 'show')->name('show');
  });
});
Route::resource('news', NewsController::class)->only(['create', 'store']);

Route::resource('category', CategoryController::class)->only(['create', 'store']);