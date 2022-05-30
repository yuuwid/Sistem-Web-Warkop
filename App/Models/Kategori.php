<?php

namespace Models;

use Lawana\Model\BaseModel;

class Kategori extends BaseModel
{

    public static function all()
    {
        $query = "SELECT * FROM kategori";

        $data = self::query($query)->execute()->fetch(FETCH_ALL);

        return $data;
    }

    public static function get($key, $val)
    {
        $query = "SELECT * FROM kategori WHERE {$key} = {$val}";

        $data = self::query($query)->execute()->fetch(FETCH_ALL);

        return $data;
    }

    public static function count()
    {
        $query = "SELECT COUNT(*) total FROM kategori";

        $data = self::query($query)->execute()->fetch();

        return $data;
    }

    public static function range($start, $end)
    {
        $start -= 1;
        $query = "SELECT * FROM kategori ORDER BY id_kategori ASC LIMIT {$start}, {$end}";

        $data = self::query($query)->execute()->fetch(FETCH_ALL);

        return $data;
    }

    public static function store($jenis_kategori)
    {
        $query = "INSERT INTO kategori (jenis_kategori) VALUES (:jenis_kategori)";

        $result = self::query($query)->execute([
            ':jenis_kategori' => $jenis_kategori
        ]);

        return $result;
    }
    

    public static function update($key, $val, $jenis_kategori)
    {
        $query = "UPDATE kategori SET jenis_kategori = :jenis_kategori WHERE {$key} = {$val}";

        $result = self::query($query)->execute([
            ':jenis_kategori' => $jenis_kategori
        ]);

        return $result;
    }

    public static function drop($key, $val)
    {
        $query = "DELETE FROM merk WHERE {$key} = {$val}";

        $result = self::query($query)->execute();

        return $result;
    }
}
