<?php

namespace Database\Seeder;

use Lawana\Database\Seeder\SampleFaker;

class ExampleSeeder extends SampleFaker
{

    public static function seed()
    {
        $data = [
            'col1' => faker()->name(),
            'col2' => faker()->address(),
        ];

        return $data;
    }

}
