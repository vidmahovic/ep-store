<?php

use Illuminate\Database\Seeder;

class MunicipalitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Municipality::class, 50)->create()->each(function($mun) {
            $mun->residents()->save(factory(App\Customer::class)->make());
        });
    }
}
