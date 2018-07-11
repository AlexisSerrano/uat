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
        Permission::create(['name' => 'prueba1']);
        Permission::create(['name' => 'prueba2']);
        Permission::create(['name' => 'prueba3']);
        Permission::create(['name' => 'prueba4']);
        Permission::create(['name' => 'prueba5']);
        
        //Creación de roles
        $coordinador = Role::create(['name' => 'coordinador']);
        $facilidador = Role::create(['name' => 'facilitador']);
        $orientador  = Role::create(['name' => 'orientador']);
        $recepcion   = Role::create(['name' => 'recepcion']);
        
        // Asignación de permisos a Rol de Fiscal Coordinador
        $coordinador->givePermissionTo(Permission::all());
        // Asignación de permisos a Rol de Fiscal Facilitador
        $facilidador->givePermissionTo(['prueba1']);
        // Asignación de permisos a Rol de Fiscal Orientador
        $orientador->givePermissionTo(['prueba2','prueba5']);
        // Asignación de permisos a Rol de Recepción
        $recepcion->givePermissionTo(['prueba3','prueba4']);

        // asignar rol
        // $user->assignRole('orientador');

        //reasignar rol
        // $usuario->syncRoles(['orientador']);
        

    }
}
