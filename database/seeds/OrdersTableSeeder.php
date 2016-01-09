<?php

use App\Customer;
use App\Employee;
use App\Product;
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
        $order_states = App\OrderState::lists('name')->toArray();
        $customer_ids = Customer::lists('id')->toArray();
        $employee_ids = Employee::lists('id')->toArray();
        $products = Product::all();

        factory(App\Order::class, 80)->create()->each(function($order) use($customer_ids, $employee_ids, $order_states, $products) {
            $order->products()->attach($products->shuffle()->first(), ['quantity' => rand(1,30)]);
            $order->customer_id = shuffle($customer_ids)[0];
            $order->employee_id = shuffle($employee_ids)[0];
            $order->state_id = shuffle($order_states)[0];
        });
    }
}
