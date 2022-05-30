<?php

namespace Models;

use Lawana\Model\BaseModel;

class AppWeb extends BaseModel
{

    public static function antrian()
    {
        $query = "SELECT antrian FROM app";
        return self::query($query)->execute()->fetch();
    }

    public static function update_antrian($antrian)
    {
        $query = "UPDATE app SET antrian = {$antrian}";
        return self::query($query)->execute();
    }

    public static function reset_antrian()
    {
        $query = "UPDATE app SET antrian = 1";
        return self::query($query)->execute();
    }
}
