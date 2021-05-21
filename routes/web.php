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
Auth::routes();

Route::get('admin/login', function () {
    return view('layouts.app');
});

// File Manager
Route::group(['prefix' => 'admin/kelola-penyimpanan', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

// Route::group(['prefix' => 'admin/kelola-penyimpanan', 'middleware' => ['web', 'admin']], function () {
//     \UniSharp\LaravelFilemanager\Lfm::routes();
// });

// Untuk blog
Route::get('/', 'BlogController@index')->name('blog');
Route::get('/list-post', 'BlogController@list_post')->name('list.post');
Route::get('/kategori/{Kategori}', 'BlogController@list_kategori')->name('list.kategori');
Route::get('/label/{Label}', 'BlogController@list_label')->name('list.label');
Route::get('/cari', 'BlogController@cari')->name('cari.blog');
Route::get('/{slug}', 'BlogController@isi')->name('isi.blog');







Route::group(['middleware' => ['role:admin|sekretaris']], function () {
    Route::resource('admin/dashboard','DashboardController', ['names' => 'dashboard']);
    Route::get('admin/kegiatan/{kegiatan}/info', 'KegiatanController@info');
    Route::resource('admin/kegiatan','KegiatanController', ['names' => 'kegiatan']);
    Route::resource('admin/keanggotaan/unit','UnitController', ['names' => 'unit']);
    Route::get('admin/keanggotaan/anggota/{anggota}/info', 'AnggotaController@info');
    Route::resource('admin/keanggotaan/anggota','AnggotaController', ['names' => 'anggota']);
    Route::resource('admin/keanggotaan/jabatan','JabatanController', ['names' => 'jabatan']);
    Route::resource('admin/keanggotaan/cabang','CabangController', ['names' => 'cabang']);
    Route::resource('admin/keanggotaan/ranting','RantingController', ['names' => 'ranting']);
    Route::resource('admin/blog/artikel/kategori','KategoriController', ['names' => 'artikel-kategori']);
    Route::resource('admin/blog/artikel/label','LabelController', ['names' => 'artikel-label']);
    Route::resource('admin/blog/artikel','ArtikelController', ['names' => 'artikel']);
});







