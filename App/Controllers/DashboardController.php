<?php

namespace Controllers;

use Lawana\Controller\BaseController,
    Lawana\Utils\Request;
use Lawana\Utils\Session,
    Lawana\Utils\Redirect;
use Models\AppWeb;
use Models\Pelanggan;
use Models\Penjualan;
use Models\Produk;

class DashboardController extends BaseController
{

    private function middleware($key)
    {
        if (!Session::has($key)) {
            Redirect::to('/');
        }
    }

    public function dashboard()
    {
        $this->middleware('nama-pelanggan');

        $keranjang = Session::get('keranjang');

        $data = [
            'title' => 'Pesan',
            'nama_pelanggan' => Session::get('nama-pelanggan'),
            'produk' => Produk::getProduks(),
            'keranjang' => $keranjang
        ];

        return view('dashboard.index', $data);
    }

    public function keranjang()
    {
        $this->middleware('nama-pelanggan');

        $keranjang = Session::get('keranjang');
        $id_produks = array_keys($keranjang);
        $produks = [];
        $jumlah_bayar = 0;
        
        if (sizeof($id_produks) > 0) {
            $produks = Produk::getProduksbyId($id_produks);
            
            foreach ($produks as $pr) {
                $jumlah_bayar += $pr['harga_produk'] * $keranjang[$pr['id_produk']];
            }
        }

        $data = [
            'title' => 'Keranjang',
            'nama_pelanggan' => Session::get('nama-pelanggan'),
            'produk' => $produks,
            'keranjang' => $keranjang,
            'jumlah_bayar' => $jumlah_bayar,
        ];

        return view('dashboard.keranjang', $data);
    }


    public function buat_pesanan()
    {
        $this->middleware('nama-pelanggan');

        if (!Session::has('temp_transaksi')) {
            Session::make('temp_transaksi', 0);
        }
        if (Session::get('temp_transaksi') == 0) {
            $id_pelanggan = Pelanggan::storeifExist(Session::get('nama-pelanggan'));

            $antrian = AppWeb::antrian()['antrian'] + 1;
            Session::renew('temp_transaksi', $id_pelanggan);
        } else {
            $id_pelanggan = Session::get('temp_transaksi');
            $antrian = AppWeb::antrian()['antrian'];
        }

        $keranjang = Session::get('keranjang');
        
        
        $id_produks = array_keys($keranjang);
        $jumlah_produk = array_values($keranjang);
        $jumlah_harga = [];
        $produks = [];
        $jumlah_bayar = 0;
        
        
        if (sizeof($id_produks) > 0) {
            $produks = Produk::getProduksbyId($id_produks);
            
            foreach ($produks as $pr) {
                $jumlah_harga[$pr['id_produk']] = $pr['harga_produk'] * $keranjang[$pr['id_produk']];

                $jumlah_bayar += $pr['harga_produk'] * $keranjang[$pr['id_produk']];
            }
        }

        $data = [
            'id_pelanggan' => $id_pelanggan,
            'id_pegawai' => null,
            'no_antrian' => $antrian,
            'total_harga' => $jumlah_bayar,
            'tanggal_penjualan' => date('Y-m-d H:i:s')
        ];


        if (!Session::has('temp_penjualan')) {
            Session::make('temp_penjualan', 0);
        }
        if (Session::get('temp_penjualan') == 0) {
            $id_penjualan = Penjualan::store($data)['LAST_INSERT_ID()'];
            AppWeb::update_antrian($antrian);
            Session::renew('temp_penjualan', $id_penjualan);
        } else {
            $id_penjualan = Session::get('temp_penjualan');
        }
        
        $data = [
            'id_produk' => $id_produks,
            'id_penjualan' => $id_penjualan,
            'jumlah_barang' => $jumlah_produk,
            'jumlah_harga' => $jumlah_harga
        ];


        if (!Session::has('temp_detail_penjualan')) {
            Session::make('temp_detail_penjualan', 0);
        }
        if (Session::get('temp_detail_penjualan') == 0) {
            Penjualan::detail($data);
            Session::renew('temp_detail_penjualan', 1);
        }

        $data = [
            'title' => 'Checkout',
            'no_antrian' => $antrian
        ];

        return view('dashboard.checkout', $data);
    }
}
