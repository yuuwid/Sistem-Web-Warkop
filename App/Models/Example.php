<?php

namespace Models;

use Lawana\Model\BaseModel;

class Example extends BaseModel
{

    public static function get()
    {
        return [1, 2, 3, 4, 5];
    }
}
