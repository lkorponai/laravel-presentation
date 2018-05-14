<?php

namespace App\Facades;


use App\Services\PlaceHolderApiService;
use Illuminate\Support\Facades\Facade;

class PlaceHolderApiFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return PlaceHolderApiService::class;
    }
}