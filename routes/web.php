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


Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function () {

    Route::post('inputInfo', [App\Http\Controllers\AuthController::class, 'inputInfo'])->name('inputInfo');
    Route::post('loginUmum', [App\Http\Controllers\AuthController::class, 'loginUmum'])->name('loginUmum');
    Route::post('login', [App\Http\Controllers\AuthController::class, 'login'])->name('login');
    Route::post('refresh', [App\Http\Controllers\AuthController::class, 'refresh']);
    Route::get('me', [App\Http\Controllers\AuthController::class, 'me']);

});

Route::group(['middleware' => ['auth']], function() {
    /**
    * Logout Route
    */
    Route::post('logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
 });

Route::get('/toep', [App\Http\Controllers\TestController::class, 'toep'])->name('toep');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('dashboard');
Route::get('/admin/toep', [App\Http\Controllers\AdminController::class, 'toep'])->name('admin.toep');
Route::post('/admin/toep/store', [App\Http\Controllers\AdminController::class, 'buatJadwalToep'])->name('buat.jadwal.toep');
Route::get('/datadiri', [App\Http\Controllers\UserController::class, 'datadiri'])->name('datadiri');
Route::get('/profile', [App\Http\Controllers\UserController::class, 'index'])->name('profile');
Route::get('/register', [App\Http\Controllers\HomeController::class, 'register'])->name('register');
Route::post('/registerstore', [App\Http\Controllers\AuthController::class, '_register'])->name('_register');
