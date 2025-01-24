<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class TablaRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('roles')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

        // ===================================================================================
        $rol1 = Role::create(['name' => 'Administrador Sistema']);
        $rol2 = Role::create(['name' => 'Administrador']);
        $rol3 = Role::create(['name' => 'Empleado']);
        $rol4 = Role::create(['name' => 'Usuario']);
        $rol5 = Role::create(['name' => 'Arquitecto']);
        $rol6 = Role::create(['name' => 'Empleado Constructora']);
        // =======================================================================================================
        Permission::create(['name' => 'dashboard'])->syncRoles([$rol1, $rol2, $rol3, $rol4, $rol5, $rol6]);
        // ===================================================================================
        //Areas
        Permission::create(['name' => 'area.edit'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'area.destroy'])->syncRoles([$rol1, $rol2]);
        // =======================================================================================================
        //Cargos
        Permission::create(['name' => 'cargo.index'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'cargo.edit'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'cargo.destroy'])->syncRoles([$rol1, $rol2]);
        // =======================================================================================================
        //Empleados
        Permission::create(['name' => 'empleado.index'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'empleado.create'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'empleado.edit'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'empleado.store'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'empleado.update'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'empleado.destroy'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'empleado.activar'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'empleado.getEmpleadosRegional'])->syncRoles([$rol1, $rol2]);
        // =======================================================================================================
        //Usuarios
        Permission::create(['name' => 'usuario.index'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'usuario.create'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'usuario.edit'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'usuario.store'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'usuario.update'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'usuario.destroy'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'usuario.activar'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'usuario.getUsuariosRegional'])->syncRoles([$rol1, $rol2]);
        // =======================================================================================================
        //Arquitectos
        Permission::create(['name' => 'arquitecto.index'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'arquitecto.create'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'arquitecto.edit'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'arquitecto.store'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'arquitecto.update'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'arquitecto.destroy'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'arquitecto.activar'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'arquitecto.getArquitectosRegional'])->syncRoles([$rol1, $rol2]);
        // =======================================================================================================
        //Compañias
        Permission::create(['name' => 'compania.index'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'compania.create'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'compania.edit'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'compania.store'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'compania.update'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'compania.destroy'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'compania.activar'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'compania.getArquitectosRegional'])->syncRoles([$rol1, $rol2]);
        // =======================================================================================================
        //Compañias -> Áreas
        Permission::create(['name' => 'empresas_areas.index'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'empresas_areas.create'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'empresas_areas.edit'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'empresas_areas.store'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'empresas_areas.update'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'empresas_areas.destroy'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'empresas_areas.activar'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'empresas_areas.getArquitectosRegional'])->syncRoles([$rol1, $rol2]);
        // =======================================================================================================
    }
}
