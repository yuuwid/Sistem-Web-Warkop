<?php

namespace Controllers;

use Lawana\Controller\BaseController,
    Lawana\Utils\Request;
use Lawana\Utils\Session;
use Models\KodeTransaksi;
use Models\Pegawai;
use Models\Penjualan;

class TransaksiController extends BaseController
{

    public function cetak_struk(Request $request) 
    {
        $req = $request->all();

        ob_flush();
        $penjualan = Penjualan::allWhere('id_penjualan', $req['id_penjualan']);

        $penjualan = $penjualan[ array_key_first($penjualan) ];
        $pegawai = Pegawai::getWhere('id_pegawai', $req['id_pegawai']);

        $penjualan['pegawai'] = $pegawai;
        $penjualan['kode_transaksi'] = KodeTransaksi::create($penjualan);

        if (!Session::has('cetak-struk')){
            Session::make('cetak-struk', $req['id_penjualan']);
            sleep(2);
        } else {
            if (Session::get('cetak-struk') == $req['id_penjualan']){
                sleep(0);
            } else {
                Session::make('cetak-struk', $req['id_penjualan']);
                sleep(3);
            }
        }
        
        return view('kasir.struk', $penjualan);
    }
}
