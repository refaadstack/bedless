<?php

use App\Http\Controllers\OfflineController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\ExpedisiController;
use App\Http\Controllers\InfowebController;
use App\Http\Controllers\LoginadminController;
use App\Http\Controllers\OfflinebeliController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\WebController;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('web.home');
});

Route::get('/home',[WebController::class,'home'])->name('web.home');
Route::get('/ttg',[WebController::class,'tentang'])->name('web.tentang');
Route::get('/cpr',[WebController::class,'carapesan'])->name('web.carapesan');
Route::get('/barang/kategori',[WebController::class,'kategori'])->name('web.kategori');
Route::get('/barang/detail',[WebController::class,'detailbarang'])->name('web.detail.barang');
Route::get('/daftar',[WebController::class,'daftar'])->name('web.daftar');
Route::post('/daftar/save',[WebController::class,'daftarsave'])->name('web.daftar.save');
Route::post('/login',[WebController::class,'loginproses'])->name('web.login');


Route::post('/pelanggan/barang/add',[WebController::class,'addcart'])->name('cart.barang.add');
    Route::get('/pelanggan/barang/logindulu',[WebController::class,'logindulu'])->name('cart.barang.logindulu');
    Route::get('/pelanggan/barang/stokkurang',[WebController::class,'stokkurang'])->name('cart.barang.stokkurang');

Route::middleware('auth:pelanggan')->group(function(){

    Route::get('/pelanggan/profil',[WebController::class,'profil'])->name('web.pelanggan.profil');
    Route::get('/pelanggan/orderhistory',[WebController::class,'orderhistory'])->name('web.pelanggan.orderhistory');
    Route::get('/pelanggan/orderhistorydetail',[WebController::class,'orderhistorydetail'])->name('web.pelanggan.orderhistory.detail');

    Route::post('/pelanggan/proses/konfirmasi',[WebController::class,'proseskonfirmasi'])->name('web.pelanggan.proses.konfirmasi');

    Route::post('/pelanggan/ubahprofil',[WebController::class,'ubahprofil'])->name('web.ubahprofil');

    Route::get('/pelanggan/barang/delete',[WebController::class,'hapuscart'])->name('cart.barang.hapus');
    Route::get('/pelanggan/barang/listitem',[WebController::class,'listcart'])->name('cart.barang.list');
    Route::post('/pelanggan/prosesorder',[WebController::class,'prosesordercart'])->name('cart.barang.proses.order');

    Route::get('/logout/pelanggan',[WebController::class,'logout'])->name('web.logout');
});


// admin

Route::get('/loginadmin',[LoginadminController::class,'index'])->name('login.admin');
Route::post('/loginadmin',[LoginadminController::class,'proseslogin'])->name('login.admin.post');
Route::get('/logoutadmin',[LoginadminController::class,'logout'])->name('logout.admin');

Route::get('/buatuser',function(){
    Admin::create([
        'username' => 'admin',
        'password' => Hash::make('123'),
        'nohp' => '111111',
        'nama' => 'ADMIN',
        'level' => 'Admin',
        'email' => 'email@mail.com'
    ]);
});

Route::prefix('/admin')->middleware('auth:admin')->group(function(){

    Route::get('/pemesanan',[PemesananController::class,'semua'])->name('pemesanan.semua');
    Route::get('/pemesanan/detail',[PemesananController::class,'detailpesanan'])->name('pemesanan.view.detail');
    Route::post('/pemesanan/noresi',[PemesananController::class,'savenoresi'])->name('pemesanan.savenoresi');

    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard.admin');
    Route::resource('/kategori',KategoriController::class);
    Route::resource('/barang',BarangController::class);
    Route::resource('/infoweb',InfowebController::class);
    Route::resource('/pelanggan',PelangganController::class);
    Route::resource('/admin',AdminController::class);
    Route::resource('/expedisi',ExpedisiController::class);

    Route::get('/laporan/barang',[LaporanController ::class,'barang'])->name('laporan.barang');
    Route::get('/laporan/pelanggan',[LaporanController::class,'pelanggan'])->name('laporan.pelanggan');

    Route::get('/laporan/pemesanan/tanggal',[LaporanController::class,'pemesananpertanggal'])->name('laporan.pemesanan.tanggal');
    Route::get('/laporan/pemesanan/tanggal/data',[LaporanController::class,'pemesananpertanggaldata'])->name('laporan.pemesanan.tanggal.data');

    Route::get('/laporan/keluar/bulan',[LaporanController::class,'keluarperbulan'])->name('laporan.keluar.bulan');
    Route::get('/laporan/keluar/bulan/data',[LaporanController::class,'keluarperbulandata'])->name('laporan.keluar.bulan.data');

    Route::get('/laporan/masuk/bulan',[LaporanController::class,'masukperbulan'])->name('laporan.masuk.bulan');
    Route::get('/laporan/masuk/bulan/data',[LaporanController::class,'masukperbulandata'])->name('laporan.masuk.bulan.data');

    Route::get('/laporan/pendapatan/bulan',[LaporanController::class,'pendapatanperbulan'])->name('laporan.pendapatan.bulan');
    Route::get('/laporan/pendapatan/bulan/data',[LaporanController::class,'pendapatanperbulandata'])->name('laporan.pendapatan.bulan.data');

    Route::get('/offline',[OfflineController::class,'index'])->name('offline.index');
    Route::get('/offline/cari',[OfflineController::class,'getCariData'])->name('offline.barang.cari');
    Route::get('/offline/jenisukuran/select',[OfflineController ::class,'loadJenisUkuranSelect'])->name('offline.jenisukuran.select');

    Route::get('/offline/barang',[OfflineController::class,'barang'])->name('offline.barang');

    Route::get('/offline/get/temp/transaksi',[OfflineController ::class,'alltransaksi'])->name('offline.temp.transaksi');    
    Route::get('/offline/save/temp/transaksi',[OfflineController::class,'savetransaksi'])->name('offline.save.temp.transaksi');
    
    Route::get('/offline/get/temp/transaksi/delete/{iddata}',[OfflineController::class,'delete'])->name('offline.temp.transaksi.delete');
    Route::get('/offline/get/temp/transaksi/gettotal',[OfflineController::class,'getTotal'])->name('offline.temp.transaksi.gettotal');
    
    Route::post('/offline/proses/temp/transaksi',[OfflineController::class,'prosestransaksi'])->name('offline.proses.transaksi');

    Route::get('/offline/cetaktransaksi',[OfflineController::class,'cetaktransaksi'])->name('offline.cetak.transaksi');


    // offline beli
    Route::get('/belioff',[OfflinebeliController ::class,'index'])->name('belioff.index');
    Route::get('/belioff/cari',[OfflinebeliController::class,'getCariData'])->name('belioff.barang.cari');
    Route::get('/belioff/jenisukuran/select',[OfflinebeliController::class,'loadJenisUkuranSelect'])->name('belioff.jenisukuran.select');
    Route::get('/belioff/barang',[OfflinebeliController::class,'barang'])->name('belioff.barang');
    Route::get('/belioff/save/temp/transaksi',[OfflinebeliController::class,'savetransaksi'])->name('belioff.save.temp.transaksi');
    Route::get('/belioff/get/temp/transaksi',[OfflinebeliController::class,'alltransaksi'])->name('belioff.temp.transaksi');    
    Route::get('/belioff/get/temp/transaksi/delete/{iddata}',[OfflinebeliController::class,'delete'])->name('belioff.temp.transaksi.delete');
    Route::get('/belioff/get/temp/transaksi/gettotal',[OfflinebeliController::class,'getTotal'])->name('belioff.temp.transaksi.gettotal');
    Route::post('/belioff/proses/temp/transaksi',[OfflinebeliController::class,'prosestransaksi'])->name('belioff.proses.transaksi');
});
