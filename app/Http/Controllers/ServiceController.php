<?php

namespace App\Http\Controllers;


use App\Services\PlaceHolderApiService;

class ServiceController extends Controller
{

    public function userApiCall()
    {
        $apiService = resolve(PlaceHolderApiService::class);

        $user = $apiService->getUser();

        return $user->toJson();
    }

    public function userApiFacadeCall()
    {
        $user = \PlaceholderApi::getUser();

        return $user->toJson();
    }

}