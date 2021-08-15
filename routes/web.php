<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

Auth::routes();


//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); commented because we need blog controller
Route::get('/home', [App\Http\Controllers\BlogController::class, 'index'])->name('home');

Route::get('/admin', [App\Http\Controllers\BlogController::class, 'index'])->name('admin')->middleware('is_admin');
//Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

Route::get('blog/create', [App\Http\Controllers\BlogController::class, 'create']);
Route::post('store', [App\Http\Controllers\BlogController::class, 'store']);
Route::get('blog/{blog}/edit', [App\Http\Controllers\BlogController::class, 'edit']);
Route::put('blog/{blog}', [App\Http\Controllers\BlogController::class, 'update']);
Route::delete('blog/{blog}', [App\Http\Controllers\BlogController::class, 'destroy']);
