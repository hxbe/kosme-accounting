<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeliverDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('deliver_details')->insert([
            [
                'no' => '930921',
                'batch' => '1',
                'date' => date('Y-m-d H:i:s'),
                'quantity' => 9,
                // 'created_at' => date('Y-m-d H:i:s'),
                // 'updated_at' => date('Y-m-d H:i:s'),
                'deliver' => 1,
            ],
        ]);
    }
}
