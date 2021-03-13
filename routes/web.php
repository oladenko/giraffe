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

Route::get('/',\App\Http\Controllers\HomeController::class)->name('home');
//Route::post('/management/posts/create',[\App\Http\Controllers\post\PostController::class,'store'])->name('post-management.store');
//Route::get('/management/posts/create',[\App\Http\Controllers\post\PostController::class, 'create'])->name('post-management.create');
//Route::post('/management/posts/{post}/edit',[\App\Http\Controllers\post\PostController::class,'update'])->name('post-management.update');
//Route::get('/management/posts/{post}/edit',[\App\Http\Controllers\post\PostController::class, 'edit'])->name('post-management.edit');
//Route::get('/management/posts/{post}/delete',[\App\Http\Controllers\post\PostController::class, 'delete'])->name('post-management.delete');
Route::middleware('guest')->group(function (){
    Route::get('/auth/login',[\App\Http\Controllers\AuthController::class,'login'])->name('login');
    Route::post('/auth/login',[\App\Http\Controllers\AuthController::class,'handleLogin'])->name('auth.handle-login');
    Route::get('/user/create',[\App\Http\Controllers\UserController::class,'create'])->name('user-create');
    Route::post('/user/create',[\App\Http\Controllers\UserController::class,'store'])->name('user-store');
});
Route::middleware('auth')->group(function (){
Route::get('/edit',[\App\Http\Controllers\post\PostController::class,'create'])->name('post-management.create');
Route::post('/edit',[\App\Http\Controllers\post\PostController::class,'store'])->name('post-management.store');
Route::get('/edit/{post}',[\App\Http\Controllers\post\PostController::class,'edit'])->name('post-management.edit');
Route::post('/edit/{post}',[\App\Http\Controllers\post\PostController::class,'update'])->name('post-management.update');

Route::get('/delete/{post}',[\App\Http\Controllers\post\PostController::class,'delete'])->name('post-management.delete');
    Route::get('/logout',[\App\Http\Controllers\AuthController::class,'logout'])->name('auth.logout');
});
