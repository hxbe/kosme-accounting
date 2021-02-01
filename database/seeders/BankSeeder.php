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
            [
                'name' => 'Bank Central Asia',
                'abbr' => 'BCA',
                'logo' => 'app-assets/images/logo/bca.png',
            ],
            [
                'name' => 'Bank Mandiri',
                'abbr' => 'Mandiri',
                'logo' => 'app-assets/images/logo/mandiri.png',
            ],
        ]);
    }
}
