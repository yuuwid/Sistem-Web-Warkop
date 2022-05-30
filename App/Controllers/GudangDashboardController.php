<?php

namespace Controllers;

use Lawana\Controller\BaseController,
    Lawana\Utils\Request,
    Lawana\Utils\Redirect,
    Lawana\Utils\Session;
use Models\Pegawai;

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

        $data = [
            'staff' => Pegawai::getWhere('id_pegawai', Session::get('gudang')['id_pegawai'])
        ];

        return view('gudang.dashboard', $data);
    }
}
