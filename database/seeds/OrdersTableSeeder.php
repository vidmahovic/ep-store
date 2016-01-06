<?php

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $city_ids = App\Municipality::lists('id');
        $order_states = App\OrderState::lists('name');

        factory(App\Order::class, 80)->make()->each(function($order) {
           $order->products()->save(factory(App\Product::class)->create());
        });

/*        factory(App\Order::class, 80)->create()->each(function($order) use($city_ids, $order_states) {
            shuffle($city_ids);
            shuffle($order_states);
            $order->state_id = head($order_states);
            $order->products()->attach(factory(App\Product::class)->create(), ['quantity' => rand(1,15)]);
            $order->subscriber()->save(factory(App\Customer::class)->create(['city_id' => head($city_ids)]));
            $order->acquirer()->save(factory(App\Employee::class)->create());
        });*/
    }
}
