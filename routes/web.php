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

Route::get('logout', array('uses' => 'LoginController@logout'));

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/category', [App\Http\Controllers\CategoryController::class, 'category'])->name('category');
Route::post('/category', [App\Http\Controllers\CategoryController::class, 'category'])->name('category');
Route::get('/category-add', [App\Http\Controllers\CategoryController::class, 'category_add'])->name('category-add');
Route::post('/add', [App\Http\Controllers\CategoryController::class, 'add'])->name('add');
Route::get('/threads/{id}', [App\Http\Controllers\ThreadController::class, 'index'])->name('threads');
Route::post('/threads', [App\Http\Controllers\ThreadController::class,'create']);
Route::get('/mypage/{id}', [App\Http\Controllers\UsersController::class, 'mypage'])->name('mypage');

Route::get('/edit', [App\Http\Controllers\UsersController::class, 'edit'])->name('edit');
Route::post('/edit', [App\Http\Controllers\UsersController::class, 'koushin'])->name('koushin');

Route::post('posts/{comment}/likes', [App\Http\Controllers\LikeController::class, 'store'])->name('likes');
Route::post('posts/{comment}/unlikes', [App\Http\Controllers\LikeController::class, 'destroy'])->name('unlikes');
