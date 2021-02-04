<?php

namespace Database\Seeders;

use App\Models\AccountPayable;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            BankSeeder::class,
            CompanySeeder::class,
            CategorySeeder::class,
            SuplierSeeder::class,
            ItemSeeder::class,
            PurchaseSeeder::class,
            InvoiceSeeder::class,
            TerminSeeder::class,
            // PaymentSeeder::class,
        ]);
    }
}
