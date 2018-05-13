<?php

namespace App\Http\Controllers;


class ViewController
{

    public function greet($name = 'James')
    {
        return view('pages.greeting', ['name' => $name]);
    }

    public function layout()
    {
        $users = [
            [
                'name' => 'John',
                'bio' => 'I like coffee',
            ],
            [
                'name' => 'Jessica',
                'bio' => 'I like to code!'
            ]
        ];

        return view('pages.layout_page', ['users' => $users]);
    }

}