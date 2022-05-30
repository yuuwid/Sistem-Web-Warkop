<?php

namespace Models;

use Lawana\Model\BaseModel;

class Pembelian extends BaseModel
{

    private static function sql()
    {
        $query = "SELECT * FROM pembelian
        LEFT JOIN supplier s on pembelian.id_supplier = s.id_supplier
        LEFT JOIN produk p on pembelian.id_produk = p.id_produk
        LEFT JOIN pegawai p2 on pembelian.id_pegawai = p2.id_pegawai
        ";

        return $query;
    }

    public static function all()
    {
        $query = self::sql() . 'ORDER BY status';

        $results = self::query($query)->execute()->fetch(FETCH_ALL);

        return $results;
    }

    public static function get($key, $val, $sep = '=')
    {
        $query = self::sql() . "WHERE {$key} {$sep} {$val}";

        $results = self::query($query)->execute()->fetch(FETCH_ALL);

        return $results;
    }

    public static function update_status($id_pembelian, $status)
    {
        $query = "UPDATE pembelian SET status = {$status} WHERE id_pembelian = {$id_pembelian}";

        $results = self::query($query)->execute()->fetch(FETCH_ALL);

        return $results;
    }
}
