<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Booking;

class BookingSeeder extends Seeder
{
    public function run()
    {
        Booking::create([
            'barber_id' => 1, // Don
            'service_id' => 1, // Man Haircut
            'status' => 'Pending'
        ]);
        Booking::create([
            'barber_id' => 2, // Vaiz
            'service_id' => 2, // Woman Haircut
            'status' => 'Confirmed'
        ]);
    }
}
