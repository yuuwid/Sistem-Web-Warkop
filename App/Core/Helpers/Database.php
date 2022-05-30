<?php

namespace Core\Helpers;

use PDODB\PDOConnect;

class Database
{

    public static function query(string $query)
    {
        $pdo = new PDOConnect();

        $pdo->query($query);

        return $pdo;
    }
}
