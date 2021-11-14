<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\FavoriteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SettingController;

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
Route::get('/', HomeController::class)->name('Home');

Route::get('about', [AboutController::class,'index']);

Route::get('favorite', [FavoriteController::class,'index']);

Route::get('login', [LoginController::class,'index']);

Route::get('register', [RegisterController::class,'index']);

Route::get('search', [SearchController::class,'index']);

Route::get('setting', [SettingController::class,'index']);

