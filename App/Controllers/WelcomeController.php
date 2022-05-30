<?php

namespace Controllers;

use Lawana\Controller\BaseController,
    Lawana\Utils\Request;
use Lawana\Utils\Redirect;
use Lawana\Utils\Session;

class WelcomeController extends BaseController
{

    public function index(Request $request)
    {
        if (!Session::has('nama-pelanggan')) {

            return view('home.index');
        } else {
            Redirect::to('/dashboard');
        }
    }

    public function mulai_pesan(Request $request)
    {
        Session::make('nama-pelanggan', $request->get('nama-pelanggan'));
        Session::make('keranjang', []);

        Redirect::to('/dashboard');
    }

    public function cetak_antrian(Request $request)
    {
        $data = $request->all();
        return view('dashboard.antrian', $data);
    }
    
    public function akhiri_pesan(Request $request)
    {
        Session::drop('nama-pelanggan');
        Session::drop('keranjang');
        Session::drop('temp_transaksi');
        Session::drop('temp_penjualan');
        Session::drop('temp_detail_penjualan');

        Redirect::to('/');
    }
}
