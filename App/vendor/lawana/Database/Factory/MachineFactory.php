<?php

namespace Lawana\Database\Factory;

use Core\Helpers\Database;

class MachineFactory extends SampleFactory
{

    protected function store(array $data)
    {
        $db = new Database();

        $query = $this->process($data);

        var_dump($query);
        $result = $db::query($query)->execute();
    }
}
