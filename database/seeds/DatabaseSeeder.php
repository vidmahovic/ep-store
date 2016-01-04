<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(CustomersTableSeeder::class);
        //$this->call(EmployeesTableSeeder::class);
        //$this->call(OrderStatesTableSeeder::class);
        //$this->call(OrdersTableSeeder::class);
        //$this->call(AdminsTableSeeder::class);
        //$this->call(MunicipalitiesTableSeeder::class);
        //$this->call(UsersCustomersTableSeeder::class);
        //$this->call(ProductsTableSeeder::class);
        //$this->call(ProductsTableSeeder::class);
        //$this->call(VotesTableSeeder::class);

        Model::reguard();
    }
}
