<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardMitra;
use App\Http\Controllers\DashboardPengguna;
use App\Http\Controllers\HotelPenerbanganController;
use App\Http\Controllers\KetersediaanController;
use App\Http\Controllers\SuntingPenggunaController;
use App\Http\Controllers\SuntingMitraController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

// Login dan Logout
Route::get('login', 'App\Http\Controllers\UserController@login')->name('login');
Route::post('login', 'App\Http\Controllers\UserController@login_action')->name('login_action');
Route::get('logout', 'App\Http\Controllers\UserController@logout')->name('logout');

Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => ['cek_login:1']], function () {
        Route::get('admin', function () {
            return view('admin.home_admin');
        });

        // Kelola pengguna
        Route::get('sunting_pengguna', [SuntingPenggunaController::class, 'index'])->name('sunting_pengguna');
        Route::get('sunting_pengguna/add', [SuntingPenggunaController::class, 'create'])->name('add_pengguna');
        Route::post('sunting_pengguna/add', [SuntingPenggunaController::class, 'store'])->name('add_pengguna_action');
        Route::get('sunting_pengguna/{id}/edit', [SuntingPenggunaController::class, 'edit'])->name('edit_pengguna');
        Route::put('sunting_pengguna/{id}', [SuntingPenggunaController::class, 'update'])->name('edit_pengguna_action');
        Route::get('sunting_pengguna/{id}/delete', [SuntingPenggunaController::class, 'destroy'])->name('delete_pengguna');

        // Kelola mitra
        Route::get('sunting_mitra', [SuntingMitraController::class, 'index'])->name('sunting_mitra');
        Route::get('sunting_mitra/add', [SuntingMitraController::class, 'create'])->name('add_mitra');
        Route::post('sunting_mitra/add', [SuntingMitraController::class, 'store'])->name('add_mitra_action');
        Route::get('sunting_mitra/{id}/edit', [SuntingMitraController::class, 'edit'])->name('edit_mitra');
        Route::put('sunting_mitra/{id}', [SuntingMitraController::class, 'update'])->name('edit_mitra_action');
        Route::get('sunting_mitra/{id}/delete', [SuntingMitraController::class, 'destroy'])->name('delete_mitra');
    });

    Route::group(['middleware' => ['cek_login:2']], function () {
        Route::get('pengguna', [DashboardPengguna::class, 'dashboard_Pengguna']);

        // Home
        Route::get('home', [DashboardPengguna::class, 'dashboard_Pengguna'])->name('home');
        // Schedule
        Route::get('schedule', [DashboardPengguna::class, 'schedule_Pengguna'])->name('schedule_pengguna');

        // Kelola pemesanan
        Route::post('booking/{id}', [BookingController::class, 'booking'])->name('booking');
    });

    Route::group(['middleware' => ['cek_login:3']], function () {
        Route::get('mitra', [DashboardMitra::class, 'dashboard_Mitra']);

        // Kelola hotel dan penerbangan
        Route::get('hotel_penerbangan/add/{kategori}', [HotelPenerbanganController::class, 'create'])->name('add_hp');
        Route::post('hotel_penerbangan/add', [HotelPenerbanganController::class, 'store'])->name('add_hp_action');
        Route::get('hotel_penerbangan/{id}/edit/{kategori}', [HotelPenerbanganController::class, 'edit'])->name('edit_hp');
        Route::put('hotel_penerbangan/{id}', [HotelPenerbanganController::class, 'update'])->name('edit_hp_action');
        Route::get('hotel_penerbangan/{id}/delete', [HotelPenerbanganController::class, 'destroy'])->name('delete_hp');
    });
});

// status
Route::get('status', [DashboardMitra::class, 'booking_Status'])->name('status');
// home mitra
Route::get('home_mitra', [DashboardMitra::class, 'dashboard_Mitra'])->name('home_mitra');
// home admin
Route::get('home_admin', function () {
    return view('admin.home_admin');
})->name('home_admin');
// ketersediaan
Route::get('ketersediaan', [KetersediaanController::class, 'ketersediaan'])->name('ketersediaan');

// Pembatalan Bookinng Hotel & Pesawat
Route::get('schedule_pengguna/{id}/cancel', [BookingController::class, 'cancel'])->name('cancel');


// Delete Ketersediaan Kamar Hotel
Route::get('ketersediaan/{id}/delete_hotel', [KetersediaanController::class, 'delete_ketersediaan_kamar'])->name('delete_hotel');
// Delete Ketersediaan kursi Penerbangan
Route::get('ketersediaan/{id}/delete_penerbangan', [KetersediaanController::class, 'delete_ketersediaan_penerbangan'])->name('delete_penerbangan');

// Sunting Ketersediaan kamar Hotel
Route::get('Ketersediaan_Hotel_edit_form/{id}/edit', [KetersediaanController::class, 'edit'])->name('edit_ketersediaan_Hotel');
Route::put('Ketersediaan_Hotel_edit_form/{id}', [KetersediaanController::class, 'update'])->name('edit_ketersediaan_Hotel_action');

// Sunting Ketersediaan Kursi Penerbangan
Route::get('Ketersediaan_Pesawat_edit_form/{id}/edit', [KetersediaanController::class, 'edit_pesawat'])->name('edit_ketersediaan_Pesawat');
Route::put('Ketersediaan_Pesawat_edit_form/{id}', [KetersediaanController::class, 'update'])->name('edit_ketersediaan_Pesawat_action');