<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Admin\DashboardController;

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

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

//posts
Route::get('post/show/{id}', [PostController::class, 'show'])->name('post.show');

Route::group(['middleware'=>'auth'],function(){
    Route::post('post/store', [PostController::class, 'store'])->name('post.store');
    Route::get('post/edit/{id}', [PostController::class, 'edit'])->name('post.edit');
    Route::post('post/update/{id}', [PostController::class, 'update'])->name('post.update');
    Route::get('home/allPosts', [HomeController::class, 'allPosts'])->name('home.all');
    Route::get('post/delete/{id}', [PostController::class, 'delete'])->name('post.delete');
    // Route::get('post/show/{id}', [PostController::class, 'show'])->name('post.show');
    Route::Post('post/show/{id}/comment', [CommentController::class, 'store'])->name('post.comment');
});


//admin
Route::group(['middleware'=>['admin']], function(){
Route::get('admin/dashboard', [DashboardController::class, 'index'])->middleware('admin')->name('admin.dashboard');
});
