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
            [
                'name' => 'PT. Maman Punya Indonesia',
            ],
        ]);
    }
}
