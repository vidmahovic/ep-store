<?php

use Illuminate\Database\Seeder;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Employee::class, 15)->create()->each(function ($employee) {
            $employee->user()->save(factory(App\User::class, 'employee')->make());
        });
    }
}
