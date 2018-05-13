<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class DummyController extends Controller
{

    public function goodbyeWorld()
    {
        return "Goodbye World!";
    }

    public function sayGoodbye($name = 'Guest')
    {
        return "Goodbye {$name}!";
    }

    public function redirectToGoodbyeWorld()
    {
        return redirect()->route('target', ['name' => 'Universe', 'param' => 'dummy']);
    }

    public function redirectTarget($name, Request $request)
    {
        return print_r([
            'name' => $name,
            'param' => $request->get('param')
        ], true);
    }

}