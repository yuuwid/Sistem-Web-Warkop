<?php

namespace Lawana\Model;

use Core\Helpers\Database;

class BaseModel
{
    // Custom tabel database yang akan digunakan oleh Model
    protected $table = '';

    // Izinkan atribut database supaya DAPAT diisi menggunakan auto query
    protected $visible = [];
    // Sembunyikan atribut database supaya TIDAK DAPAT diisi menggunakan auto query
    protected $hidden = [];

    // Izinkan supaya dapat melakukan multiple insert menggunakan auto query
    protected $stack = false;

    public function __construct()
    {
        $table = str_replace('Models\\', '', get_class($this));
        $this->table = strtolower($table);
    }

    protected static function query($query)
    {
        return Database::query($query);
    }
}
