<?php

namespace Database\Seeders;

use App\Models\Proxi;
use Illuminate\Database\Seeder;

class ProxiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Proxi::factory(10)->create();
    }
}
