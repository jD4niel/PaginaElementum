<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
        'name' => 'Daniel',
        'last_name' => 'Acosta',
        'second_last_name' => 'Contreras',
        'email' => 'dany@gmail.com',
        'password' => bcrypt('secret'),
        'role_id' => '1'
        ]);
        \App\User::create([
        'name' => 'Mayte',
        'last_name' => 'Romo',
        'second_last_name' => '',
        'email' => 'mayte@gmail.com',
        'password' => bcrypt('secret'),
        'role_id' => '1'
        ]);
        \App\User::create([
        'name' => 'Jovany',
        'last_name' => 'Cruz',
        'second_last_name' => '',
        'email' => 'jovany@gmail.com',
        'password' => bcrypt('secret'),
        'role_id' => '2'
        ]);
        \App\User::create([
        'name' => 'Alejandra',
        'last_name' => 'Olguín',
        'second_last_name' => '',
        'email' => 'ale@gmail.com',
        'password' => bcrypt('secret'),
        'role_id' => '3'
        ]);
    }
}
