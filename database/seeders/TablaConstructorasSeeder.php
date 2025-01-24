<?php

namespace Database\Seeders;

use App\Models\Constructoras\ConstrucAreas;
use App\Models\Constructoras\ConstrucCargos;
use App\Models\Constructoras\Constructora;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TablaConstructorasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('constructoras')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

        $datas = [
            ['regional_id' => 1,
             'tipo_documento_id' => 6,
             'identificacion' => '800.185.296-1',
             'constructora' => 'Amarilo S.A.S',
             'contacto' =>'Pepe Grillo',
             'email' =>'constructora@gmail.com',
             'telefono' => '3219875421'],

        ];

        foreach ($datas as $data) {
            $constructora = Constructora::create([
                'regional_id' => $data['regional_id'],
                'tipo_documento_id' => $data['tipo_documento_id'],
                'identificacion' => $data['identificacion'],
                'constructora' => $data['constructora'],
                'contacto' => $data['contacto'],
                'email' => $data['email'],
                'telefono' => $data['telefono'],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
            $area = ConstrucAreas::create([
                'constructora_id' => $constructora->id,
                'area' => 'Dirección',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
            $cargo = ConstrucCargos::create([
                'area_id' => $area->id,
                'cargo' => 'Director',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
