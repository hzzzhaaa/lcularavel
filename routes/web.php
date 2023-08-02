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
    Route::get('/schedule', [App\Http\Controllers\UserController::class, 'schedule'])->name('schedule');
    Route::post('upload_user_identity', [App\Http\Controllers\UserController::class, 'upload_user_identity'])->name('uploadktp');
    Route::post('/uploadbukti/{id}', [App\Http\Controllers\RegistrationController::class, 'uploadbukti'])->name('uploadbukti');
    Route::get('/pilihjadwal/{id}/{schedule_id}', [App\Http\Controllers\RegistrationController::class, 'pilihjadwal'])->name('pilihjadwal');
    Route::get('/toep', [App\Http\Controllers\TestController::class, 'toep'])->name('toep');
    Route::post('/toepReguler/{userid}', [App\Http\Controllers\TestController::class, 'daftarToep'])->name('daftarToep');
    Route::get('/toefl', [App\Http\Controllers\TestController::class, 'toefl'])->name('toefl');
    Route::get('/jlpt', [App\Http\Controllers\TestController::class, 'jlpt'])->name('jlpt');
    Route::get('/ubipa', [App\Http\Controllers\TestController::class, 'ubipa'])->name('ubipa');
    Route::get('/ielts', [App\Http\Controllers\TestController::class, 'ielts'])->name('ielts');
});

Route::middleware(['isLoginAdmin'])->group(function(){
    Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('dashboard');
    Route::get('/admin/paymentmethod', [App\Http\Controllers\AdminController::class, 'paymentMethod'])->name('admin.paymentmethod');
    Route::post('/admin/_paymentmethod', [App\Http\Controllers\AdminController::class, '_paymentMethod'])->name('admin._paymentmethod');
    Route::get('/admin/toep', [App\Http\Controllers\AdminController::class, 'toep'])->name('admin.toep');
    Route::get('/toep/{id}', [App\Http\Controllers\AdminController::class, 'listPesertaToep'])->name('list.peserta.toep');
    Route::get('/admin/verifbayartoep', [App\Http\Controllers\AdminController::class, 'verifbayartoep'])->name('admin.verifbayartoep');
    Route::get('/admin/verifbayartoep/{id}', [App\Http\Controllers\AdminController::class, 'verifbuktitoep'])->name('admin.verifbuktitoep');
    Route::get('/admin/toep/verifbayar1', [App\Http\Controllers\AdminController::class, 'verifbayartoep'])->name('verif.bayar.toep');
    Route::get('/admin/verifktp', [App\Http\Controllers\AdminController::class, 'verifktp'])->name('verif.ktp');
    Route::get('/admin/verifktp/{id}', [App\Http\Controllers\AdminController::class, '_verifktp'])->name('admin.update.ktp');
    Route::post('/admin/toep/store', [App\Http\Controllers\AdminController::class, 'buatJadwalToep'])->name('buat.jadwal.toep');
    Route::get('/export/{id}', [App\Http\Controllers\AdminController::class, 'exportexcel'])->name('export.excel');
    Route::post('/import/{id}', [App\Http\Controllers\AdminController::class, 'importExcel'])->name('importExcel');
    Route::post('/generateCertificate', [App\Http\Controllers\AdminController::class, 'generateCertificate'])->name('generateCertificate');
    Route::get('/sertifikat_pdf/{id}/{registration_number}', [App\Http\Controllers\AdminController::class, 'sertifikat'])->name('sertifikat');

});


Route::get('/loginadmin', [App\Http\Controllers\AdminController::class, 'loginadmin'])->name('loginadmin');
Route::POST('/_loginadmin', [App\Http\Controllers\AdminController::class, '_loginadmin'])->name('_loginadmin');
Route::POST('/logoutadmin', [App\Http\Controllers\AdminController::class, 'logoutadmin'])->name('logoutadmin');
Route::get('/toep', [App\Http\Controllers\TestController::class, 'toep'])->name('toep');
Route::post('/toepReguler/{userid}', [App\Http\Controllers\TestController::class, 'daftarToep'])->name('toepReguler');
Route::get('/toefl', [App\Http\Controllers\TestController::class, 'toefl'])->name('toefl');
Route::get('/jlpt', [App\Http\Controllers\TestController::class, 'jlpt'])->name('jlpt');
Route::get('/ubipa', [App\Http\Controllers\TestController::class, 'ubipa'])->name('ubipa');
Route::get('/ielts', [App\Http\Controllers\TestController::class, 'ielts'])->name('ielts');

// Route::get('/profile', [App\Http\Controllers\UserController::class, 'index'])->name('profile');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/datadiri', [App\Http\Controllers\UserController::class, 'datadiri'])->name('datadiri');
Route::get('/register', [App\Http\Controllers\HomeController::class, 'register'])->name('register');
Route::post('/registerstore', [App\Http\Controllers\AuthController::class, '_register'])->name('_register');
Route::post('/registration', [App\Http\Controllers\RegistrationController::class, 'create'])->name('pendaftaran');
