<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ApiResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index()
    {
        $admins = User::where('role_id', 1)->paginate(5);
        return new ApiResource(true, 'List Data Admin', $admins);
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
            return new ApiResource(true, 'Data Admin Berhasil Disimpan!', $data);
        } else {
            return new ApiResource(false, 'Data Admin Gagal Disimpan!', null);
        }
    }

    public function show($id)
    {
        $admin = User::whereId($id)->first();
        if ($admin) {
            return new ApiResource(true, 'Detail Data Admin!', $admin);
        }
        return new ApiResource(false, 'Detail Data Admin Tidak DItemukan!', null);
    }

    public function update(Request $request, User $admin)
    {
        $rule = ['email' => 'email:dns'];
        if ($request->email != $admin->email) {
            $rule['email'] = 'email:dns|unique:users';
        }

        $validator = Validator::make($request->all(), $rule);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $admin->update($request->all());
        if ($admin) {
            return new ApiResource(true, 'Data Admin Berhasil Diupdate!', $admin);
        } else {
            return new ApiResource(false, 'Data Admin Gagal Diupdate!', null);
        }
    }

    public function destroy(User $admin)
    {
        if ($admin->delete()) {
            return new ApiResource(true, 'Data Admin Berhasil Dihapus!', null);
        } else {
            return new ApiResource(false, 'Data Admin Gagal Dihapus!', null);
        }
    }
}