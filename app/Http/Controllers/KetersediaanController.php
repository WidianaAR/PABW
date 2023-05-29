<?php

namespace App\Http\Controllers;

use App\Models\HotelPenerbangan;
use App\Models\Keterangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class KetersediaanController extends Controller
{
    public function ketersediaan()
    {
        $ketersediaanKamar = HotelPenerbangan::where('kategori', 'hotel')->with('keterangan')->get();
        $tiketPenerbangan = HotelPenerbangan::where('kategori', 'penerbangan')->with('keterangan')->get();

        return view('admin.ketersediaan', compact("ketersediaanKamar", "tiketPenerbangan"));
    }

    public function delete_ketersediaan_kamar($id)
    {
        $ketersediaanKamar = HotelPenerbangan::where('kategori', 'hotel');
        $ketersediaanKamar = HotelPenerbangan::find($id);
        activity()
            ->performedOn($ketersediaanKamar)
            ->log('Menghapus data hotel ' . $ketersediaanKamar->nama);
        $ketersediaanKamar->delete();
        return redirect()->back()->with('success', 'Kamar Hotel Berhasil di Hapus');
    }

    public function delete_ketersediaan_penerbangan($id)
    {
        $tiketPenerbangan = HotelPenerbangan::where('kategori', 'penerbangan');
        $tiketPenerbangan = HotelPenerbangan::find($id);
        activity()
            ->performedOn($tiketPenerbangan)
            ->log('Menghapus data penerbangan ' . $tiketPenerbangan->nama);
        $tiketPenerbangan->delete();
        return redirect()->back()->with('success', 'Kursi Penerbangan Berhasil di Hapus');
    }

    public function edit($id)
    {
        return view('admin.Ketersediaan_Hotel_edit_form', ['data' => HotelPenerbangan::find($id)]);
    }

    public function edit_pesawat($id)
    {
        return view('admin.Ketersediaan_Pesawat_edit_form', ['data' => HotelPenerbangan::find($id)]);
    }

    public function update(Request $request, $id)
    {
        $data = HotelPenerbangan::find($id);
        $keterangan = $request->only(['keterangan_satu', 'keterangan_dua']);
        Keterangan::find($data->keterangan_id)->update($keterangan);

        if ($request->jumlah_terbooking === $request->stok) {
            $status = 'Tidak Tersedia';
        } else {
            $status = 'Tersedia';
        }

        $request->validate([
            'jumlah_terbooking' => 'required|numeric|max:' . $request->stok
        ], [
            'jumlah_terbooking.max' => 'Jumlah terbooking tidak boleh melebihi stok'
        ]);

        $hotelPenerbangan = HotelPenerbangan::find($id);
        $hotelPenerbangan->update([
            'nama' => $request->nama,
            'stok' => $request->stok,
            'jumlah_terbooking' => $request->jumlah_terbooking,
            'status' => $status
        ]);
        
        activity()
            ->performedOn($hotelPenerbangan)
            ->log('Mengubah data dengan id ' . $hotelPenerbangan->id);
        
        return redirect()->route('ketersediaan')->with('success', 'Data berhasil diubah');
    }
}