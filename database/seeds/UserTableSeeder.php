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
    }
}
