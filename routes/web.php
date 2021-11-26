<?php

use App\Http\Controllers\aboutController;
use App\Http\Controllers\favoriteController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\searchController;
use App\Http\Controllers\settingController;
use GuzzleHttp\Middleware;
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

Route::get('/', homeController::class)->name('home');

Route::get('/about', [aboutController::class,'index'])->name('about');

Route::get('/favorite', [favoriteController::class,'index'])->Middleware('auth')->name('favorite');

Route::get('/settings', [settingController::class,'index'])->Middleware('auth')->name('settings');
Route::post('/settings', [settingController::class,'store'])->name('settings.store');

Route::get('/login',[loginController::class,'index'])->middleware('guest')->name('login');
Route::post('/login',[loginController::class,'store'])->name('login.store');

Route::get('/register',[registerController::class,'index'])->middleware('guest')->name('register');
Route::post('/register',[registerController::class,'store'])->name('register.store');

Route::get('/logout', [loginController::class, 'destroy'])->middleware('auth')->name('login.destroy');

Route::post('/search',[searchController::class,'index'])->name('search');

