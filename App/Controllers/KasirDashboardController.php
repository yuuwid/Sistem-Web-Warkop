<?php

namespace Controllers;

use Lawana\Controller\BaseController,
    Lawana\Utils\Request;
use Lawana\Message\Flasher;
use Lawana\Utils\Redirect;
use Lawana\Utils\Session;
use Models\Pegawai;
use Models\Penjualan;
use Models\Produk;

class KasirDashboardController extends BaseController
{

    private function middleware($key)
    {
        if (!Session::has($key)) {
            Redirect::to('/');
        }
    }

    public function index(Request $request)
    {
        $this->middleware('kasir');

        $data = [
            'title' => 'Dashboard | Kasir',
            'kasir' => Session::get('kasir'),
            'pesanan' => Penjualan::all(),
        ];

        return view('kasir.dashboard', $data);
    }

    public function proses_pesanan(Request $request) 
    {
        $req = $request->all();

        $bayar = $req['bayar'];
        $bayar = str_replace('Rp. ', '', $bayar);
        $bayar = str_replace('.', '', $bayar);

        $data = [
            'id_pegawai' => $req['id_pegawai'],
            'tanggal_proses' => datenow(),
            'id_penjualan' => $req['id_penjualan'],
            'bayar' => $bayar,
        ];

        $result = Penjualan::update_proses_pesanan($data);

        if ($result) {
            Produk::update_stock_produk_by_id_penjualan($data['id_penjualan']);
            Flasher::create('proses-pesanan', 'Pesanan telah diproses', 'g');
        } else {
            Flasher::create('proses-pesanan', 'Pesanan GAGAL diproses', 'r', 'e');
        }

        Redirect::to('/kasir');
    }


    public function selesai_pesanan(Request $request) 
    {
        $req = $request->all();

        $data = [
            'id_penjualan' => $req['id_penjualan'],
            'tanggal_selesai' => datenow()
        ];

        $result = Penjualan::update_status_pesanan_selesai($data);

        if ($result) {
            Flasher::create('proses-pesanan', 'Pesanan telah selesai', 'g');
        } else {
            Flasher::create('proses-pesanan', 'GAGAL menyelesaikan pesanan', 'r', 'e');
        }

        Redirect::to('/kasir');
    }
}
