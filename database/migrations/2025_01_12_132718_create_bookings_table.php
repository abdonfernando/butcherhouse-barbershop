<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relasi dengan User
            $table->foreignId('service_id')->constrained()->onDelete('cascade'); // Relasi dengan Service
            $table->foreignId('barber_id')->constrained()->onDelete('cascade'); // Relasi dengan Barber
            $table->enum('status', ['Pending', 'Confirmed', 'Canceled'])->default('Pending'); // Status booking
            $table->timestamp('booking_date')->nullable(); // Waktu booking
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
}
