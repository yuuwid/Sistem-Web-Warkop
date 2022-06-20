<?php

namespace Models;

use Lawana\Model\BaseModel;

class Jabatan extends BaseModel
{


    public static function all()
    {
        $query = "SELECT * FROM jabatan";

        $result = self::query($query)->execute()->fetch(FETCH_ALL);
        return $result;
    }

    public static function store($data)
    {
        $query = "INSERT INTO jabatan(jenis_jabatan) VALUES (:jenis_jabatan)";

        $result = self::query($query)->execute($data);

        return $result;
    }
}
