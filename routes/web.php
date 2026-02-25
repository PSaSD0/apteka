<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\WebController;

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
Route::get('/', action: [App\Http\Controllers\WebController::class, 'home'])->name('index');

Auth::routes();

Route::get('/home', action: [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/articles', action: [App\Http\Controllers\WebController::class, 'articles'])->name('articles');
Route::get('/articles/read/{id}', action: [App\Http\Controllers\WebController::class, 'articlesOne'])->name('articlesOne');
Route::get('/catalog', [App\Http\Controllers\WebController::class, 'catalog'])->name('catalog');
Route::get('/product/{id}', [App\Http\Controllers\WebController::class, 'product'])->name('product');
Route::get('/basket/{id}', action: [App\Http\Controllers\WebController::class, 'basket'])->name('basket');
Route::get('/profile', [App\Http\Controllers\WebController::class, 'profile'])->name('profile')->middleware('auth');
Route::get('/admin', [App\Http\Controllers\WebController::class, 'admin'])->name('admin')->middleware('auth')->middleware('check.admin');

Route::post('/addCategory', [App\Http\Controllers\WebController::class, 'addCategory'])->name('addCategory');
Route::delete('/dellCategory', [App\Http\Controllers\WebController::class, 'dellCategory'])->name('dellCategory');

Route::post('/addProduct', [App\Http\Controllers\WebController::class, 'addProduct'])->name('addProduct');

Route::post('/addArticles', [App\Http\Controllers\WebController::class, 'addArticles'])->name('addArticles');
Route::delete('/dellArticles', [App\Http\Controllers\WebController::class, 'dellArticles'])->name('dellArticles');
