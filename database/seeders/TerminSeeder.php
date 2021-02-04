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
            'name' => 'N/30',
            'value' => '100000',
            'start' => '2021-3-2',
            'end' => '2021-4-2',
            'status' => '0',
            'keterangan' => '',
            'invoice' => '9635',
        ]);
    }
}
