<?php

use App\Customer;
use App\Employee;
use App\OrderState;
use App\Product;
use Carbon\Carbon;
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
        $order_states = OrderState::lists('id')->toArray();
        $customer_ids = Customer::lists('id')->toArray();
        $employee_ids = Employee::lists('id')->toArray();
        $products = Product::all();

        factory(App\Order::class, 80)->create()->each(function($order) use($customer_ids, $employee_ids, $order_states, $products) {
            $order->products()->attach($products->shuffle()->first(), ['quantity' => rand(1,30), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
            $order->ordered_by = shuffle($customer_ids)[0];
            $order->acquired_by = shuffle($employee_ids)[0];
            $order_key = array_rand($order_states);
            $order->state_id = $order_states[$order_key];
        });
    }
}
