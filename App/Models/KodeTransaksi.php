<?php

namespace Models;

use Lawana\Model\BaseModel;

/*
 * aturan kode_penjualan : {no_antrian}.{tanggal_penjualan}.{id_pegawai}.{id_penjualan}
 * no_antrian = 01
 * tanggal_penjualan = d-m-y
 * id_pegawai = 01
 * id_penjualan 000001
 * }
 */

class KodeTransaksi extends BaseModel
{

    public static function create($data)
    {
        $no_antrian = self::format($data['no_antrian'], 2);
        $tanggal_penjualan = date_format(date_create($data['tanggal_penjualan']), 'dmy');
        $id_penjualan = self::format($data['id_penjualan'], 6);
        $id_pegawai = self::format($data['id_pegawai'], 2);
     
        $kode = $no_antrian . $tanggal_penjualan . $id_pegawai . $id_penjualan;

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
