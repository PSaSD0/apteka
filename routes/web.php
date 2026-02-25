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
Route::get('/catalog', action: [App\Http\Controllers\WebController::class, 'catalog'])->name('catalog');
Route::get('/product/{id}', [App\Http\Controllers\WebController::class, 'product'])->name('product');
Route::get('/basket/{id}', [App\Http\Controllers\WebController::class, 'basket'])->name('basket')->middleware('auth');
Route::post('/order', [App\Http\Controllers\WebController::class, 'order'])->name('order')->middleware('auth');
Route::get('/profile', [App\Http\Controllers\WebController::class, 'profile'])->name('profile')->middleware('auth');
Route::get('/admin', [App\Http\Controllers\WebController::class, 'admin'])->name('admin')->middleware('auth')->middleware('check.admin');

Route::get('/editProductView/{id}', [App\Http\Controllers\WebController::class, 'editProductView'])->name('editProductView')->middleware('auth')->middleware('check.admin');
Route::post('/editProduct/{id}', [App\Http\Controllers\WebController::class, 'editProduct'])->name('editProduct')->middleware('auth')->middleware('check.admin');

Route::post('/addCategory', [App\Http\Controllers\WebController::class, 'addCategory'])->name('addCategory')->middleware('auth')->middleware('check.admin');
Route::delete('/dellCategory', [App\Http\Controllers\WebController::class, 'dellCategory'])->name('dellCategory')->middleware('auth')->middleware('check.admin');

Route::post('/addProduct', [App\Http\Controllers\WebController::class, 'addProduct'])->name('addProduct')->middleware('auth')->middleware('check.admin');
Route::delete('/dellProduct', [App\Http\Controllers\WebController::class, 'dellProduct'])->name('dellProduct')->middleware('auth')->middleware('check.admin');


Route::post('/addArticles', [App\Http\Controllers\WebController::class, 'addArticles'])->name('addArticles')->middleware('auth')->middleware('check.admin');
Route::delete('/dellArticles', [App\Http\Controllers\WebController::class, 'dellArticles'])->name('dellArticles')->middleware('auth')->middleware('check.admin');
