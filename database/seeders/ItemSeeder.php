<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            [
                'name' => 'Sorbosil BFG-500',
                'price' => '100000',
                'unit_price' => 1,
                'unit_item' => 3,
                'suplier' => 1,
                'category' => 1,
            ],
            [
                'name' => 'ATL Sphere(B) White 2A (4BR',
                'price' => '150000',
                'unit_price' => 1,
                'unit_item' => 3,
                'suplier' => 1,
                'category' => 1,
            ],
        ]);
    }
}
