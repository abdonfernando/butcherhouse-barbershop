<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'service_id',
        'barber_id',
        'status',
        'booking_date',
    ];

    // Relasi dengan User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi dengan Service
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    // Relasi dengan Barber
    public function barber()
    {
        return $this->belongsTo(Barber::class);
    }
}
