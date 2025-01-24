<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TablaSlider extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('slides')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
        // ===================================================================================
        $datas = [
            [
                'slide' => 'principal',
                'url' => 'imagenes/extranet/slide1.jpg',
                'titulo' => 'AVALÚOS COMERCIALES Y CORPORATIVOS',
                'texto' => null

            ],[
                'slide' => 'principal',
                'url' => 'imagenes/extranet/slide2.png',
                'titulo' => 'AVALÚOS HIPOTECARIOS',
                'texto' => 'Estudios para creditos de vivienda, industria y comercio'

            ],[
                'slide' => 'principal',
                'url' => 'imagenes/extranet/slide3.jpg',
                'titulo' => 'PROYECTOS MASIVOS',
                'texto' => 'Estudios de valor predial'

            ],[
                'slide' => 'principal',
                'url' => 'imagenes/extranet/slide4.jpg',
                'titulo' => 'GESTION DE TERRITORIO - P.O.T',
                'texto' => 'Formalización y legalización de predios, planes de desarrollo'

            ],[
                'slide' => 'principal',
                'url' => 'imagenes/extranet/slide5.jpg',
                'titulo' => 'VALORIZACIÓN DE ACTIVOS',
                'texto' => 'Avaluos e inventario de inmuebles, equipos de oficcina y maquinaria'

            ],[
                'slide' => 'principal',
                'url' => 'imagenes/extranet/slide6.jpg',
                'titulo' => 'GESTIÓN INMOBILIARIA',
                'texto' => 'Compra y venta de inmuebles'

            ],[
                'slide' => 'principal',
                'url' => 'imagenes/extranet/slide7.jpg',
                'titulo' => 'OBRAS CIVILES',
                'texto' => 'Licencias de construccion , interventoria y ejecución de obras civiles'

            ],
        ];
        // ===================================================================================
        foreach ($datas as $data) {
            DB::table('slides')->insert([
                'slide' => $data['slide'],
                'url' => $data['url'],
                'titulo' => $data['titulo'],
                'texto' => $data['texto'],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
