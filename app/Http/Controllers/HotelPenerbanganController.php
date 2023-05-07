<?php

namespace App\Http\Controllers;

use App\Models\HotelPenerbangan;
use App\Models\Keterangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HotelPenerbanganController extends Controller
{
    public function create($kategori)
    {
        return view('mitra.add_form', ['kategori' => $kategori]);
    }

    public function store(Request $request)
    {
        $keterangan = $request->only(['keterangan_satu', 'keterangan_dua']);
        $keterangan_data = Keterangan::create($keterangan);
        $keterangan_id = $keterangan_data->id;

        if ($request->stok != 0) {
            $status = 'Tersedia';
        } else {
            $status = 'Tidak tersedia';
        }

        HotelPenerbangan::create([
            'user_id' => Auth::user()->id,
            'keterangan_id' => $keterangan_id,
            'kategori' => $request->kategori,
            'nama' => $request->nama,
            'stok' => $request->stok,
            'jumlah_terbooking' => 0,
            'harga' => $request->harga,
            'status' => $status
        ]);
        return redirect()->route('home_mitra')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id, $kategori)
    {
        $data = HotelPenerbangan::where('id', $id)->with('keterangan')->first();
        return view('mitra.edit_form', ['data' => $data, 'kategori' => $kategori]);
    }

    public function update(Request $request, $id)
    {
        $data = HotelPenerbangan::find($id);
        $keterangan = $request->only(['keterangan_satu', 'keterangan_dua']);
        Keterangan::find($data->keterangan_id)->update($keterangan);

        if ($request->stok != 0) {
            $status = 'Tersedia';
        } else {
            $status = 'Tidak tersedia';
        }

        HotelPenerbangan::find($data->id)->update([
            'nama' => $request->nama,
            'stok' => $request->stok,
            'harga' => $request->harga,
            'status' => $status
        ]);
        return redirect()->route('home_mitra')->with('success', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        HotelPenerbangan::destroy($id);
        return redirect()->route('home_mitra')->with('success', 'Data berhasil dihapus');
    }
}