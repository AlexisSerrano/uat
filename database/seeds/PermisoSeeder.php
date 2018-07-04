<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermisoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');
        //Creación de permisos
        Permission::create(['name' => 'index.carpeta']);
        Permission::create(['name' => 'index.libro']);
        
        //Creación de roles
        $coordinador = Role::create(['name' => 'coordinador']);
        $facilidador = Role::create(['name' => 'facilitador']);
        $orientador = Role::create(['name' => 'orientador']);
        $recepcion = Role::create(['name' => 'recepcion']);
        
        // Asignación de permisos a Rol de Fiscal Coordinador
        $coordinador->givePermissionTo(Permission::all());
        // Asignación de permisos a Rol de Fiscal Facilitador
        $facilidador->givePermissionTo(['index.carpeta', 'index.libro']);
        // Asignación de permisos a Rol de Fiscal Orientador
        $orientador->givePermissionTo(['index.carpeta', 'index.libro']);
        // Asignación de permisos a Rol de Recepción
        $recepcion->givePermissionTo(['index.carpeta', 'index.libro']);

        // asignar rol
        // $user->assignRole('orientador');

        //reasignar rol
        // $usuario->syncRoles(['orientador']);

    }
}
