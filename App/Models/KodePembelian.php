<?php

namespace Models;

use Lawana\Model\BaseModel;

/*
 * aturan kode_pembelian : {tanggal_pembelian}.{id_supplier}.{id_pegawai}
 * tanggal_penjualan = d-m-y -> 8 digit
 * id_supplier 000001
 * id_pegawai = 01
 * }
 */

class KodePembelian extends BaseModel
{

    public static function create($data)
    {
        $tanggal_penjualan = date_format(date_create($data['tanggal_pembelian']), 'dmy');
        $id_supplier = self::format($data['id_supplier'], 6);
        $id_pegawai = self::format($data['id_pegawai'], 2);
     
        $kode = $tanggal_penjualan . $id_supplier . $id_pegawai;

        return $kode;
    }

    private static function format($num, $length)
    {
        $str = strval($num);

        if (strlen($str) < $length){
            $range = $length - strlen($str);
            $zeros = str_repeat('0', $range);

            $str = $zeros . $str;
        }

        return $str;
    }
}
