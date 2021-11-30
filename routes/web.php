<?php

use App\Http\Controllers\aboutController;
use App\Http\Controllers\favoriteController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\password_resetController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\searchController;
use App\Http\Controllers\settingController;
use App\Http\Controllers\passwordController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Mail\RecoveryMailable;
use App\Models\password_reset;
use Illuminate\Support\Facades\Mail;


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
Route::get('/search2',[searchController::class,'index'])->name('search2');

/*Route::get('/recovery', function(){
    Mail::to('chato4010@gmail.com')->send(new RecoveryMailable());
    return "Mensaje enviado";
}); pa las pruebas*/

Route::get('/recovery', [passwordController::class, 'index'])->name('password');
Route::post('/recovery', [passwordController::class, 'request'])->name('password.request');

Route::get('/code', [password_resetController::class, 'index'])->name('code');
Route::post('/code', [password_resetController::class, 'recovery'])->name('code.recovery');