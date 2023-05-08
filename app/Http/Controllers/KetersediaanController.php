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
        $ketersediaanKamar::destroy($id);
        return redirect()->back()->with('success', 'Kamar Hotel Berhasil di Hapus');
    }

    public function delete_ketersediaan_penerbangan($id)
    {
        $tiketPenerbangan = HotelPenerbangan::where('kategori', 'penerbangan');
        $tiketPenerbangan = HotelPenerbangan::find($id);
        $tiketPenerbangan::destroy($id);
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
    // public function update(Request $request, $id){
    //     $post                       = HotelPenerbangan::find($id);
    //     // $ketpost                    = Keterangan::find($id);
    //     $post->nama                 = $request->nama;
    //     // $ketpost->keterangan_satu   = $request->keterangan_satu;
    //     $post->save();
    //     // $ketpost->save();
    //     return redirect()->route('ketersediaan')->with('success', 'Data berhasil diubah');
    // }

    public function update(Request $request, $id)
    {
        $data = HotelPenerbangan::find($id);
        $keterangan = $request->only(['keterangan_satu', 'keterangan_dua']);
        Keterangan::find($data->keterangan_id)->update($keterangan);
        
        $hotelPenerbangan = HotelPenerbangan::find($id);
        $hotelPenerbangan->update($request->all());
        return redirect()->route('ketersediaan')->with('success', 'Data berhasil diubah');
    } 

    // public function edit($id){
    //     $post   = Post::whereId($id)->first();
    //     return view('edit')->with('post', $post);
    // }

  
}

