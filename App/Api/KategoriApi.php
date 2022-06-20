<?php

namespace Api;

use Lawana\Api\BaseApi;
use Lawana\Utils\Request;
use Models\Kategori;

class KategoriApi extends BaseApi
{

    public function all(Request $request)
    {
        $req = $request->all();
        return Kategori::all();
    }

    public function get(Request $request)
    {
        $req = $request->all();
        return Kategori::get('id_kategori', $req['id']);
    }


    public function range(Request $request)
    {
        $req = $request->all();
        return Kategori::range($req['start'], $req['end']);
    }

    public function store(Request $request)
    {
        $req = $request->all();
        return Kategori::store($req['jenis_kategori']);
    }

    public function update(Request $request)
    {
        $req = $request->all();
        return Kategori::update('id_kategori', $req['id'], $req['jenis_kategori']);
    }


    public function drop(Request $request)
    {
        $req = $request->all();
        return Kategori::drop('id_kategori', $req['id']);
    }
}
