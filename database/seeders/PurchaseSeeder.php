<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PurchaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('purchases')->insert([
            [
                'no' => '31/PO/012020',
                'total' => '990000',
                // 'status' => 'utang',
                // 'created_at' => date('Y-m-d H:i:s'),
                // 'updated_at' => date('Y-m-d H:i:s'),
                // 'category' => 1,
                // 'suplier' => 1,
                'unit_total' => 1,
            ],
            [
                'no' => '12/PO/022020',
                'total' => '400000',
                // 'status' => 'piutang',
                // 'created_at' => date('Y-m-d H:i:s'),
                // 'updated_at' => date('Y-m-d H:i:s'),
                // 'category' => 1,
                // 'suplier' => 1,
                'unit_total' => 1,
            ],
        ]);
    }
}
