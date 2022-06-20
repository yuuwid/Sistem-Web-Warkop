<?php

require_once __DIR__ . '/Config/load.php';

require_once str_replace('Core', '', __DIR__) . 'vendor/autoload.php';

$faker = \Faker\Factory::create(env('FAKER_LOCALE', 'en_US'));

$kernel = new \Lawana\Kernel\Kernel();


$kernel->start();
