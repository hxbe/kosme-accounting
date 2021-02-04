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
            'no' => '9635',
            'date' => '2020-3-2',
            'due' => '2020-4-2',
            'purchase' => '28/PO/022020',
        ]);
    }
}
