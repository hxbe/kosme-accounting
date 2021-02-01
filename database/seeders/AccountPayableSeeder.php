<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountPayableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('account_payables')->insert([
            [
                'type' => 'piutang',
                'payment_status' => 'lunas',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'invoice' => '1234',
                'purchase' => '31/PO/012020',
                'deliver' => 1,
                'payment' => 1,
                'category' => 1,
                'suplier' => 1,
            ],
            [
                'type' => 'hutang',
                'payment_status' => 'belum dibayar',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'invoice' => '2345',
                'purchase' => '12/PO/022020',
                'deliver' => NULL,
                'payment' => NULL,
                'category' => 1,
                'suplier' => 1,
            ],
        ]);
    }
}
