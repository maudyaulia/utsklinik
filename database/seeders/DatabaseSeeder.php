<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Pasien;
use App\Models\Daftar;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Menambahkan data pasien dan poli di DatabaseSeeder
        \App\Models\Pasien::factory()->count(10)->create();
        \App\Models\Poli::factory()->count(5)->create();
        \App\Models\Daftar::factory()->count(5)->create();
    }
}
