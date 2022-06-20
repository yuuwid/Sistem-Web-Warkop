<?php

namespace Lawana\Database\Factory;

class SampleFactory
{

    protected function process(array $data)
    {
        $table = $this->table();
        $query = "INSERT INTO {$table} (";

        $cols = array_keys($data[0]);

        foreach ($cols as $col) {
            $query .= $col . ',';
        }

        $query = substr($query, 0, strlen($query) - 1) . ') VALUES ';

        $values = '';
        foreach ($data as $val) {
            $temp = '(';
            foreach ($cols as $col) {
                if (is_string($val[$col])) {
                    $temp .= '"' . $val[$col] . '",';
                } elseif (is_int($val[$col])) {
                    $temp .= $val[$col] . ',';
                }
            }
            $temp = substr($temp, 0, strlen($temp) - 1) . ')';

            $values .= $temp . ', ';
        }
        
        $values = substr($values, 0, strlen($values) - 2);
        $query .= $values;

        return $query;
    }

    private function table()
    {
        $child = get_class($this);

        $child = str_replace('Database\\Factory\\', '', $child);
        $child = str_replace('Factory', '', $child);
        $child = strtolower($child);
        
        return $child;
    }
}
