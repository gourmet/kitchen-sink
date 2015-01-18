<?php

namespace Gourmet\KitchenSink\Database\Type;

use Cake\Database\Driver;
use Cake\Database\Type;
use PDO;

class JsonType extends Type
{

    /**
     * {@inheritdoc}
     */
    public function toPHP($value, Driver $driver)
    {
        if ($value === null) {
            return null;
        }
        return json_decode($value, true);
    }

    /**
     * {@inheritdoc}
     */
    public function toDatabase($value, Driver $driver)
    {
        return json_encode($value);
    }

    /**
     * {@inheritdoc}
     */
    public function toStatement($value, Driver $driver)
    {
        if ($value === null) {
            return PDO::PARAM_NULL;
        }
        return PDO::PARAM_STR;
    }
}
