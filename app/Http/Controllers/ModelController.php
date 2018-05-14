<?php

namespace App\Http\Controllers;


use App\Models\Phone;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;

class ModelController extends Controller
{

    public function selectUsers()
    {
        $users = User::whereRaw('length(bio) >= 150')->get();

        return $this->returnResponse($users);
    }

    public function insertUser()
    {
        $user = new User();
        $user->name = str_random(10);
        $user->bio = str_random(rand(100, 300));
        $user->save();

        return $this->returnResponse($user);
    }

    public function updateUsers()
    {
        $users = User::whereRaw('length(bio) >= 120')->get();

        foreach($users as $user){
            $user->name = 'long bio';
            $user->save();
        }

        return $this->returnResponse($users);
    }

    public function deleteUsers()
    {
        $count = User::whereRaw('length(bio) >= 120')->delete();

        return $this->returnResponse($count);
    }

    public function relation()
    {
        $user = new User();
        $user->name = 'relation';
        $user->bio = 'this user has relations';

        $phone = new Phone();
        $phone->number = '203727377';

        $tag1 = new Tag();
        $tag1->name = 'tag 1';

        $tag2 = new Tag();
        $tag2->name = 'tag 2';

        $post = new Post();
        $post->title = 'Post title';

        $user->save();

        $user->phone()->save($phone);

        $user->posts()->save($post);

        $post->tags()->saveMany([$tag1, $tag2]);

        return $this->returnResponse([
            'user' => $user->toArray(),
            'phone' => $phone->toArray(),
            'post' => $post->toArray(),
            'tags' => $post->tags->toArray()
        ]);
    }

    protected function returnResponse($data)
    {
        return sprintf('<pre>%s</pre>', print_r($data, true));
    }

}