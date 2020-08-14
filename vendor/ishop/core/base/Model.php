<?php

namespace ishop\base;

use ishop\Db;

abstract class Model
{
    public $attributes = [];
    public $error = [];
    public $rules = [];

    public function __construct()
    {
        Db::instance();
    }

    public function load($data)
    {
        foreach ($this->attributes as $name => $value) {
            if (isset($data[$name])) {
                $this->attributes[$name] = $data[$name];
            }
        }
    }
}