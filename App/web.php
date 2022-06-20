<?php

use Api\JabatanApi;
use Api\KategoriApi;
use Api\MerkApi;
use Api\PegawaiApi;
use Api\PembelianApi;
use Api\PesananApi;
use Api\ProdukApi;
use Api\TransaksiApi;
use Lawana\Routing\Register;
use Controllers\AdminController;
use Controllers\KasirController;
use Controllers\WelcomeController;
use Controllers\DashboardController;
use Controllers\TransaksiController;
use Controllers\AdminDashboardController;
use Controllers\GudangController;
use Controllers\GudangDashboardController;
use Controllers\KasirDashboardController;

/**
 * Registrasi Web Url disini
 * web url dapat berupa link url biasa dan link REST Api
 * untuk membuat akses ke link yang ingin dibuat dapat menggunakan class Register::url
 * contoh :
 *      Register::url("link_url", ["Controller", "Method"]);
 * untuk REST Api sama dengan membuat link url biasa
 * contoh :
 *      Register::api("link_url", ["Controller", "Method"]);
 * Note: 
 * - setiap url yang diregistrasikan tidak boleh sama, baik itu untuk link biasa atau link REST Api,
 *   jika mendaftarkan url yang sama, maka url yang didaftarkan pertama kali yang akan dipakai.
 */


Register::url('/', [WelcomeController::class, 'index']);
Register::url('/mulai-pesan', [WelcomeController::class, 'mulai_pesan'])->post();
Register::url('/akhiri-pesan', [WelcomeController::class, 'akhiri_pesan'])->get();
Register::url('/cetak-antrian', [WelcomeController::class, 'cetak_antrian']);


Register::url('/dashboard', [DashboardController::class, 'dashboard']);
Register::url('/dashboard/keranjang', [DashboardController::class, 'keranjang']);
Register::url('/dashboard/buat-pesanan', [DashboardController::class, 'buat_pesanan']);



Register::url('/kasir', [KasirController::class, 'index']);
Register::url('/kasir/login', [KasirController::class, 'login_auth'])->post();
Register::url('/kasir/logout', [KasirController::class, 'logout_auth']);

Register::url('/kasir/dashboard', [KasirDashboardController::class, 'index']);


Register::url('/kasir/proses_pesanan', [KasirDashboardController::class, 'proses_pesanan']);
Register::url('/kasir/selesai_pesanan', [KasirDashboardController::class, 'selesai_pesanan']);


Register::url('/transaksi/cetak-struk', [TransaksiController::class, 'cetak_struk']);

Register::url('/admin', [AdminController::class, 'login']);
Register::url('/admin/login', [AdminController::class, 'login_auth'])->post();
Register::url('/admin/logout', [AdminController::class, 'logout_auth']);


Register::url('/admin/dashboard', [AdminDashboardController::class, 'index']);
Register::url('/admin/reset-antrian', [AdminDashboardController::class, 'reset_antrian']);


Register::url('/gudang', [GudangController::class, 'login']);
Register::url('/gudang/login', [GudangController::class, 'login_auth'])->post();
Register::url('/gudang/logout', [GudangController::class, 'logout_auth']);

Register::url('/gudang/dashboard', [GudangDashboardController::class, 'index']);

Register::url('/gudang/store', [GudangDashboardController::class, 'store'])->post();



Register::api('/dashboard/pesanan', [PesananApi::class, 'pesanan']);
Register::api('/transaksi/get-transaksi', [TransaksiApi::class, 'get_transaksi']);
Register::api('/transaksi/search-transaksi', [TransaksiApi::class, 'search_transaksi_api']);

Register::api('/merk/all', [MerkApi::class, 'all']);
Register::api('/kategori/all', [KategoriApi::class, 'all']);
Register::api('/merk/get-range', [MerkApi::class, 'range']);
Register::api('/kategori/get-range', [KategoriApi::class, 'range']);
Register::api('/produk/get-range', [ProdukApi::class, 'range']);
Register::api('/merk/get', [MerkApi::class, 'get']);
Register::api('/kategori/get', [KategoriApi::class, 'get']);
Register::api('/produk/get', [ProdukApi::class, 'get']);
Register::api('/merk/drop', [MerkApi::class, 'drop']);
Register::api('/kategori/drop', [KategoriApi::class, 'drop']);
Register::api('/produk/drop', [ProdukApi::class, 'drop']);
Register::api('/merk/update', [MerkApi::class, 'update']);
Register::api('/kategori/update', [KategoriApi::class, 'update']);
Register::api('/produk/update', [ProdukApi::class, 'update']);
Register::api('/merk/store', [MerkApi::class, 'store']);
Register::api('/kategori/store', [KategoriApi::class, 'store']);
Register::api('/produk/store', [ProdukApi::class, 'store']);

Register::api('/pegawai/get', [PegawaiApi::class, 'get']);
Register::api('/pegawai/insert', [PegawaiApi::class, 'store']);
Register::api('/pegawai/update', [PegawaiApi::class, 'update']);
Register::api('/pegawai/drop', [PegawaiApi::class, 'drop']);

Register::api('/pegawai/jabatan', [JabatanApi::class, 'all']);

Register::api('/jabatan/insert', [JabatanApi::class, 'store']);

Register::api('/pembelian/get', [PembelianApi::class, 'get']);
Register::api('/pembelian/update-status', [PembelianApi::class, 'update_status']);


Register::url('/debug', function(){

    return view('debug.index');
});

Register::url('/debug2', function(){

    return view('debug.index2');
});