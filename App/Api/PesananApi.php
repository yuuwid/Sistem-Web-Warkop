<?php

namespace Api;

use Lawana\Api\BaseApi;
use Lawana\Message\Flasher;
use Lawana\Utils\Request;
use Lawana\Utils\Session;
use Models\Produk;

class PesananApi extends BaseApi
{

    private function check_keranjang($id, $action)
    {
        $produk = Produk::getBy('id_produk', $id)[0];

        if (Session::has('keranjang')) {
            $keranjang = Session::get('keranjang');

            if ($action == 'tambah') {
                if ($keranjang[$id] + 1 < $produk['stok_produk']) {
                    if (key_exists($id, $keranjang)) {
                        $keranjang[$id] += 1;
                    } else {
                        $keranjang[$id] = 1;
                    }
                }
                Flasher::create('keranjang', '<b>' . $produk['nama_produk'] . '</b>' . ' Telah ditambahkan ke keranjang.', 'g', 'i');
            } else {
                if (key_exists($id, $keranjang)) {
                    if ($keranjang[$id] - 1 == 0) {
                        unset($keranjang[$id]);
                        Flasher::create('keranjang', '<b>' . $produk['nama_produk'] . '</b>' . ' Baru saja dihapus.', 'y', 'i');
                    } else {
                        $keranjang[$id] -= 1;
                        Flasher::create('keranjang', '<b>' . $produk['nama_produk'] . '</b>' . ' Baru saja diubah.', 'y', 'i');
                    }
                }
            }             
            Session::drop('keranjang');
            Session::make('keranjang', $keranjang);
        } else {
            $keranjang = [$id => 1];

            Session::drop('keranjang');
            Session::make('keranjang', $keranjang);
        }
    }

    private function tambah_pesanan()
    {
        $this->check_keranjang(Request::get('id_produk'), 'tambah');
    }

    private function kurang_pesanan()
    {
        $this->check_keranjang(Request::get('id_produk'), 'kurang');
    }

    private function kosongkan_pesanan()
    {
        Session::drop('keranjang');
        Session::make('keranjang', []);
        Flasher::create('keranjang', '<b>Keranjang</b> telah dikosongkan.', 'r');
    }

    public function pesanan()
    {
        $request = Request::get('req');
        if ($request == 'tambah') {
            $this->tambah_pesanan();
        } else if ($request == 'kurang') {
            $this->kurang_pesanan();
        } else if ($request == 'kosong') {
            $this->kosongkan_pesanan();
        }
    }
}
