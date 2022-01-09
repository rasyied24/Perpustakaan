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



Route::get('dashboard', 'AdminController@dashboard');
Route::get('home', 'AdminController@dashboard');
Route::get('buku', 'AdminController@buku');
Route::get('katalog', 'AdminController@katalog');
Route::get('penerbit', 'AdminController@penerbit');
Route::get('pengarang', 'AdminController@pengarang');
Route::get('anggota', 'AdminController@anggota');
Route::get('peminjaman', 'AdminController@peminjaman');
Route::get('test_spatie', 'AdminController@test_spatie');


Route::group(['prefix' => 'data'], function () {

    Route::resource('katalog', 'KatalogController');
    Route::resource('pengarang', 'PengarangController');
    Route::resource('penerbit', 'PenerbitController');
    Route::resource('anggota', 'AnggotaController');
    Route::resource('buku', 'BukuController');
    Route::resource('peminjaman', 'PeminjamanController');
});