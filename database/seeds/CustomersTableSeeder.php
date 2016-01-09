<?php

use App\Customer;
use App\Employee;
use App\Municipality;
use App\Product;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employee_ids = Employee::all()->lists('id')->toArray();
        $products = Product::all();
        $municipalities = Municipality::all();

        factory(App\Customer::class, 50)->create()->each(function ($customer) use($employee_ids, $products, $municipalities){
            shuffle($employee_ids);
            $customer->user()->save(factory(User::class, 'customer')->create());
            $customer->city_id = $municipalities->shuffle()->first()->id;
            $customer->save();
            $customer->products()->attach($products->shuffle()->first(), ['vote' => rand(1,5), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
            $customer->orders()->save(factory(App\Order::class)->create([
                'acquired_by' => $employee_ids[0],
            ]));
        });

        $user = new User;
        $user->name = 'Vid';
        $user->surname = 'Mahovic';
        $user->email = 'vid.mahovic@gmail.com';
        $user->password = 'vid123';
        $user->save();

        $customer = new Customer;
        $customer->street = 'Celovška 21';
        $customer->city_id = $municipalities->shuffle()->first()->id;
        $customer->phone = '+38640850993';
        $customer->save();
        $customer->user()->save($user);
    }
}