<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Barber;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    // Menampilkan daftar booking pengguna
    public function index()
    {
        $services = Service::all();
        $barbers = Barber::all();
        $bookings = Booking::where('user_id', Auth::id())->get(); // Daftar pemesanan pengguna

        return view('bookings.index', compact('services', 'barbers', 'bookings'));
    }

    // Menyimpan booking baru
    public function store(Request $request)
    {
        $request->validate([
            'services' => 'required|array',
            'barber_id' => 'required|exists:barbers,id',
            'status' => 'required|in:Pending,Confirmed,Canceled',
        ]);

        // Menyimpan booking untuk setiap layanan yang dipilih
        foreach ($request->services as $service_id) {
            Booking::create([
                'user_id' => Auth::id(),
                'service_id' => $service_id,
                'barber_id' => $request->barber_id,
                'status' => $request->status,
                'booking_date' => now(), // Waktu pemesanan
            ]);
        }

        return redirect()->route('bookings.index')->with('success', 'Booking berhasil dibuat!');
    }

    // Menampilkan form untuk mengedit booking
    public function edit($id)
    {
        $booking = Booking::findOrFail($id);
        $services = Service::all();
        $barbers = Barber::all();

        return view('bookings.edit', compact('booking', 'services', 'barbers'));
    }

    // Mengupdate data booking
    public function update(Request $request, $id)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'barber_id' => 'required|exists:barbers,id',
            'status' => 'required|in:Pending,Confirmed,Canceled',
        ]);

        $booking = Booking::findOrFail($id);
        $booking->update([
            'service_id' => $request->service_id,
            'barber_id' => $request->barber_id,
            'status' => $request->status,
        ]);

        return redirect()->route('bookings.index')->with('success', 'Booking berhasil diperbarui!');
    }

    // Menghapus atau membatalkan booking
    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return redirect()->route('bookings.index')->with('success', 'Booking berhasil dibatalkan!');
    }
}
