<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ApiResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MitraController extends Controller
{
    public function index()
    {
        $mitras = User::where('role_id', 3)->paginate(5);
        return new ApiResource(true, 'List Data Mitra', $mitras);
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
            return new ApiResource(true, 'Data Mitra Berhasil Disimpan!', $data);
        } else {
            return new ApiResource(false, 'Data Mitra Gagal Disimpan!', null);
        }
    }

    public function show($id)
    {
        $mitra = User::whereId($id)->first();
        if ($mitra) {
            return new ApiResource(true, 'Detail Data Mitra!', $mitra);
        }
        return new ApiResource(false, 'Detail Data Mitra Tidak DItemukan!', null);
    }

    public function update(Request $request, User $mitra)
    {
        $rule = ['email' => 'email:dns'];
        if ($request->email != $mitra->email) {
            $rule['email'] = 'email:dns|unique:users';
        }

        $validator = Validator::make($request->all(), $rule);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $mitra->update($request->all());
        if ($mitra) {
            return new ApiResource(
                true,
                'Data Mitra Berhasil Diupdate!',
                $mitra
            );
        } else {
            return new ApiResource(false, 'Data Mitra Gagal Diupdate!', null);
        }
    }

    public function destroy(User $mitra)
    {
        if ($mitra->delete()) {
            return new ApiResource(true, 'Data Mitra Berhasil Dihapus!', null);
        } else {
            return new ApiResource(false, 'Data Mitra Gagal Dihapus!', null);
        }
    }
}