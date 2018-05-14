<?php

namespace App\Services;


use App\Services\Factory\ApiUserFactory;

class PlaceHolderApiService
{
    /** @var string */
    private $endpoint;

    public function __construct($endpoint)
    {
        $this->endpoint = $endpoint;
    }

    public function getUser()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->endpoint);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        curl_close($ch);

        return ApiUserFactory::createModel(json_decode($response, true));
    }

}