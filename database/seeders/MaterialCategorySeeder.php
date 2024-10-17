<?php

namespace Database\Seeders;

use App\Models\MaterialCategory;
use Illuminate\Database\Seeder;

class MaterialCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MaterialCategory::create([
            'name' => 'Plástico',
            'description' => 'Material reciclable que incluye botellas, bolsas y envases de plástico.',
        ]);

        MaterialCategory::create([
            'name' => 'Cartón',
            'description' => 'Material reciclable que incluye cajas de cartón, envases de papel y cartón.',
        ]);

        MaterialCategory::create([
            'name' => 'Vidrio',
            'description' => 'Material reciclable que incluye botellas y frascos de vidrio.',
        ]);
    }
}
