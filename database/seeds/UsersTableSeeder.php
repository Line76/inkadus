<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        //Authenticable user
        $user = factory(\App\User::class)->create(['email' => 'email@example.com']);
        $user->enterprises()->attach(factory(
                \App\Enterprise::class)->create()
                , ['is_admin' => 1]
        );
        factory(\App\Skill::class, random_int(2, 5))->create(['user_id' => $user]);


        factory(\App\User::class, 30)->create()->each(function ($user) {
            $user->enterprises()->attach(
                    factory(\App\Enterprise::class)->create(),
                    ['is_admin' => 1]
            );

            factory(\App\Skill::class, random_int(2, 5))->create(['user_id' => $user]);
        });
    }
}
