<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run()
    {
        Service::create([
            'name' => 'Man Haircut',
            'price_local' => 60000.00,
            'price_foreigner' => 120000.00
        ]);
        Service::create([
            'name' => 'Woman Haircut',
            'price_local' => 70000.00,
            'price_foreigner' => 150000.00
        ]);
        Service::create([
            'name' => 'Children Haircut',
            'price_local' => 50000.00,
            'price_foreigner' => 100000.00
        ]);
        Service::create([
            'name' => 'Hair Spa',
            'price_local' => 40000.00,
            'price_foreigner' => 100000.00
        ]);
        Service::create([
            'name' => 'Beard Line Up',
            'price_local' => 30000.00,
            'price_foreigner' => 60000.00
        ]);
        Service::create([
            'name' => 'Coloring',
            'price_local' => 300000.00,
            'price_foreigner' => 500000.00
        ]);
    }
}
