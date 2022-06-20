<?php

namespace Controllers;

use Lawana\Controller\BaseController,
    Lawana\Utils\Request,
    Lawana\Utils\Redirect,
    Lawana\Utils\Session;
use Lawana\Message\Flasher;
use Models\Pegawai;
use Models\Pembelian;
use Models\Produk;
use Models\Supplier;

class GudangDashboardController extends BaseController
{
    private function middleware($key)
    {
        if (!Session::has($key)) {
            Redirect::to('/gudang');
        }
    }


    public function index(Request $request)
    {
        $this->middleware('gudang');

        $id_pegawai = Session::get('gudang')['id_pegawai'];
        $data = [
            'staff' => Pegawai::getWhere('id_pegawai', $id_pegawai),
            'supplier' => Supplier::all(),
            'produk' => Produk::all(),
            'pembelian' => array_reverse(Pembelian::get('pembelian.id_pegawai', $id_pegawai))
        ];

        return view('gudang.dashboard', $data);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $this->validateRule1($data);

        if (!has($data, 'baru')) {
            unset($data['nama_supplier_baru']);
            unset($data['alamat_supplier_baru']);
            unset($data['notelp_supplier_baru']);
        } else {
            $nama_supplier = $data['nama_supplier_baru'];
            $alamat_supplier = $data['alamat_supplier_baru'];
            $notelp_supplier = $data['notelp_supplier_baru'];

            $data['id_supplier'] = Supplier::storeifExist($nama_supplier, $alamat_supplier, $notelp_supplier);

            unset($data['baru']);
        }

        $this->validateRule2($data);

        $data['tanggal_pembelian'] = date('Y-m-d H:i:s');
        $data['id_pegawai'] = Session::get('gudang')['id_pegawai'];

        $result = Pembelian::store($data);

        if ($result == true) {
            Flasher::create('gudang', 'Berhasil Menyimpan', 'g', 'c');
        } else {
            Flasher::create('gudang', 'Gagal Menyimpan', 'r');
        }
        Redirect::to('gudang/dashboard');
    }

    private function validateRule1($data)
    {
        $data['id_produk'] = intval($data['id_produk']);
        $data['harga_beli'] = intval($data['harga_beli']);
        $data['jumlah_pembelian'] = intval($data['jumlah_pembelian']);

        if (($data['id_produk'] == 0) or ($data['harga_beli'] == 0) or ($data['jumlah_pembelian'] == 0)) {
            Flasher::create('gudang', 'Ada Data yang tidak Valid', 'r');
            Redirect::to('gudang/dashboard');
        }

        return $data;
    }

    private function validateRule2($data)
    {
        $data['id_supplier'] = intval($data['id_supplier']);

        if (($data['id_supplier'] == 0)) {
            Flasher::create('gudang', 'Ada Data yang tidak Valid', 'r');
            Redirect::to('gudang/dashboard');
        }
    }
}
