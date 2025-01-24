<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            TablaSlider::class,
            TablaTiposDocuSeeder::class,
            TablaRolesSeeder::class,
            TablaDepartamentosSeeder::class,
            TablaMunicipiosSeeder::class,
            TablaRegionalesSeeder::class,
            TablaAreasSeeder::class,
            TablaCargosSeeder::class,
            MenuSeeder::class,
            TablaConstructorasSeeder::class,
            TablaUsuariosSeeder::class,
            TablaTipoInmueblesSeeder::class,


        ]);
    }
}
