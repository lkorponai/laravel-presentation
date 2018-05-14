<?php

namespace App\Http\Controllers;


use App\Services\PlaceHolderApiService;

class ServiceController extends Controller
{

    public function userApiCall()
    {
        $user = PlaceHolderApiService::getUser();

        return $user->toJson();
    }

}