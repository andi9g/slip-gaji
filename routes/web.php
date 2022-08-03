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


Route::get('/login', 'aksesC@login');
Route::get('/logout', 'aksesC@logout');
Route::post('/login', 'aksesC@proseslogin')->name('proses.login');


Route::middleware(['GerbangAdmin'])->group(function () {
    Route::resource('admin', 'aksesC');
    Route::get('home', 'slipC@home');
    Route::resource('/pegawai', 'pegawaiC');
    
    Route::get('slip', "slipC@index");
    Route::get('slip/cetak', "slipC@cetak")->name('cetak.slip');
    
    Route::get("pengaturan", 'pengaturanC@index');
    Route::post("pengaturan", 'pengaturanC@store')->name('tambah.pengaturan');
    Route::post("pengaturan/jabatan", "pengaturanC@tambahJabatan")->name("tambah.jabatan");
    Route::PUT("pengaturan/jabatan/ubah/{id}", "pengaturanC@ubahJabatan")->name("ubah.jabatan");
    Route::post("pengaturan/pangkat", "pengaturanC@tambahPangkat")->name("tambah.pangkat");
    Route::PUT("pengaturan/pangkat/ubah/{id}", "pengaturanC@ubahPangkat")->name("ubah.pangkat");
    
    
    Route::get("pengaturancetak", 'pengaturanC@pengaturancetak');
    Route::post("pengaturancetak/kebutuhan/tambah", 'pengaturanC@tambahkebutuhan')->name('tambah.kebutuhan');
    Route::post("pengaturancetak/golongan/tambah", 'pengaturanC@tambahgolongan')->name('tambah.golongan');
    Route::PUT('pengaturancetak/kebutuhan/ubah/{idkebutuhan}', 'pengaturanC@ubahkebutuhan')->name('ubah.kebutuhan');
    Route::PUT('pengaturancetak/golongan/ubah/{idgolongan}', 'pengaturanC@ubahgolongan')->name('ubah.golongan');
    
    Route::post('pengaturancetak/ttd', "pengaturanC@ttd")->name('tambah.ttd');
    
});