<?php

namespace Lawana\Database\Seeder;

class SampleFaker
{


    public function produce($n)
    {
        $class_ = get_class($this);
        $data = [];

        for ($i = 0; $i < $n; $i++) {
            $temp = $class_::seed();

            $data[] = $temp;

        }

        return $data;
    }
}
