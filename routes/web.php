<?php

use App\Http\Controllers\CategoriesController;
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

Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/post', [App\Http\Controllers\HomeController::class, 'post'])->name('post');

Route::get('/home', function () {
    return view('home');
})->middleware('auth');

Route::get('/admin/categories', [App\Http\Controllers\Admin\CategoriesController::class, 'index'])->name('admin.categories.index');
Route::post('/admin/categories/store', [App\Http\Controllers\Admin\CategoriesController::class, 'store'])->name('admin.categories.store');
Route::post('/admin/categories/{categoryid}/update', [App\Http\Controllers\Admin\CategoriesController::class, 'update'])->name('admin.categories.update');
Route::delete('/admin/categories/{categoryid}/delete', [App\Http\Controllers\Admin\CategoriesController::class, 'delete'])->name('admin.categories.delete');

Route::get('/admin/posts', [App\Http\Controllers\Admin\PostController::class, 'index'])->name('admin.posts.index');
Route::post('/admin/posts/store', [App\Http\Controllers\Admin\PostController::class, 'store'])->name('admin.posts.store');
Route::post('/admin/posts/{postid}/update', [App\Http\Controllers\Admin\PostController::class, 'update'])->name('admin.posts.update');
Route::delete('/admin/posts /{postid}/delete', [App\Http\Controllers\Admin\PostController::class, 'delete'])->name('admin.posts.delete');

Route::get('/admin/users', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.users.index');
Route::post('/admin/users/{userid}/update', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('admin.users.update');
Route::delete('/admin/users/{userid}/delete', [App\Http\Controllers\Admin\UserController::class, 'delete'])->name('admin.users.delete');

//Para el PDF View
Route::get('/pdf/view', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.users.index');
Route::get('/pdf/convert', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.users.index');



Auth::routes();
