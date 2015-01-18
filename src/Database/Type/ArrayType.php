<?php

namespace Gourmet\KitchenSink\Database\Type;

use Cake\Database\Driver;
use Cake\Database\Type;
use PDO;

class ArrayType extends Type
{

    /**
     * {@inheritdoc}
     */
    public function toPHP($value, Driver $driver)
    {
        if ($value === null) {
            return null;
        }
        return unserialize($value);
    }

    /**
     * {@inheritdoc}
     */
    public function toDatabase($value, Driver $driver)
    {
        return serialize($value);
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
