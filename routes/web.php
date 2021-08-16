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
Route::get('/', [App\Http\Controllers\HomeController::class, 'allblogs'])->name('blogs');

//Route::get('/viewblog', [App\Http\Controllers\HomeController::class, 'viewblog'])->name('viewblog');
Route::get('blog/{blog}/viewblog', [App\Http\Controllers\HomeController::class, 'viewblog'])->name('viewblog');
Route::post('storecomment', [App\Http\Controllers\HomeController::class, 'storecomment']);

/*Route::get('/', function () {
    return view('welcome');
	//Route::get('/','HomeController@index');
	//Route::get('/', [App\Http\Controllers\HomeController::class, 'allblogs'])->name('blogs');
	

});*/

Auth::routes();


//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); commented because we need blog controller
Route::get('/home', [App\Http\Controllers\BlogController::class, 'index'])->name('home')->middleware('auth');

Route::get('/admin', [App\Http\Controllers\BlogController::class, 'index'])->name('admin')->middleware('is_admin');
//Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

Route::get('blog/create', [App\Http\Controllers\BlogController::class, 'create'])->middleware('auth');
Route::post('store', [App\Http\Controllers\BlogController::class, 'store'])->middleware('auth');
Route::get('blog/{blog}/edit', [App\Http\Controllers\BlogController::class, 'edit'])->middleware('auth');
Route::put('blog/{blog}', [App\Http\Controllers\BlogController::class, 'update'])->middleware('auth');
Route::delete('blog/{blog}', [App\Http\Controllers\BlogController::class, 'destroy'])->middleware('auth');

Route::get('blog/{blog}/viewcomments', [App\Http\Controllers\BlogController::class, 'viewcomments'])->middleware('auth');
