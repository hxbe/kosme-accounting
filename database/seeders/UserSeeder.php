<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'firstname' => 'maman',
            'lastname' => 'greget',
            'username' => 'maman',
            'email' => 'mamangreget@gmail.com',
            'email_verified_at' => date("Y-m-d H:i:s"),
            'password' => Hash::make('maman'),
            'role' => 'supervisor',
            'status' => 'active',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
