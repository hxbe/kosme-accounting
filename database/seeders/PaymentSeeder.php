<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('purchases')->insert([
            'type' => '28/PO/022020',
            'date' => '2021-3-20',
            'value' => '1945041',
            'bank' => '8161989789',
            'accountpayable' => '1',
            'termin' => '1',
        ]);
    }
}
