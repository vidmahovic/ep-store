<?php

use Illuminate\Database\Seeder;

class VotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Vote::class, 5)->create()->each(function($vote) {
            $vote->voter()->associate(factory(App\Customer::class)->make());
            $vote->product()->associate(factory(App\Product::class)->make());
        });
    }
}
