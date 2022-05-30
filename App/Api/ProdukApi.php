<?php

namespace API;

use Lawana\API\BaseApi;
use Lawana\Utils\Request;
use Models\Produk;

class ProdukApi extends BaseApi
{

    public function get(Request $request)
    {
        $req = $request->all();
        return Produk::getBy('id_produk', $req['id']);
    }


    public function range(Request $request)
    {
        $req = $request->all();
        return Produk::range($req['start'], $req['end'], $req['search']);
    }

    public function store(Request $request)
    {
        $req = $request->all();

        $req['nama_produk'] = str_replace('\\s', ' ', $req['nama_produk']);
        $req['stok_produk'] = intval(str_replace('\\s', ' ', $req['stok_produk']));
        $req['harga_produk'] = str_replace('\\s', ' ', $req['harga_produk']);
        $req['harga_produk'] = str_replace('Rp', '', $req['harga_produk']);
        $req['harga_produk'] = str_replace(' ', '', $req['harga_produk']);
        $req['harga_produk'] = intval(str_replace('.', '', $req['harga_produk']));

        $req['keterangan_produk'] = str_replace('\\s', ' ', $req['keterangan_produk']);

        return Produk::store($req);
    }

    public function update(Request $request)
    {
        $req = $request->all();

        $req['nama_produk'] = str_replace('\\s', ' ', $req['nama_produk']);
        $req['stok_produk'] = intval(str_replace('\\s', ' ', $req['stok_produk']));
        $req['harga_produk'] = str_replace('\\s', ' ', $req['harga_produk']);
        $req['harga_produk'] = str_replace('Rp', '', $req['harga_produk']);
        $req['harga_produk'] = str_replace(' ', '', $req['harga_produk']);
        $req['harga_produk'] = intval(str_replace('.', '', $req['harga_produk']));

        $req['keterangan_produk'] = str_replace('\\s', ' ', $req['keterangan_produk']);


        return Produk::update('id_produk', $req['id'], $req);
    }


    public function drop(Request $request)
    {
        $req = $request->all();
        return Produk::drop('id_produk', $req['id']);
    }
}
