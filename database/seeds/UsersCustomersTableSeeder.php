<?php

use Illuminate\Database\Seeder;

class UsersCustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 'customer', 50)->create()->each(function($user) {
            $user->userable()->associate(factory(App\Customer::class)->make());
        });
    }
}
