<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ApiResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PenggunaController extends Controller
{
    public function index()
    {
        $penggunas = User::where('role_id', 2)->paginate(5);
        return new ApiResource(true, 'List Data Penggunas', $penggunas);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'email:dns|unique:users',
            'confirm-password' => 'required|same:password'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $data = User::create($request->all());
        if ($data) {
            return new ApiResource(true, 'Data Pengguna Berhasil Disimpan!', $data);
        } else {
            return new ApiResource(false, 'Data Pengguna Gagal Disimpan!', null);
        }
    }

    public function show($id)
    {
        $pengguna = User::whereId($id)->first();
        if ($pengguna) {
            return new ApiResource(true, 'Detail Data Pengguna!', $pengguna);
        }
        return new ApiResource(false, 'Detail Data Pengguna Tidak DItemukan!', null);
    }

    public function update(Request $request, User $pengguna)
    {
        $rule = ['email' => 'email:dns'];
        if ($request->email != $pengguna->email) {
            $rule['email'] = 'email:dns|unique:users';
        }

        $validator = Validator::make($request->all(), $rule);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $pengguna->update($request->all());
        if ($pengguna) {
            return new ApiResource(true, 'Data Pengguna Berhasil Diupdate!', $pengguna);
        } else {
            return new ApiResource(false, 'Data Pengguna Gagal Diupdate!', null);
        }
    }

    public function destroy(User $pengguna)
    {
        if ($pengguna->delete()) {
            return new ApiResource(true, 'Data Pengguna Berhasil Dihapus!', null);
        } else {
            return new ApiResource(false, 'Data Pengguna Gagal Dihapus!', null);
        }
    }
}