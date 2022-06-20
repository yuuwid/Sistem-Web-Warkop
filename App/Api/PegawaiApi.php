<?php

namespace Api;

use Lawana\Api\BaseApi;
use Lawana\Utils\Request;
use Models\Pegawai;

class PegawaiApi extends BaseApi
{


    public function get(Request $request)
    {
        return Pegawai::getWhere('id_pegawai', $request->get('id'));
    }

    

    public function store(Request $request)
    {
        $req = $request->all();

        $data = [
            ':id_jabatan' => $req['id_jabatan'],
            ':nama_pegawai' => str_replace('\\s', ' ', $req['nama_pegawai']),
            ':nik' => str_replace('\\s', ' ', $req['nik']),
            ':notelp_pegawai' => str_replace('\\s', ' ', $req['notelp_pegawai']),
            ':alamat_pegawai' => str_replace('\\s', ' ', $req['alamat_pegawai']),
        ];

        return Pegawai::store($data);
    }

    public function update(Request $request)
    {
        $req = $request->all();

        $id_pegawai = $req['id'];

        $data = [
            'id_jabatan' => $req['id_jabatan'],
            'nama_pegawai' => str_replace('\\s', ' ', $req['nama_pegawai']),
            'nik' => str_replace('\\s', ' ', $req['nik']),
            'notelp_pegawai' => str_replace('\\s', ' ', $req['notelp_pegawai']),
            'alamat_pegawai' => str_replace('\\s', ' ', $req['alamat_pegawai']),
        ];

        return Pegawai::update($id_pegawai, $data);
    }

    public function drop(Request $request)
    {
        Pegawai::drop($request->get('id'));
        return true;
    }
}
