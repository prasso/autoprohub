<?php

namespace Prasso\AutoProHub\Database\Seeders;

use Illuminate\Database\Seeder;
use Prasso\AutoProHub\Models\Customer;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::factory()->count(10)->create();
    }
}
