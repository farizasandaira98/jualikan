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
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('admin', function () { return view('admin'); })->middleware('checkRole:admin');
// Route::get('penjual', function () { return view('penjual'); })->middleware(['checkRole:penjual,admin']);
// Route::get('pembeli', function () { return view('pembeli'); })->middleware(['checkRole:pembeli,admin']);

Route::prefix('admin')->middleware('checkRole:admin')->group(function() {

    //route dashboard
    Route::get('/', 'AdminController@index');

    //route ikan
    Route::get('/ikan/tambah', 'IkanController@tambah');
    Route::post('/ikan/store', 'IkanController@store');
    Route::get('/ikan/edit/{id}', 'IkanController@edit');
    Route::post('/ikan/update/{id}', 'IkanController@update');
    Route::get('/ikan/hapus/{id}', 'IkanController@destroy');
    Route::get('/ikan/cari', 'IkanController@search');
}) ;
