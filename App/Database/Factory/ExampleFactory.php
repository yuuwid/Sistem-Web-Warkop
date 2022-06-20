<?php

namespace Database\Factory;

use Database\Seeder\ExampleSeeder;
use Lawana\Database\Factory\MachineFactory;

class ExampleFactory extends MachineFactory
{


    public function production()
    {
        $example = new ExampleSeeder();
        $data = $example->produce(2);

        $this->store($data);
    }
}
