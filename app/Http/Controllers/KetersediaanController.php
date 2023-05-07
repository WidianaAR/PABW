<?php

namespace App\Http\Controllers;

use App\Models\HotelPenerbangan;

class KetersediaanController extends Controller
{
    public function ketersediaan()
    {
        $ketersediaanKamar = HotelPenerbangan::where('kategori', 'hotel')->with('keterangan')->get();
        $tiketPenerbangan = HotelPenerbangan::where('kategori', 'penerbangan')->with('keterangan')->get();

        return view('admin.ketersediaan', compact("ketersediaanKamar", "tiketPenerbangan"));
    }
}