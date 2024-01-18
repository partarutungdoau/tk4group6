<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name'  => 'Halim Perdana',
            'email' => 'halim@gmail.com',
            'role'  => 'Admin',
            'phone' => '081233226745',
            'gender'=> 'MALE',
            'password' => md5('halim@gmail.com'),
        ]);

        $user = User::create([
            'name'  => 'Arya Kamandanu',
            'email' => 'arya@gmail.com',
            'role'  => 'Staff',
            'phone' => '081234526744',
            'gender'=> 'MALE',
            'password' => md5('arya@gmail.com'),
        ]);
    }
}
