<?php

namespace App\Http\Controllers;


class RawSqlController extends Controller
{

    public function selectUsers()
    {
        $users = \DB::select('select * from users');

        return $this->returnResponse($users);
    }

    public function insertUser()
    {
        $count = \DB::insert(
            'insert into users (name, bio) values (:name, :bio)',
            [
                'name' => str_random(10),
                'bio' => str_random(rand(100, 300)),
            ]
        );

        return $this->returnResponse($count);
    }

    public function updateUsers()
    {
        $count = \DB::update(
            'update users set name = :name where char_length(bio) > 120',
            [
                'long bio',
            ]
        );

        return $this->returnResponse($count);
    }

    public function deleteUsers()
    {
        $count = \DB::update('delete from users where length(bio) > 150');

        return $this->returnResponse($count);
    }

    protected function returnResponse($data)
    {
        return sprintf('<pre>%s</pre>', print_r($data, true));
    }

}