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
        DB::table('payments')->insert([
            [
                'type' => 'transfer',
                'date' => date('Y-m-d H:i:s'),
                'value' => 900000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'termin' => 1,
                'bank_account' => '8161989789',
            ],
        ]);
    }
}
