<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Admin::class, 1)->create()->each(function($admin) {
            $admin->user()->save(factory(App\User::class, 'admin')->make());
        });
    }
}
