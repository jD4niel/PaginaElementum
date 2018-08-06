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
            'name' => 'Luis Enrique',
            'last_name' => 'Aquino',
            'second_last_name' => 'Cortés',
            'phone_number' => '7717479983',
            'email'=>'aquino.lec@gmail.com',
            'password'=>bcrypt('QWErty23!'),
            'active'=>'1',
            'role_id'=>'1',
            'file_id' => 2
        ]);
    }
}
