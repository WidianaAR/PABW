<?php

namespace App\Http\Controllers;

use App\Models\KamarHotel;
use App\Models\TiketPenerbangan;
use Illuminate\Http\Request;

class KetersediaanController extends Controller
{
    public function ketersediaan()
    {
        $ketersediaanKamar = KamarHotel::all();
        $tiketPenerbangan = TiketPenerbangan::all();
        return view('ketersediaan', compact("ketersediaanKamar", "tiketPenerbangan"));
    }
}
