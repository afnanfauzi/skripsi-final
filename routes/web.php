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


Route::get('admin-page', function() {
    return 'Halaman untuk Admin';
})->middleware('role:admin')->name('admin.page');

Route::get('user-page', function() {
    return 'Halaman untuk User';
})->middleware('role:user')->name('user.page');




Route::get('/home', 'HomeController@index')->name('home');
Route::get('admin/kegiatan/{kegiatan}/info', 'KegiatanController@info');
Route::resource('admin/kegiatan','KegiatanController', ['names' => 'kegiatan']);
Route::resource('admin/keanggotaan/unit','UnitController', ['names' => 'unit']);
Route::get('admin/keanggotaan/anggota/{anggota}/info', 'AnggotaController@info');
Route::resource('admin/keanggotaan/anggota','AnggotaController', ['names' => 'anggota']);
Route::resource('admin/keanggotaan/jabatan','JabatanController', ['names' => 'jabatan']);
Route::resource('admin/keanggotaan/cabang','CabangController', ['names' => 'cabang']);
Route::resource('admin/keanggotaan/ranting','RantingController', ['names' => 'ranting']);
Route::resource('admin/blog/artikel/kategori','KategoriController', ['names' => 'artikel-kategori']);
Route::resource('admin/blog/artikel/tags','TagsController', ['names' => 'artikel-tags']);
Route::resource('admin/blog/artikel','ArtikelController', ['names' => 'artikel']);





