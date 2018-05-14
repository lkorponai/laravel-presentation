<?php

namespace App\Services;


use App\Services\Factory\ApiUserFactory;

class PlaceHolderApiService
{

    public static function getUser()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://jsonplaceholder.typicode.com/users/1');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        curl_close($ch);

        return ApiUserFactory::createModel(json_decode($response, true));
    }

}