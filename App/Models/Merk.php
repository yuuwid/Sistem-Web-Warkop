<?php

namespace Models;

use Lawana\Model\BaseModel;

class Merk extends BaseModel
{

    public static function all()
    {
        $query = "SELECT * FROM merk";

        $data = self::query($query)->execute()->fetch(FETCH_ALL);

        return $data;
    }

    public static function get($key, $val)
    {
        $query = "SELECT * FROM merk WHERE {$key} = {$val}";

        $data = self::query($query)->execute()->fetch(FETCH_ALL);

        return $data;
    }

    public static function count()
    {
        $query = "SELECT COUNT(*) total FROM merk";

        $data = self::query($query)->execute()->fetch();

        return $data;
    }

    public static function range($start, $end)
    {
        $start -= 1;
        $query = "SELECT * FROM merk ORDER BY id_merk ASC LIMIT {$start}, {$end}";

        $data = self::query($query)->execute()->fetch(FETCH_ALL);

        return $data;
    }

    public static function drop($key, $val)
    {
        $query = "DELETE FROM merk WHERE {$key} = {$val}";

        $result = self::query($query)->execute();

        return $result;
    }

    public static function update($key, $val, $nama_merk)
    {
        $query = "UPDATE merk SET nama_merk = :nama_merk WHERE {$key} = {$val}";

        $result = self::query($query)->execute([
            ':nama_merk' => $nama_merk
        ]);

        return $result;
    }

    public static function store($nama_merk)
    {
        $query = "INSERT INTO merk (nama_merk) VALUES (:nama_merk)";

        $result = self::query($query)->execute([
            ':nama_merk' => $nama_merk
        ]);

        return $result;
    }
}
