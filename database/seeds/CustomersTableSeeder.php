<?php

use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Customer::class, 50)->create()->each(function ($customer) {
            $customer->user()->save(factory(App\User::class, 'customer')->create());
            $customer->city()->associate(factory(App\Municipality::class)->create());
            $customer->productVotes()->attach(factory(App\Product::class)->create(), ['vote' => rand(1,5)]);
            $customer->orders()->save(factory(App\Order::class)->create([
                'acquired_by' => factory(App\Employee::class)->make(),
            ]));
        });
    }
}