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

Route::get('/', function () {
    return view('welcome');
})->name('halaman.utama');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('penjual')->group(function() {
    Route::get('/login', [App\Http\Controllers\Auth\PenjualAuthController::class, 'getLogin'])->name('penjual.login');
    Route::post('/login', [App\Http\Controllers\Auth\PenjualAuthController::class, 'postLogin']);
    Route::get('/logout', [App\Http\Controllers\Auth\PenjualAuthController::class, 'logout'])->name('penjual.logout');
    Route::get('/', [App\Http\Controllers\PenjualController::class, 'index'])->name('penjual.dashboard');
    Route::get('/register', [App\Http\Controllers\Auth\PenjualAuthController::class, 'showFormRegister'])->name('penjual.register');
    Route::post('/register', [App\Http\Controllers\Auth\PenjualAuthController::class, 'register'])->name('penjual.register.submit');

    Route::get('/ikan', 'IkanController@index');
    Route::get('/ikan/tambah', 'IkanController@tambah');
    Route::post('/ikan/store', 'IkanController@store');
    Route::get('/ikan/edit/{id}', 'IkanController@edit');
    Route::post('/ikan/update/{id}', 'IkanController@update');
    Route::get('/ikan/hapus/{id}', 'IkanController@destroy');
    Route::get('/ikan/cari', 'IkanController@search');
   }) ;

   Route::prefix('pembeli')->group(function() {
    Route::get('/login', [Auth\PembeliAuthController::class, '@getLogin'])->name('pembeli.login');
    Route::post('/login', 'Auth\PembeliAuthController@postLogin');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
    Route::get('/', 'Auth\AdminController@index')->name('admin.dashboard');
    Route::get('/register', 'Auth\AdminLoginController@showFormRegister')->name('admin.register');
    Route::post('/register', 'Auth\AdminLoginController@register')->name('admin.register.submit');

    Route::get('/ikan', 'IkanController@index');
    Route::get('/ikan/tambah', 'IkanController@tambah');
    Route::post('/ikan/store', 'IkanController@store');
    Route::get('/ikan/edit/{id}', 'IkanController@edit');
    Route::post('/ikan/update/{id}', 'IkanController@update');
    Route::get('/ikan/hapus/{id}', 'IkanController@destroy');
    Route::get('/ikan/cari', 'IkanController@search');
   }) ;
