<?php

namespace App\Http\Controllers;

use App\Models\HotelPenerbangan;
use Illuminate\Http\Request;

class DashboardMitra extends Controller
{
    public function dashboard_Mitra()
    {
        $ketersediaanKamar = HotelPenerbangan::where('kategori', 'hotel')->with('keterangan')->get();
        $tiketPenerbangan = HotelPenerbangan::where('kategori', 'penerbangan')->with('keterangan')->get();
        return view('mitra.home_mitra', compact('ketersediaanKamar', 'tiketPenerbangan'));
    }
    public function booking_Status()
    {
        $ketersediaanKamar = HotelPenerbangan::where('kategori', 'hotel')->with('keterangan')->get();
        $tiketPenerbangan = HotelPenerbangan::where('kategori', 'penerbangan')->with('keterangan')->get();
        return view('mitra.status', compact('ketersediaanKamar', 'tiketPenerbangan'));
    }
}