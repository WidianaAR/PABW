<?php

namespace App\Http\Controllers;

use App\Models\HotelPenerbangan;
use App\Models\TransaksiPemesanan;
use Illuminate\Support\Facades\Auth;

class DashboardPengguna extends Controller
{
    public function dashboard_Pengguna()
    {
        $ketersediaanKamar = HotelPenerbangan::where('kategori', 'hotel')->with('keterangan')->get();
        $tiketPenerbangan = HotelPenerbangan::where('kategori', 'penerbangan')->with('keterangan')->get();
        return view('pengguna.home', compact('ketersediaanKamar', 'tiketPenerbangan'));
    }

    public function schedule_Pengguna()
    {
        $ketersediaanKamar = TransaksiPemesanan::where(['user_id' => Auth::user()->id, 'status_transaksi' => 'dipesan'])->withWhereHas('hotel_penerbangan', function ($query) {
            $query->where('kategori', 'Hotel');
        })->with('hotel_penerbangan.keterangan')->get();
        $tiketPenerbangan = TransaksiPemesanan::where(['user_id' => Auth::user()->id, 'status_transaksi' => 'dipesan'])->withWhereHas('hotel_penerbangan', function ($query) {
            $query->where('kategori', 'Penerbangan');
        })->with('hotel_penerbangan.keterangan')->get();
        return view('pengguna.schedule_pengguna', compact('ketersediaanKamar', 'tiketPenerbangan'));
    }
}