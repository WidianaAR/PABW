<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ApiResource;
use App\Models\TransaksiPemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = TransaksiPemesanan::paginate(5);
        return new ApiResource(true, 'List Data Booking', $bookings);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'hotel_penerbangan_id' => 'required',
            'tanggal_booking' => 'required',
            'jumlah' => 'required',
            'total_biaya' => 'required',
            'status_transaksi' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $booking = TransaksiPemesanan::create($request->all());
        if ($booking) {
            return new ApiResource(true, 'Data Booking Berhasil Disimpan!', $booking);
        } else {
            return new ApiResource(false, 'Data Booking Gagal Disimpan!', null);
        }
    }

    public function show($id)
    {
        $booking = TransaksiPemesanan::whereId($id)->first();
        if ($booking) {
            return new ApiResource(true, 'Detail Data Booking!', $booking);
        }
        return new ApiResource(false, 'Detail Data Booking Tidak DItemukan!', null);
    }

    public function update(Request $request, TransaksiPemesanan $booking)
    {
        $validator = Validator::make($request->all(), [
            'status_transaksi' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $booking->update($request->all());
        if ($booking) {
            return new ApiResource(true, 'Data Booking Berhasil Diupdate!', $booking);
        } else {
            return new ApiResource(false, 'Data Booking Gagal Diupdate!', null);
        }
    }

    public function destroy(TransaksiPemesanan $booking)
    {
        if ($booking->delete()) {
            return new ApiResource(true, 'Data Booking Berhasil Dihapus!', null);
        } else {
            return new ApiResource(false, 'Data Booking Gagal Dihapus!', null);
        }
    }
}