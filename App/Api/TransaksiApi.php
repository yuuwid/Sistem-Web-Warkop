<?php

namespace API;

use Lawana\API\BaseApi;
use Lawana\Utils\Request;
use Models\KodeTransaksi;
use Models\Penjualan;

class TransaksiApi extends BaseApi
{


    public function get_transaksi(Request $request)
    {
        $id_penjualan = $request->get('id_penjualan');
        $data = Penjualan::allWhere('id_penjualan', $id_penjualan);
        $key = array_key_first($data);
        $data = $data[$key];
        $data['kode_transaksi'] = KodeTransaksi::create($data);

        return $data;
    }

    public function search_transaksi_api(Request $request)
    {
        $search = $request->get('search');

        $results = Penjualan::search_with_api($search);
        $data = [];

        foreach ($results as $result) {
            $temp = $result;
            $temp['kode_transaksi'] = KodeTransaksi::create($result);

            $data[] = $temp;
        }

        return $data;
    }
}
