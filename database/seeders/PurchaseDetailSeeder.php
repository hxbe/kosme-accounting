<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PurchaseDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('purchase_details')->insert([
            [
                'quantity' => '9',
                'subtotal' => '900000',
                'tax' => '90000',
                'unit_subtotal' => 1,
                'item' => 1,
                'purchase' => '31/PO/012020',
            ],
            [
                'quantity' => '2',
                'subtotal' => '200000',
                'tax' => '20000',
                'unit_subtotal' => 1,
                'item' => 1,
                'purchase' => '12/PO/022020',
            ],
            [
                'quantity' => '1',
                'subtotal' => '150000',
                'tax' => '30000',
                'unit_subtotal' => 1,
                'item' => 2,
                'purchase' => '12/PO/022020',
            ],
        ]);
    }
}
