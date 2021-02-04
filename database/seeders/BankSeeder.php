<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banks')->insert([
            'no' => '8161989789',
            'name' => 'accounting kosme',
            'bank' => 'bca',
        ]);
        DB::table('banks')->insert([
            'no' => '1440595988889',
            'name' => 'accounting kosme',
            'bank' => 'mandiri',
        ]);
    }
}
