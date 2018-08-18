<?php

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

// Route::get('/', function () {return redirect('/data_kriteria');});
Route::get('/', function () {return redirect('/login')->with('Berhasil', 'Selamat Datang.');});


Route::get('admin','AdminController@data_karyawan');                            //untuk menampilkan data karyawan
Route::get('admin/data_karyawan','AdminController@data_karyawan');              //untuk menampilkan data karyawan
Route::get('admin/data_pengajuan','AdminController@data_pengajuan');            //untuk menampilkan data pengajuan
Route::post('admin/data_karyawan','AdminController@tambah_data_karyawan');      //untuk menambah data
Route::put('admin/data_karyawan/{id}','AdminController@update_data_karyawan');  //untuk mengupdate data
Route::delete('admin/data_karyawan/{id}','AdminController@delete_data_karyawan');//untuk menghapus data



Route::Resource('karyawan','KaryawanController');


Route::Resource('hrd','HRDController');

Route::get('/logout','Auth\LoginController@logout')->name('logout');
Route::get('/login','LoginKaryawanController@showLoginForm');
Route::post('/login','LoginKaryawanController@LoginKaryawan')->name('login');
