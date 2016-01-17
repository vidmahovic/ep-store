<?php

use App\Admin;
use App\User;
use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = 'Sudo';
        $user->surname = 'Su';
        $user->email = 'sudo.su@gmail.com';
        $user->password = 'sudo123';
        $user->verified = true;
        $user->save();
        $admin = new Admin;
        $admin->cert_auth = 'sudo.su@gmail.com';
        $admin->save();
        $admin->user()->save($user);
    }
}
