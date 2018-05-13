<?php

namespace App\Http\Controllers;


class QueryBuilderController extends Controller
{

    public function selectUsers()
    {
        $users = \DB::table('users')
            ->whereRaw('length(bio) >= 150')
            ->orderBy('id', 'desc')
            ->get();

        return $this->returnResponse($users);
    }

    public function insertUser()
    {
        $return = \DB::table('users')->insert([
            [
                'name' => str_random(10),
                'bio'  => str_random(rand(100, 300)),
            ],
            [
                'name' => str_random(10),
                'bio'  => str_random(rand(100, 300)),
            ],
        ]);

        return $this->returnResponse($return);
    }

    public function updateUsers()
    {
        $count = \DB::table('users')
            ->whereRaw('length(bio) > 120')
            ->update(['name' => 'long bio']);

        return $this->returnResponse($count);
    }

    public function deleteUsers()
    {
        $count = \DB::table('users')
            ->whereRaw('length(bio) > 150')
            ->delete();

        return $this->returnResponse($count);
    }

    protected function returnResponse($data)
    {
        return sprintf('<pre>%s</pre>', print_r($data, true));
    }

}