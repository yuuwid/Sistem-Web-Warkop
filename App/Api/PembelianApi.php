<?php

namespace Api;

use Lawana\Api\BaseApi;
use Lawana\Utils\Request;
use Models\KodePembelian;
use Models\Pembelian;
use Models\Produk;

class PembelianApi extends BaseApi
{


    public function get(Request $request)
    {
        $data = Pembelian::get('id_pembelian', $request->get('id'));

        if (sizeof($data) == 1) {
            $data = $data[0];
            $data['kode_pembelian'] = KodePembelian::create($data);
        }
        
        return $data;
    }

    public function update_status(Request $request)
    {   
        Pembelian::update_status($request->get('id'), $request->get('status'));
        Produk::update_stock_produk_by_id_pembelian($request->get('id'));

        return true;
    }
}
