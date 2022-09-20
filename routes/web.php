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
    return view('dashboard');
});

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/about', 'AboutController@about');

Route::get('/suratmasuk','SuratMasukController@index');
Route::get('/suratmasuk/index','SuratMasukController@index');
Route::get('/suratmasuk/create','SuratMasukController@create');
Route::post('/suratmasuk/tambah','SuratMasukController@tambah');
Route::get('/suratmasuk/{id}/tampil','SuratMasukController@tampil');
Route::get('/suratmasuk/{id}/edit','SuratMasukController@edit');
Route::post('/suratmasuk/{id}/update','SuratMasukController@update');
Route::get('/suratmasuk/{id}/delete','SuratMasukController@delete');

Route::get('/kategori', 'KategoriController@index');
Route::get('/kategori/index','KategoriController@index');
Route::get('/kategori/create','KategoriController@create');
Route::post('/kategori/tambah','KategoriController@tambah');
Route::get('/kategori/{id}/edit','KategoriController@edit');
Route::post('/kategori/{id}/update','KategoriController@update');
Route::get('/kategori/{id}/delete','KategoriController@delete');

Route::get('/about','AboutController@index');