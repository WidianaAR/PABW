<?php

use App\Http\Controllers\KetersediaanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Login dan Logout
Route::get('login', 'App\Http\Controllers\UserController@login')->name('login');
Route::post('login', 'App\Http\Controllers\UserController@login_action')->name('login_action');
Route::get('logout', 'App\Http\Controllers\UserController@logout')->name('logout');

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['cek_login:1']], function () {
        Route::get('admin', function () {return view('home_admin');});
    });

    Route::group(['middleware' => ['cek_login:2']], function () {
        Route::get('pengguna', function () {return view('home');});
    });

    Route::group(['middleware' => ['cek_login:3']], function () {
        Route::get('mitra', function () {return view('home_mitra');});
    });
});

// Home
Route::get('home', function () {return view('home');}) -> name('home');
// Schedule
Route::get('schedule', function () {return view('schedule_pengguna');}) -> name('schedule_pengguna');
// status
Route::get('status', function () {return view('status');}) -> name('status');
// home mitra
Route::get('home_mitra', function () {return view('home_mitra');}) -> name('home_mitra');
// home admin
Route::get('home_admin', function () {return view('home_admin');}) -> name('home_admin');
// ketersediaan
Route::get('ketersediaan', [KetersediaanController::class, 'ketersediaan']) -> name('ketersediaan');
// sunting mitra
Route::get('sunting_mitra', function () {return view('sunting_mitra');}) -> name('sunting_mitra');
// sunting admin
Route::get('sunting_pengguna', function () {return view('sunting_pengguna');}) -> name('sunting_pengguna');

