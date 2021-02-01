<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TerminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('termins')->insert([
            [
                'name' => 'N/30',
                'value' => '900000',
                'start' => date('Y-m-d H:i:s'),
                'end' => '2021-3-1',
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'invoice' => '1234',
            ],
        ]);
    }
}
