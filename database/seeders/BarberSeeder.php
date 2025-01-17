<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Barber;

class BarberSeeder extends Seeder
{
    public function run()
    {
        Barber::create(['name' => 'Don']);
        Barber::create(['name' => 'Vaiz']);
    }
}
