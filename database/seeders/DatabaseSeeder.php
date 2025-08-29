<?php

namespace Prasso\AutoProHub\Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            CustomerSeeder::class,
        ]);
    }
}
