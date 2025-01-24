<?php

namespace Database\Seeders;

use App\Models\Parametros\Regional;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TablaAreasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('areas')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

        $datas = [
            [
                'area_id' => null,
                'area' => 'Dirección',
            ],
        ];

        $regionales = Regional::get();
        foreach ($regionales as $regional) {
            foreach ($datas as $data) {
                DB::table('areas')->insert([
                    'area_id' => $data['area_id'],
                    'regional_id' => $regional->id,
                    'area' => $data['area'],
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ]);
            }
        }
    }
}
