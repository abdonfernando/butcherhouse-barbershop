<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarberController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\BookingController;

// Auth routes
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);

// Route untuk halaman utama (halaman welcome atau dashboard)
Route::get('/', function () {
    return view('welcome');  // Pastikan welcome.blade.php ada
})->name('home');

// Middleware autentikasi untuk route yang membutuhkan login
Route::middleware(['auth'])->group(function () {
    // Booking routes (hanya dapat diakses oleh pengguna yang sudah login)
    Route::resource('bookings', BookingController::class);

    // Barber routes (hanya dapat diakses oleh pengguna yang sudah login)
    Route::resource('barbers', BarberController::class);

    // Service routes (hanya dapat diakses oleh pengguna yang sudah login)
    Route::resource('services', ServiceController::class);
});
