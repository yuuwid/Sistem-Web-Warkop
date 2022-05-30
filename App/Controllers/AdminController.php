<?php

namespace Controllers;

use Lawana\Controller\BaseController,
    Lawana\Utils\Request;
use Lawana\Message\Flasher;
use Lawana\Utils\Redirect;
use Lawana\Utils\Session;
use Models\Pegawai;

class AdminController extends BaseController
{
    private function middleware($key)
    {
        if (Session::has($key)) {
            Redirect::to('/admin/dashboard');
        }
    }

    public function index(Request $request)
    {
    }

    public function login()
    {
        $this->middleware('admin');
        $data = [
            'title' => 'Login'
        ];
        
        return view('admin.login', $data);
    }


    public function login_auth(Request $request)
    {
        $data = Pegawai::get($request->get('notelp'), $request->get('nik'));

        // validate
        if ($data != false) {
            if ($data['jenis_jabatan'] == 'Admin') {
                Session::make('admin', $data);

                Redirect::to('/admin/dashboard?action=dashboard');
            } else {
                Flasher::create('login-admin', 'Anda bukan seorang admin', 'r', 'e');
            }
        } else {
            Flasher::create('login-admin', 'Notelp atau NIK anda tidak terdaftar', 'y');
        }
        Redirect::to('/admin');
    }

    public function logout_auth()
    {
        Session::drop('admin');
        Redirect::to('/admin');
    }
}
