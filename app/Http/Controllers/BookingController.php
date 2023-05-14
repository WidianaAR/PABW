<?php

namespace App\Http\Controllers;

use App\Models\HotelPenerbangan;
use App\Models\TransaksiPemesanan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    public function booking(Request $request, $id)
    {
        $user = Auth::user();
        $hotel_penerbangan = HotelPenerbangan::find($id);
        $total = $request->jumlah * $hotel_penerbangan->harga;
        $tersedia = $hotel_penerbangan->stok - $hotel_penerbangan->jumlah_terbooking;

        $validator = Validator::make($request->all(), [
            'tanggal_booking' => 'date|after_or_equal:today+1|before_or_equal:' . now()->addDays(7)->format('Y-m-d')
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Pemesanan paling lama 7 hari ke depan dan paling lambat H-1!');
        }

        if ($user->saldo_emoney < $total) {
            return redirect()->back()->with('error', 'Saldo anda tidak cukup!');
        } elseif ($tersedia < $request->jumlah) {
            return redirect()->back()->with('error', 'Maaf stok tidak cukup, jumlah yang tersisa adalah ' . $tersedia);
        } else {
            TransaksiPemesanan::create([
                'user_id' => $user->id,
                'hotel_penerbangan_id' => $id,
                'tanggal_booking' => $request->tanggal_booking,
                'jumlah' => $request->jumlah,
                'total_biaya' => $total,
                'status_transaksi' => 'dipesan'
            ]);

            $hotel_penerbangan->update([
                'jumlah_terbooking' => $hotel_penerbangan->jumlah_terbooking + $request->jumlah
            ]);

            User::find($user->id)->update(['saldo_emoney' => $user->saldo_emoney - $total]);
        }

        if ($hotel_penerbangan->stok - $hotel_penerbangan->jumlah_terbooking == 0) {
            $hotel_penerbangan->update(['status' => 'Tidak Tersedia']);
        }

        return redirect()->route('schedule_pengguna')->with('success', 'Berhasil dipesan');
    }

    public function cancel($id)
    {
        $data = TransaksiPemesanan::find($id);
        $data->update(['status_transaksi' => 'dibatalkan']);
        $data->user->update(['saldo_emoney' => $data->user->saldo_emoney + $data->total_biaya]);
        $data->hotel_penerbangan->update(['jumlah_terbooking' => $data->hotel_penerbangan->jumlah_terbooking - $data->jumlah]);
        if ($data->hotel_penerbangan->stok > $data->hotel_penerbangan->jumlah_terbooking) {
            $data->hotel_penerbangan->update(['status' => 'Tersedia']);
        }
        $data::destroy($id);
        return redirect()->back()->with('success', 'Pesanan berhasil dibatalkan');
    }
}