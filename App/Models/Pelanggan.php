<?php

namespace Models;

use Lawana\Model\BaseModel;

class Pelanggan extends BaseModel
{

    public static function storeifExist($nama_pelanggan)
    {
        $query = "INSERT INTO pelanggan (nama_pelanggan)
        SELECT * FROM (SELECT :nama_pelanggan) AS p
        WHERE NOT EXISTS (
            SELECT nama_pelanggan FROM pelanggan WHERE nama_pelanggan = :nama_pelanggan
            ) LIMIT 1";

        $result = self::query($query)->execute([':nama_pelanggan' => $nama_pelanggan]);

        return self::query("SELECT id_pelanggan FROM pelanggan WHERE nama_pelanggan = :nama_pelanggan")
                ->execute([':nama_pelanggan' => $nama_pelanggan])->fetch()['id_pelanggan'];
    }
}
