<?php

use App\Employee;
use App\Municipality;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Employee::class, 20)->create()->each(function ($employee) {
            $employee->user()->save(factory(User::class, 'employee')->create());
        });

        $user = new User;
        $user->name = 'Erik';
        $user->surname = 'Drobne';
        $user->email = 'erik.drobne@gmail.com';
        $user->password = 'erik123';
        $user->verified = true;
        $user->save();
        $employee = new Employee;
        $employee->cert_auth = 'erik.drobne@gmail.com';
        $employee->save();
        $employee->user()->save($user);
    }
}
