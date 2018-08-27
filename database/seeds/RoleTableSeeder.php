<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Role::create([
            'type' => 'root',
            'module' => 'sys',
            'description' => 'Rol para acceso total'
        ]);

        App\Role::create([
            'type' => 'Administrador',
            'module' => 'admon',
            'description' => 'Rol para acceso a todos los modulos del sistemas'
        ]);
        App\Role::create([
            'type' => 'Editor',
            'module' => 'edit',
            'description' => 'Rol para acceso y actualizacion del blog de la pagina'
        ]);

    }
}
