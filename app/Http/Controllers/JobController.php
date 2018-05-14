<?php

namespace App\Http\Controllers;


use App\Jobs\ProcessUser;
use App\Models\User;

class JobController extends Controller
{

    public function dispatchJob()
    {
        //using factory from previous example to generate dummy user
        $user = factory(User::class)->make();
        $user->save();

        ProcessUser::dispatch($user);

        return $user->toArray();
    }

}