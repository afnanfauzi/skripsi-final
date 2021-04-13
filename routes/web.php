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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('admin/kegiatan/{kegiatan}/info', 'KegiatanController@info');
Route::resource('admin/kegiatan','KegiatanController', ['names' => 'kegiatan']);
Route::resource('admin/keanggotaan/unit','UnitController', ['names' => 'unit']);
Route::get('admin/keanggotaan/anggota/{anggota}/info', 'AnggotaController@info');
Route::resource('admin/keanggotaan/anggota','AnggotaController', ['names' => 'anggota']);
Route::resource('admin/keanggotaan/jabatan','JabatanController', ['names' => 'jabatan']);
Route::resource('admin/blog/artikel/kategori','KategoriController', ['names' => 'artikel-kategori']);
Route::resource('admin/blog/artikel/tags','TagsController', ['names' => 'artikel-tags']);
Route::resource('admin/blog/artikel','ArtikelController', ['names' => 'artikel']);

