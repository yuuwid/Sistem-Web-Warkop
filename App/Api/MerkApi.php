<?php

namespace Api;

use Lawana\Api\BaseApi;
use Lawana\Utils\Request;
use Models\Merk;

class MerkApi extends BaseApi
{

    public function all(Request $request)
    {
        $req = $request->all();
        return Merk::all();
    }

    public function get(Request $request)
    {
        $req = $request->all();
        return Merk::get('id_merk', $req['id']);
    }

    public function range(Request $request)
    {
        $req = $request->all();
        return Merk::range($req['start'], $req['end']);
    }

    public function store(Request $request)
    {
        $req = $request->all();
        return Merk::store($req['nama_merk']);
    }

    public function update(Request $request)
    {
        $req = $request->all();
        return Merk::update('id_merk', $req['id'], $req['nama_merk']);
    }

    public function drop(Request $request)
    {
        $req = $request->all();
        return Merk::drop('id_merk', $req['id']);
    }
}
