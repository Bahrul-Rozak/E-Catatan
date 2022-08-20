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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->group(function () {

    Route::group(['middleware' => 'auth'], function () {

        //dashboard
        Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard.index');

        //tags
        Route::resource('/tag', App\Http\Controllers\Admin\TagController::class, ['except' => 'show', 'as' => 'admin']);

        //categories
        Route::resource('/category', App\Http\Controllers\Admin\CategoryController::class, ['except' => 'show', 'as' => 'admin']);

        //posts
        Route::resource('/post', App\Http\Controllers\Admin\PostController::class, ['except' => 'show', 'as' => 'admin']);

        //event
        Route::resource('/event', App\Http\Controllers\Admin\EventController::class, ['except' => 'show', 'as' => 'admin']);
    });
});