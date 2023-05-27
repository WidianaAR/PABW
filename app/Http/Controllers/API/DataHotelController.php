<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ApiResource;
use App\Models\HotelPenerbangan;
use App\Models\Keterangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DataHotelController extends Controller
{
    public function index()
    {
        $hotels = HotelPenerbangan::where('kategori', 'Hotel')->paginate(5);
        return new ApiResource(true, 'List Data Hotel', $hotels);
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

        $hotel = HotelPenerbangan::create([
            'user_id' => $request->user_id,
            'keterangan_id' => $keterangan_id,
            'kategori' => $request->kategori,
            'nama' => $request->nama,
            'stok' => $request->stok,
            'jumlah_terbooking' => $request->jumlah_terbooking,
            'harga' => $request->harga,
            'status' => $status
        ]);

        if ($hotel) {
            return new ApiResource(true, 'Data Hotel Berhasil Disimpan!', $hotel);
        } else {
            return new ApiResource(false, 'Data Hotel Gagal Disimpan!', null);
        }
    }

    public function show($id)
    {
        $hotel = HotelPenerbangan::whereId($id)->first();
        if ($hotel) {
            return new ApiResource(true, 'Detail Data Hotel!', $hotel);
        }
        return new ApiResource(false, 'Detail Data Hotel Tidak DItemukan!', null);
    }

    public function update(Request $request, HotelPenerbangan $hotel)
    {
        $keterangan = $request->only(['keterangan_satu', 'keterangan_dua']);
        Keterangan::find($hotel->keterangan_id)->update($keterangan);

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

        $hotel->update([
            'nama' => $request->nama,
            'stok' => $request->stok,
            'jumlah_terbooking' => $request->jumlah_terbooking,
            'harga' => $request->harga,
            'status' => $status
        ]);

        if ($hotel) {
            return new ApiResource(true, 'Data Hotel Berhasil Diupdate!', $hotel);
        } else {
            return new ApiResource(false, 'Data Hotel Gagal Diupdate!', null);
        }
    }

    public function destroy(HotelPenerbangan $hotel)
    {
        if ($hotel->delete()) {
            return new ApiResource(true, 'Data Hotel Berhasil Dihapus!', null);
        } else {
            return new ApiResource(false, 'Data Hotel Gagal Dihapus!', null);
        }
    }
}