<?php

namespace Controllers;

use Lawana\Controller\BaseController,
    Lawana\Utils\Request;
use Lawana\Message\Flasher;
use Lawana\Utils\Redirect;
use Lawana\Utils\Session;
use Models\Pegawai;

class KasirController extends BaseController
{

    private function middleware($key)
    {
        if (Session::has($key)) {
            Redirect::to('/kasir/dashboard');
        }
    }


    public function index(Request $request)
    {
        $this->middleware('kasir');
        $data = [
            'title' => 'Login'
        ];
        
        return view('kasir.login', $data);
    }

    public function login_auth(Request $request)
    {
        $data = Pegawai::get($request->get('notelp'), $request->get('nik'));

        // validate
        if ($data != false) {
            if ($data['jenis_jabatan'] == 'Kasir') {
                Session::make('kasir', $data);

                Redirect::to('/kasir/dashboard');
            } else {
                Flasher::create('login-kasir', 'Anda bukan seorang Kasir', 'r', 'e');
            }
        } else {
            Flasher::create('login-kasir', 'Notelp atau NIK anda tidak terdaftar', 'y');
        }
        Redirect::to('/kasir');
    }

    public function logout_auth()
    {
        Session::drop('kasir');
        Redirect::to('/kasir');
    }
}
