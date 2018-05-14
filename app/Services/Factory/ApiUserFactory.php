<?php

namespace App\Services\Factory;



use App\Models\Phone;
use App\Models\User;

class ApiUserFactory extends AbstractModelFactory
{
    public static function createModel(array $rawData)
    {
        $user = new User();
        $user->name = $rawData['name'];

        $phone = new Phone();
        $phone->number = substr($rawData['phone'], 0, 9);

        $user->phone = $phone;

        return $user;
    }
}