<?php

namespace App\Http\Controllers;

use App\Models\HotelPenerbangan;
use Illuminate\Support\Facades\Auth;

class DashboardMitra extends Controller
{
    public function dashboard_Mitra()
    {
        $id = Auth::user()->id;
        $ketersediaanKamar = HotelPenerbangan::where(['kategori' => 'hotel', 'user_id' => $id])->with('keterangan')->get();
        $tiketPenerbangan = HotelPenerbangan::where(['kategori' => 'penerbangan', 'user_id' => $id])->with('keterangan')->get();
        return view('mitra.home_mitra', compact('ketersediaanKamar', 'tiketPenerbangan'));
    }
    public function booking_Status()
    {
        $id = Auth::user()->id;
        $ketersediaanKamar = HotelPenerbangan::where(['kategori' => 'hotel', 'user_id' => $id])->with('keterangan')->get();
        $tiketPenerbangan = HotelPenerbangan::where(['kategori' => 'penerbangan', 'user_id' => $id])->with('keterangan')->get();
        return view('mitra.status', compact('ketersediaanKamar', 'tiketPenerbangan'));
    }
}