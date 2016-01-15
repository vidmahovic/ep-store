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

        $this->call(OrderStatesTableSeeder::class);
        $this->call(MunicipalitiesTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(AdminsTableSeeder::class);
        $this->call(EmployeesTableSeeder::class);
        $this->call(CustomersTableSeeder::class);

        Model::reguard();
    }
}
