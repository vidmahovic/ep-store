<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderStatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * ORDER STATE:
     *  - PENDING <--- finished by customer, but not yet processed by employee (NEOBDELANO NAROČILO)
     *  - CONFIRMED <--- successfully processed by employee (POTRJENO NAROČILO)
     *  - CANCELLED <--- cancelled by employee after successful processing (STORNIRANO NAROČILO)
     *  - DECLINED <--- cancelled by employee before processing (PREKLICANO NAROČILO)
     *
     * @return void
     */
    public function run()
    {
        $states = ['pending', 'confirmed', 'cancelled', 'declined'];

        foreach($states as $state) {
            DB::table('order_states')->insert([
                'name' => $state,
                'created_at' => Carbon::now()
            ]);
        }
    }
}