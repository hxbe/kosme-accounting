<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            'name' => 'PT. Kosmetika Global Indonesia',
            'abbr' => 'kgi',
            'logo' => 'app-assets/images/logo/kosme.png',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('companies')->insert([
            'name' => 'CV. Kosmetika Global Pack',
            'abbr' => 'ksp',
            'logo' => 'app-assets/images/logo/kosmepack.png',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
