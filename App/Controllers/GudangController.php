<?php

namespace Controllers;

use Lawana\Controller\BaseController,
    Lawana\Utils\Request;
use Lawana\Message\Flasher;
use Lawana\Utils\Redirect;
use Lawana\Utils\Session;
use Models\Pegawai;

class GudangController extends BaseController
{

    private function middleware($key)
    {
        if (Session::has($key)) {
            Redirect::to('/gudang/dashboard');
        }
    }

    public function login(Request $request)
    {
        $this->middleware('gudang');

        return view('gudang.login', ['title' => 'Gudang Login']);
    }

    public function login_auth(Request $request)
    {
        $data = Pegawai::get($request->get('notelp'), $request->get('nik'));

        // validate
        if ($data != false) {
            if ($data['jenis_jabatan'] == 'Staf Gudang') {
                Session::make('gudang', $data);

                Redirect::to('/gudang/dashboard?action=dashboard');
            } else {
                Flasher::create('login-gudang', 'Anda bukan seorang Staf Gudang', 'r', 'e');
            }
        } else {
            Flasher::create('login-gudang', 'Notelp atau NIK anda tidak terdaftar', 'y');
        }
        Redirect::to('/gudang');
    }

    public function logout_auth()
    {
        Session::drop('gudang');
        Redirect::to('/gudang');
    }
}
