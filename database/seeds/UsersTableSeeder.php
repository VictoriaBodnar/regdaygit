<?php

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
        /* factory(App\User::class, 50)->create()->each(function ($u) {
	        $u->posts()->save(factory(App\Post::class)->make());
	    });*/
        static $password;
        DB::table('users')->insert([
                        'name' => 'Victoria',
                        'email' => 'asu_bodnar@voe.com.ua',
                        'password' => $password ?: $password = bcrypt('123456'),
                        'remember_token' => str_random(10),
                    ]);
         factory(App\User::class, 50)->create();

    }
}
