<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Menjalankan semua seeder
        $this->call([
            UserSeeder::class,
            BarberSeeder::class,
            ServiceSeeder::class,
            BookingSeeder::class,
        ]);
    }
}
