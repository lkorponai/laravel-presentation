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

}