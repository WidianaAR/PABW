<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ApiResource;
use App\Models\HotelPenerbangan;
use App\Models\Keterangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DataPenerbanganController extends Controller
{
    public function index()
    {
        $penerbangans = HotelPenerbangan::where('kategori', 'Penerbangan')->paginate(5);
        return new ApiResource(true, 'List Data Penerbangan', $penerbangans);
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

        $validator = Validator::make($request->all(), [
            'jumlah_terbooking' => 'required|numeric|max:' . $request->stok
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $penerbangan = HotelPenerbangan::create([
            'user_id' => $request->user_id,
            'keterangan_id' => $keterangan_id,
            'kategori' => $request->kategori,
            'nama' => $request->nama,
            'stok' => $request->stok,
            'jumlah_terbooking' => $request->jumlah_terbooking,
            'harga' => $request->harga,
            'status' => $status
        ]);

        if ($penerbangan) {
            return new ApiResource(true, 'Data Penerbangan Berhasil Disimpan!', $penerbangan);
        } else {
            return new ApiResource(false, 'Data Penerbangan Gagal Disimpan!', null);
        }
    }

    public function show($id)
    {
        $penerbangan = HotelPenerbangan::whereId($id)->first();
        if ($penerbangan) {
            return new ApiResource(true, 'Detail Data Penerbangan!', $penerbangan);
        }
        return new ApiResource(false, 'Detail Data Penerbangan Tidak DItemukan!', null);
    }

    public function update(Request $request, HotelPenerbangan $penerbangan)
    {
        $keterangan = $request->only(['keterangan_satu', 'keterangan_dua']);
        Keterangan::find($penerbangan->keterangan_id)->update($keterangan);

        if ($request->stok != 0) {
            $status = 'Tersedia';
        } else {
            $status = 'Tidak tersedia';
        }

        $validator = Validator::make($request->all(), [
            'jumlah_terbooking' => 'required|numeric|max:' . $request->stok
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $penerbangan->update([
            'nama' => $request->nama,
            'stok' => $request->stok,
            'jumlah_terbooking' => $request->jumlah_terbooking,
            'harga' => $request->harga,
            'status' => $status
        ]);

        if ($penerbangan) {
            return new ApiResource(true, 'Data Penerbangan Berhasil Diupdate!', $penerbangan);
        } else {
            return new ApiResource(false, 'Data Penerbangan Gagal Diupdate!', null);
        }
    }

    public function destroy(HotelPenerbangan $penerbangan)
    {
        if ($penerbangan->delete()) {
            return new ApiResource(true, 'Data Penerbangan Berhasil Dihapus!', null);
        } else {
            return new ApiResource(false, 'Data Penerbangan Gagal Dihapus!', null);
        }
    }
}