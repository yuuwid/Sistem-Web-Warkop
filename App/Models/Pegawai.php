<?php

namespace Models;

use Lawana\Model\BaseModel;

class Pegawai extends BaseModel
{

    public static function all()
    {
        $query = "SELECT * FROM pegawai 
                    LEFT JOIN jabatan ON pegawai.id_jabatan = jabatan.id_jabatan";

        $result = self::query($query)->execute()->fetch(FETCH_ALL);

        return $result;
    }

    
    public static function get($notelp, $nik)
    {
        $query = "SELECT * FROM pegawai 
                    LEFT JOIN jabatan ON pegawai.id_jabatan = jabatan.id_jabatan
                    WHERE notelp_pegawai = :notelp AND nik = :nik";

        $result = self::query($query)->execute([
            ':notelp' => $notelp,
            ':nik' => $nik
        ])->fetch();

        return $result;
    }


    public static function getWhere($key, $val, $sep = '=')
    {
        $query = "SELECT * FROM pegawai WHERE {$key} {$sep} {$val}";

        $result = self::query($query)->execute()->fetch();
        return $result;
    }

    public static function count()
    {
        $query = "SELECT COUNT(id_pegawai) jumlah_pegawai FROM pegawai";

        $result = self::query($query)->execute()->fetch();
        return $result;
    }

    public static function jabatan()
    {
        $query = "SELECT * FROM jabatan";

        $result = self::query($query)->execute()->fetch(FETCH_ALL);
        return $result;
    }

    public static function store($data) 
    {
        $query = "INSERT INTO pegawai(id_jabatan, nama_pegawai, nik, notelp_pegawai) VALUES (:id_jabatan, :nama_pegawai, :nik, :notelp_pegawai)";

        return self::query($query)->execute($data);
    }

    public static function update($id_pegawai, $data) 
    {
        $query = "UPDATE pegawai SET id_jabatan = :id_jabatan, nama_pegawai = :nama_pegawai, nik = :nik, notelp_pegawai = :notelp_pegawai
                    WHERE id_pegawai = {$id_pegawai}";

        return self::query($query)->execute($data);
    }

    public static function drop($id_pegawai) 
    {
        $query = "DELETE FROM pegawai WHERE id_pegawai = {$id_pegawai}";

        return self::query($query)->execute();
    }
}
