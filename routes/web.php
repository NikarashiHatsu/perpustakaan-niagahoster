<?php

use Illuminate\Support\Facades\Route;

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

Route::redirect('/', 'login')->name('index');

Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.', 'middleware' => 'auth'], function() {
    Route::view('/', 'dashboard.index')->name('index');
    Route::resources([
        'publisher' => \App\Http\Controllers\PublisherController::class,
        'book' => \App\Http\Controllers\BookController::class,
        'category' => \App\Http\Controllers\CategoryController::class,
    ], [
        'except' => ['show']
    ]);
});

require __DIR__.'/auth.php';
