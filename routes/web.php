<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DistributorController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PoinController;
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

Route::get('/home', function () {
    return view('layout/home');
});
Route::get('/barang', [BarangController::class, 'index'])->name('barang');
Route::get('/tambahbarang', [BarangController::class, 'tambahbarang'])->name('tambahbarang');
Route::post('/insertdata', [BarangController::class, 'insertdata'])->name('insertdata');
Route::get('/ubahbarang/{id_barang}', [BarangController::class, 'ubahbarang'])->name('ubahbarang');
Route::post('/updatedata/{id_barang}', [BarangController::class, 'updatedata'])->name('updatedata');
Route::get('/deletebarang/{id_barang}', [BarangController::class, 'deletebarang'])->name('deletebarang');
Route::get('/eksporbarang', [BarangController::class, 'eksporbarang'])->name('eksporbarang');

Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai');
Route::get('/tambahpegawai', [PegawaiController::class, 'tambahpegawai'])->name('tambahpegawai');
Route::post('/insertdata2', [PegawaiController::class, 'insertdata2'])->name('insertdata2');
Route::get('/ubahpegawai/{id}', [PegawaiController::class, 'ubahpegawai'])->name('ubahpegawai');
Route::post('/updatedata2/{id}', [PegawaiController::class, 'updatedata2'])->name('updatedata2');
Route::get('/deletepegawai/{id}', [PegawaiController::class, 'deletepegawai'])->name('deletepegawai');
Route::get('/eksporpegawai', [PegawaiController::class, 'eksporpegawai'])->name('eksporpegawai');

Route::get('/pengguna', [PenggunaController::class, 'index'])->name('pengguna');
Route::get('/tambahpengguna', [PenggunaController::class, 'tambahpengguna'])->name('tambahpengguna');
Route::post('/insertdata3', [PenggunaController::class, 'insertdata3'])->name('insertdata3');
Route::get('/ubahpengguna/{id}', [PenggunaController::class, 'ubahpengguna'])->name('ubahpengguna');
Route::post('/updatedata3/{id}', [PenggunaController::class, 'updatedata3'])->name('updatedata3');
Route::get('/deletepengguna/{id}', [PenggunaController::class, 'deletepengguna'])->name('deletepengguna');

Route::get('/pelanggan', [PelangganController::class, 'index'])->name('pelanggan');
Route::get('/tambahpelanggan', [PelangganController::class, 'tambahpelanggan'])->name('tambahpelanggan');
Route::post('/insertdata4', [PelangganController::class, 'insertdata4'])->name('insertdata4');
Route::get('/ubahpelanggan/{id}', [PelangganController::class, 'ubahpelanggan'])->name('ubahpelanggan');
Route::post('/updatedata4/{id}', [PelangganController::class, 'updatedata4'])->name('updatedata4');
Route::get('/deletepelanggan/{id}', [PelangganController::class, 'deletepelanggan'])->name('deletepelanggan');
Route::get('/eksporpelanggan', [PelangganController::class, 'eksporpelanggan'])->name('eksporpelanggan');

Route::get('/poin', [PoinController::class, 'index'])->name('poin');
Route::get('/tambahpoin', [PoinController::class, 'tambahpoin'])->name('tambahpoin');
Route::post('/insertdata5', [PoinController::class, 'insertdata5'])->name('insertdata5');
Route::get('/ubahpoin/{id}', [PoinController::class, 'ubahpoin'])->name('ubahpoin');
Route::post('/updatedata5/{id}', [PoinController::class, 'updatedata5'])->name('updatedata5');
Route::get('/deletepoin/{id}', [PoinController::class, 'deletepoin'])->name('deletepoin');
Route::get('/eksporpoin', [PoinController::class, 'eksporpoin'])->name('eksporpoin');

Route::get('/distributor', [DistributorController::class, 'index'])->name('distributor');
Route::get('/tambahdistributor', [DistributorController::class, 'tambahdistributor'])->name('tambahdistributor');
Route::post('/insertdata1', [DistributorController::class, 'insertdata1'])->name('insertdata1');
Route::get('/ubahdistributor/{id}', [DistributorController::class, 'ubahdistributor'])->name('ubahdistributor');
Route::post('/updatedata1/{id}', [DistributorController::class, 'updatedata1'])->name('updatedata1');
Route::get('/deletedistributor/{id}', [DistributorController::class, 'deletedistributor'])->name('deletedistributor');
