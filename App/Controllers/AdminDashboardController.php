<?php

namespace Controllers;

use Lawana\Controller\BaseController,
    Lawana\Utils\Request;
use Lawana\Message\Flasher;
use Lawana\Utils\Redirect;
use Lawana\Utils\Session;
use Models\AppWeb;
use Models\Jabatan;
use Models\Kategori;
use Models\KodePembelian;
use Models\KodeTransaksi;
use Models\Merk;
use Models\Pegawai;
use Models\Pembelian;
use Models\Penjualan;
use Models\Produk;

class AdminDashboardController extends BaseController
{
    private function middleware($key)
    {
        if (!Session::has($key)) {
            Redirect::to('/admin');
        }
    }

    public function index(Request $request)
    {
        $this->middleware('admin');
        
        $req = $request->all();

        if (has($req, 'action')) {
            $action = $request->get('action');
        } else {
            $action = 'dashboard';
        }

        $data = [];

        if ($action == 'dashboard') {
            $data = $this->data_dashboard();
            $data['total_transaksi'] = Penjualan::count()['total'];
            $data['antrian'] = AppWeb::antrian()['antrian'];
        } else if ($action == 'transaksi') {
            // lewat API
        } else if ($action == 'management-warkop') {
            $data['stok'] = Produk::count_stock()['jumlah_stok'];
            $data['produk'] = Produk::count_produk()['jumlah_produk'];
            $data['merk'] = Merk::count()['total'];
            $data['kategori'] = Kategori::count()['total'];
        }  else if ($action == 'management-supply') { 
            $data['pembelian'] = Pembelian::all();
        }  else if ($action == 'management-pegawai') { 
            $data['pegawai'] = Pegawai::all();
            $data['jabatan'] = Jabatan::all();
         }

        $data['action'] = $action;

        return view('admin.dashboard', $data);
    }

    private function data_dashboard()
    {
        $penjualan_hari_ini = Penjualan::get_penjualan_hari_ini();
        $results = [
            'berjalan' => 0,
            'diproses' => 0,
            'selesai' => 0,
            'batal' => 0,
            'pemasukan' => 0
        ];
        $i = 0;

        foreach ($penjualan_hari_ini as $phi) {
            if ($phi['status'] == 'dibuat') {
                $results['berjalan'] += 1;
            } elseif ($phi['status'] == 'diproses') {
                $results['diproses'] += 1;
            } elseif ($phi['status'] == 'selesai') {
                $results['selesai'] += 1;
            } elseif ($phi['status'] == 'dibatalkan') {
                $results['batal'] += 1;
            }
            $results['pemasukan'] += $phi['total_harga'];

            $results['kode_transaksi'] = KodeTransaksi::create($phi);
            $penjualan_hari_ini[$i++]['kode_transaksi'] = $results['kode_transaksi'];
        }

        $data = [
            'transaksi' => $penjualan_hari_ini,
            'jumlah_transaksi' => $results,
            'jumlah_pegawai' => Pegawai::count()['jumlah_pegawai'],
            'jumlah_stok' => Produk::count_stock()['jumlah_stok'],
        ];

        return $data;
    }

    public function reset_antrian()
    {
        AppWeb::reset_antrian();
        Flasher::create('dashboard-admin', 'No Antrian telah di reset.', 'g');
        Redirect::to('admin/dashboard');
    }
}
