<?php

namespace Models;

use Lawana\Model\BaseModel;

class Supplier extends BaseModel
{

    public static function all()
    {
        $query = "SELECT * FROM supplier";

        return self::query($query)->execute()->fetch(FETCH_ALL);
    }




    public static function storeifExist($nama_supplier, $alamat_supplier, $notelp_supplier)
    {
        $data = [
            ':nama_supplier' => $nama_supplier,
            ':alamat_supplier' => $alamat_supplier,
            ':notelp_supplier' => $notelp_supplier
        ];

        $query = "INSERT INTO supplier (nama_supplier, alamat_supplier, notelp_supplier)
        SELECT * FROM (SELECT :nama_supplier, :alamat_supplier, :notelp_supplier) AS p
        WHERE NOT EXISTS (
            SELECT nama_supplier, alamat_supplier, notelp_supplier FROM supplier WHERE nama_supplier = :nama_supplier AND alamat_supplier = :alamat_supplier AND notelp_supplier = :notelp_supplier
            ) LIMIT 1";

        self::query($query)->execute($data);

        return self::query("SELECT id_supplier FROM supplier WHERE nama_supplier = :nama_supplier AND alamat_supplier = :alamat_supplier AND notelp_supplier = :notelp_supplier")
            ->execute($data)->fetch()['id_supplier'];
    }
}
