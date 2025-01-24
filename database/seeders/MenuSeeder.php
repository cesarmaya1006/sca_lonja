<?php

namespace Database\Seeders;

use App\Models\Config\Menu;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('menus')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('menu_rol')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

        // ========== ========== ========== ========== ========== ========== ========== ========== ========== ========== ========== ==========
        $menus = [
            //Menu Inicio
            ['nombre' => 'Inicio', 'menu_id' => null, 'url' => '/dashboard', 'orden' => '1', 'icono' => 'fas fa-home', 'Array_1' => []],
            //Menu configuración 2
            [
                'nombre' => 'Configuración Sistema', 'menu_id' => null, 'url' => '#', 'orden' => '2', 'icono' => 'fas fa-tools',
                'Array_1' => [
                    //Menu menu
                    ['nombre' => 'Menús', 'menu_id' => '2',  'url' =>  'configuracion_sis/menu', 'orden' => '1',  'icono' => 'fas fa-list-ul', 'Array_1' => []],
                    //Menu Roles
                    ['nombre' => 'Roles Usuarios', 'menu_id' => '2',  'url' =>  'configuracion_sis/rol', 'orden' => '2',  'icono' => 'fas fa-user-tag', 'Array_1' => []],
                    //Menu Menu_Roles
                    ['nombre' => 'Menú - Roles', 'menu_id' => '2',  'url' =>  'configuracion_sis/menu_rol', 'orden' => '2',  'icono' => 'fas fa-chalkboard-teacher', 'Array_1' => []],
                    //Menu permisos
                    ['nombre' => 'Permisos', 'menu_id' => '2',  'url' =>  'configuracion_sis/permiso_rutas', 'orden' => '2',  'icono' => 'fas fa-lock', 'Array_1' => []],
                    //Menu permisos-rol
                    ['nombre' => 'Permisos -Rol', 'menu_id' => '2',  'url' =>  'configuracion_sis/_permiso-rol', 'orden' => '2',  'icono' => 'fas fa-user-lock', 'Array_1' => []],
                    //Menu Empresas
                    ['nombre' => 'Usuarios', 'menu_id' => '2',  'url' =>  'configuracion_sis/usuarios', 'orden' => '2',  'icono' => 'fas fa-user-friends', 'Array_1' => []],

                ],
            ],
            //PARAMETROS
            [
                'nombre' => 'Parametros', 'menu_id' => null, 'url' => '#', 'orden' => '3', 'icono' => 'fas fa-cogs',
                'Array_1' => [
                    //Menu Departamentos
                    ['nombre' => 'Departamentos', 'menu_id' => '2',  'url' =>  'parametros/departamentos', 'orden' => '1',  'icono' => 'fas fa-map', 'Array_1' => []],
                    //Menu Municipios
                    ['nombre' => 'Municipios', 'menu_id' => '2',  'url' =>  'parametros/municipios', 'orden' => '2',  'icono' => 'fas fa-map', 'Array_1' => []],
                    //Menu Regionales
                    ['nombre' => 'Regionales', 'menu_id' => '2',  'url' =>  'parametros/regionales', 'orden' => '1',  'icono' => 'fas fa-map', 'Array_1' => []],
                    //Menu Areas
                    ['nombre' => 'Áreas', 'menu_id' => '2',  'url' =>  'parametros/areas', 'orden' => '1',  'icono' => 'fas fa-sitemap', 'Array_1' => []],
                    //Menu Cargos
                    ['nombre' => 'Cargos', 'menu_id' => '2',  'url' =>  'parametros/cargos', 'orden' => '1',  'icono' => 'fas fa-sitemap', 'Array_1' => []],
                    //Menu Empleados
                    ['nombre' => 'Empleado', 'menu_id' => '2',  'url' =>  'parametros/empleados', 'orden' => '1',  'icono' => 'fas fa-user-tie', 'Array_1' => []],
                    //Menu Usuarios
                    ['nombre' => 'Usuarios', 'menu_id' => '2',  'url' =>  'parametros/usuarios', 'orden' => '1',  'icono' => 'fas fa-user-friends', 'Array_1' => []],
                    //Menu Arquitectos
                    ['nombre' => 'Arquitectos', 'menu_id' => '2',  'url' =>  'parametros/arquitectos', 'orden' => '1',  'icono' => 'fa-solid fa-person-digging', 'Array_1' => []],
                    //Menu Empresas
                    ['nombre' => 'Configuaración Empresas', 'menu_id' => '2',  'url' =>  '#', 'orden' => '1',  'icono' => 'fa-solid fa-industry',
                        'Array_1' => [
                            //Menu Arquitectos
                            ['nombre' => 'Empresas', 'menu_id' => '2',  'url' =>  'parametros/companias', 'orden' => '1',  'icono' => 'fa-solid fa-city', 'Array_1' => []],
                            //Menu Areas
                            ['nombre' => 'Empresas - Áreas', 'menu_id' => '2',  'url' =>  'parametros/empresas_areas', 'orden' => '1',  'icono' => 'fas fa-sitemap', 'Array_1' => []],
                            //Menu Cargos
                            ['nombre' => 'Empresas - Cargos', 'menu_id' => '2',  'url' =>  'parametros/empresas_cargos', 'orden' => '1',  'icono' => 'fas fa-sitemap', 'Array_1' => []],
                            //Menu Empleados
                            ['nombre' => 'Empresas - Empleado', 'menu_id' => '2',  'url' =>  'parametros/empresas_empleados', 'orden' => '1',  'icono' => 'fas fa-user-tie', 'Array_1' => []],

                        ]],

                ],


            ],
            // Otras Opciones
            [
                'nombre' => 'Otras opciones', 'menu_id' => null, 'url' => '#', 'orden' => '2', 'icono' => 'fas fa-question-circle',
                'Array_1' => [
                    //Menu menu
                    ['nombre' => 'Consulte nuestas políticas de datos', 'menu_id' => '2',  'url' =>  'usuario/consulta-politicas', 'orden' => '1',  'icono' => 'fas fa-question-circle', 'Array_1' => []],
                    //Menu Roles
                    ['nombre' => 'Ayuda', 'menu_id' => '2',  'url' =>  'usuario/ayuda', 'orden' => '2',  'icono' => 'fas fa-question-circle', 'Array_1' => []],
                    //Menu menu
                    ['nombre' => 'Actualizar datos', 'menu_id' => '2',  'url' =>  'usuario/actualizar-datos', 'orden' => '1',  'icono' => 'fas fa-edit', 'Array_1' => []],
                    //Menu Roles
                    ['nombre' => 'Cambiar contraseña', 'menu_id' => '2',  'url' =>  'usuario/cambiar-password', 'orden' => '2',  'icono' => 'fas fa-key', 'Array_1' => []],

                ],
            ],
        ];
        // ========== ========== ========== ========== ========== ========== ========== ========== ========== ========== ========== ==========
        $x = 0;
        foreach ($menus as $menu) {
            $x++;
            $menu_new = Menu::create([
                'menu_id' => $menu['menu_id'],
                'nombre' => utf8_encode(utf8_decode($menu['nombre'])),
                'url' => $menu['url'],
                'orden' => $x,
                'icono' => $menu['icono'],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
            if (count($menu['Array_1']) > 0) {
                $this->sub_menu($menu['Array_1'], $menu_new->id);
            }
        }
        // ========== ========== ========== ========== ========== ========== ========== ========== ========== ========== ========== ==========
        // -- * -- * -- * -- * -- * -- * -- * -- * -- * -- * -- * -- * -- * -- * -- * -- * -- * -- * -- * --
        $menus = Menu::get();
        // -- * -- * -- * -- * -- * -- * -- * -- * -- * -- * -- * -- * -- * -- * -- * -- * -- * -- * -- * --
        foreach ($menus as $menu) {
            DB::table('menu_rol')->insert(['menu_id' => $menu->id, 'rol_id' => 1,]);
        }
        // -- * -- * -- * -- * -- * -- * -- * -- * -- * -- * -- * -- * -- * -- * -- * -- * -- * -- * -- * --
        /*DB::table('menu_rol')->insert(['menu_id' => 1, 'rol_id' => 2,]);
        for ($i = 17; $i < 34; $i++) {
            DB::table('menu_rol')->insert(['menu_id' => $i, 'rol_id' => 2,]);
        }*/
        // -- * -- * -- * -- * -- * -- * -- * -- * -- * -- * -- * -- * -- * -- * -- * -- * -- * -- * -- * --
    }
    // * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
    public function sub_menu($Array_1, $x)
    {
        $y = 0;
        foreach ($Array_1 as $sub_menu_array) {
            $y++;
            $sub_menu = Menu::create([
                'menu_id' => $x,
                'nombre' => utf8_encode(utf8_decode($sub_menu_array['nombre'])),
                'url' => $sub_menu_array['url'],
                'orden' => $y,
                'icono' => $sub_menu_array['icono'],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
            if (count($sub_menu_array['Array_1']) > 0) {
                $this->sub_menu($sub_menu_array['Array_1'], $sub_menu->id);
            }
        }
    }
}
