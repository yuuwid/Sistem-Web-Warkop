<?php

namespace Api;

use Lawana\Api\BaseApi;
use Lawana\Utils\Request;
use Models\Jabatan;

class JabatanApi extends BaseApi
{
    
    public function all(Request $request)
    {
        return Jabatan::all();
    }

    public function store(Request $request) 
    {
        $data = [
            ':jenis_jabatan' => $request->get('jenis_jabatan')
        ];

        return Jabatan::store($data);
    }

}
