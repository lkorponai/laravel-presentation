<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->insertViaQueryBuilder();

        $this->insertViaFactory();
    }

    private function insertViaQueryBuilder()
    {
        \DB::table('users')->insert([
            [
                'name' => str_random(10),
                'bio'  => str_random(rand(100, 300)),
            ]
        ]);
    }

    private function insertViaFactory()
    {
        factory(User::class, 10)->create()->each(function (User $u) {
            $u->posts()->save(factory(Post::class)->make());
        });
    }
}
