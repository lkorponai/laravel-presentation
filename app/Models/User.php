<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $connection = 'pgsql';

    protected $table = 'users';

    public $timestamps = false;

    public function phone()
    {
        return $this->hasOne(Phone::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
