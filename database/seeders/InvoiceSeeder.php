<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('invoices')->insert([
            [
                'no' => '1234',
                'date' => date('Y-m-d'),
                'due' => '2021-3-1',
                // 'status' => 1,
                // 'created_at' => date('Y-m-d H:i:s'),
                // 'updated_at' => date('Y-m-d H:i:s'),
                // 'purchase' => '31/PO/012020',
            ],
            [
                'no' => '2345',
                'date' => date('Y-m-d'),
                'due' => '2021-4-1',
                // 'status' => 1,
                // 'created_at' => date('Y-m-d H:i:s'),
                // 'updated_at' => date('Y-m-d H:i:s'),
                // 'purchase' => '31/PO/012020',
            ],
        ]);
    }
}
