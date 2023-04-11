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

    Route::post('logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
    Route::post('inputInfo', [App\Http\Controllers\AuthController::class, 'inputInfo'])->name('inputInfo');
    Route::post('loginUmum', [App\Http\Controllers\AuthController::class, 'loginUmum'])->name('loginUmum');
    Route::post('login', [App\Http\Controllers\AuthController::class, 'login'])->name('login');
    Route::post('refresh', [App\Http\Controllers\AuthController::class, 'refresh']);
    Route::get('me', [App\Http\Controllers\AuthController::class, 'me']);

});

Route::middleware(['isLogin'])->group(function(){
    Route::get('/profile', [App\Http\Controllers\UserController::class, 'index'])->name('profile');
    Route::post('upload_user_identity', [App\Http\Controllers\UserController::class, 'upload_user_identity'])->name('uploadktp');
});


Route::get('/toep', [App\Http\Controllers\TestController::class, 'toep'])->name('toep');
Route::get('/toefl', [App\Http\Controllers\TestController::class, 'toefl'])->name('toefl');
Route::get('/jlpt', [App\Http\Controllers\TestController::class, 'jlpt'])->name('jlpt');
Route::get('/ubipa', [App\Http\Controllers\TestController::class, 'ubipa'])->name('ubipa');
Route::get('/ielts', [App\Http\Controllers\TestController::class, 'ielts'])->name('ielts');
Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('dashboard');
Route::get('/admin/toep', [App\Http\Controllers\AdminController::class, 'toep'])->name('admin.toep');
Route::post('/admin/toep/store', [App\Http\Controllers\AdminController::class, 'buatJadwalToep'])->name('buat.jadwal.toep');
// Route::get('/profile', [App\Http\Controllers\UserController::class, 'index'])->name('profile');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/datadiri', [App\Http\Controllers\UserController::class, 'datadiri'])->name('datadiri');
Route::get('/register', [App\Http\Controllers\HomeController::class, 'register'])->name('register');
Route::post('/registerstore', [App\Http\Controllers\AuthController::class, '_register'])->name('_register');
Route::post('/registration', [App\Http\Controllers\RegistrationController::class, 'create'])->name('pendaftaran');
