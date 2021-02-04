<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SuplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('supliers')->insert([
            'name' => 'PT Maman Punya Indonesia',
            'category' => '1',
        ]);
        DB::table('supliers')->insert([
            'name' => 'PT Indonesia Punya Maman',
            'category' => '1',
        ]);
        DB::table('supliers')->insert([
            'name' => 'PT Maman Punya Semua',
            'category' => '2',
        ]);
    }
}
