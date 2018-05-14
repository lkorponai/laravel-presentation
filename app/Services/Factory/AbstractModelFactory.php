<?php

namespace App\Services\Factory;


use Illuminate\Database\Eloquent\Model;

abstract class AbstractModelFactory
{
    /**
     * @param array $rawData
     * @return Model
     */
    abstract public static function createModel(array $rawData);
}