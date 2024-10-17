<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaterialsTableSeeder extends Seeder
{
    public function run()
    {
        $materials = [
            [
                'name' => 'Material A',
                'description' => 'Descripción del Material A',
                'image' => '/default/profile.png',
                'material_category_id' => 1, // ID de categoría correspondiente
                'weight' => 1.50, // Peso en kg
                'value' => 10.00, // Valor en la moneda correspondiente
            ],
            [
                'name' => 'Material B',
                'description' => 'Descripción del Material B',
                'image' => '/default/profile.png',
                'material_category_id' => 2, // ID de categoría correspondiente
                'weight' => 2.00,
                'value' => 15.00,
            ],
            [
                'name' => 'Material C',
                'description' => 'Descripción del Material C',
                'image' => '/default/profile.png',
                'material_category_id' => 3, // ID de categoría correspondiente
                'weight' => 0.75,
                'value' => 5.00,
            ],
            [
                'name' => 'Material A',
                'description' => 'Descripción del Material A',
                'image' => '/default/profile.png',
                'material_category_id' => 1, // ID de categoría correspondiente
                'weight' => 1.50, // Peso en kg
                'value' => 10.00, // Valor en la moneda correspondiente
            ],
            [
                'name' => 'Material B',
                'description' => 'Descripción del Material B',
                'image' => '/default/profile.png',
                'material_category_id' => 2, // ID de categoría correspondiente
                'weight' => 2.00,
                'value' => 15.00,
            ],
            [
                'name' => 'Material C',
                'description' => 'Descripción del Material C',
                'image' => '/default/profile.png',
                'material_category_id' => 3, // ID de categoría correspondiente
                'weight' => 0.75,
                'value' => 5.00,
            ],
            [
                'name' => 'Material A',
                'description' => 'Descripción del Material A',
                'image' => '/default/profile.png',
                'material_category_id' => 1, // ID de categoría correspondiente
                'weight' => 1.50, // Peso en kg
                'value' => 10.00, // Valor en la moneda correspondiente
            ],
            [
                'name' => 'Material B',
                'description' => 'Descripción del Material B',
                'image' => '/default/profile.png',
                'material_category_id' => 2, // ID de categoría correspondiente
                'weight' => 2.00,
                'value' => 15.00,
            ],
            [
                'name' => 'Material C',
                'description' => 'Descripción del Material C',
                'image' => '/default/profile.png',
                'material_category_id' => 3, // ID de categoría correspondiente
                'weight' => 0.75,
                'value' => 5.00,
            ],
            [
                'name' => 'Material A',
                'description' => 'Descripción del Material A',
                'image' => '/default/profile.png',
                'material_category_id' => 1, // ID de categoría correspondiente
                'weight' => 1.50, // Peso en kg
                'value' => 10.00, // Valor en la moneda correspondiente
            ],
            [
                'name' => 'Material B',
                'description' => 'Descripción del Material B',
                'image' => '/default/profile.png',
                'material_category_id' => 2, // ID de categoría correspondiente
                'weight' => 2.00,
                'value' => 15.00,
            ],
            [
                'name' => 'Material C',
                'description' => 'Descripción del Material C',
                'image' => '/default/profile.png',
                'material_category_id' => 3, // ID de categoría correspondiente
                'weight' => 0.75,
                'value' => 5.00,
            ],
            [
                'name' => 'Material A',
                'description' => 'Descripción del Material A',
                'image' => '/default/profile.png',
                'material_category_id' => 1, // ID de categoría correspondiente
                'weight' => 1.50, // Peso en kg
                'value' => 10.00, // Valor en la moneda correspondiente
            ],
            [
                'name' => 'Material B',
                'description' => 'Descripción del Material B',
                'image' => '/default/profile.png',
                'material_category_id' => 2, // ID de categoría correspondiente
                'weight' => 2.00,
                'value' => 15.00,
            ],
            [
                'name' => 'Material C',
                'description' => 'Descripción del Material C',
                'image' => '/default/profile.png',
                'material_category_id' => 3, // ID de categoría correspondiente
                'weight' => 0.75,
                'value' => 5.00,
            ],
            [
                'name' => 'Material A',
                'description' => 'Descripción del Material A',
                'image' => '/default/profile.png',
                'material_category_id' => 1, // ID de categoría correspondiente
                'weight' => 1.50, // Peso en kg
                'value' => 10.00, // Valor en la moneda correspondiente
            ],
            [
                'name' => 'Material B',
                'description' => 'Descripción del Material B',
                'image' => '/default/profile.png',
                'material_category_id' => 2, // ID de categoría correspondiente
                'weight' => 2.00,
                'value' => 15.00,
            ],
            [
                'name' => 'Material C',
                'description' => 'Descripción del Material C',
                'image' => '/default/profile.png',
                'material_category_id' => 3, // ID de categoría correspondiente
                'weight' => 0.75,
                'value' => 5.00,
            ],
            [
                'name' => 'Material A',
                'description' => 'Descripción del Material A',
                'image' => '/default/profile.png',
                'material_category_id' => 1, // ID de categoría correspondiente
                'weight' => 1.50, // Peso en kg
                'value' => 10.00, // Valor en la moneda correspondiente
            ],
            [
                'name' => 'Material B',
                'description' => 'Descripción del Material B',
                'image' => '/default/profile.png',
                'material_category_id' => 2, // ID de categoría correspondiente
                'weight' => 2.00,
                'value' => 15.00,
            ],
            [
                'name' => 'Material C',
                'description' => 'Descripción del Material C',
                'image' => '/default/profile.png',
                'material_category_id' => 3, // ID de categoría correspondiente
                'weight' => 0.75,
                'value' => 5.00,
            ],
            [
                'name' => 'Material A',
                'description' => 'Descripción del Material A',
                'image' => '/default/profile.png',
                'material_category_id' => 1, // ID de categoría correspondiente
                'weight' => 1.50, // Peso en kg
                'value' => 10.00, // Valor en la moneda correspondiente
            ],
            [
                'name' => 'Material B',
                'description' => 'Descripción del Material B',
                'image' => '/default/profile.png',
                'material_category_id' => 2, // ID de categoría correspondiente
                'weight' => 2.00,
                'value' => 15.00,
            ],
            [
                'name' => 'Material C',
                'description' => 'Descripción del Material C',
                'image' => '/default/profile.png',
                'material_category_id' => 3, // ID de categoría correspondiente
                'weight' => 0.75,
                'value' => 5.00,
            ],

        ];


        DB::table('materials')->insert($materials);
    }
}
