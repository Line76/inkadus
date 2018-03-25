<?php

use Illuminate\Database\Seeder;

class EnterprisesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $enterprises = \App\Enterprise::all();

        $enterprises->each(function ($enterprise) {
            $users = factory(\App\User::class, rand(2, 6))->create();

            $enterprise->users()->attach($users);
        });
    }
}
