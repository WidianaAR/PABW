<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ApiResource;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Nette\Utils\Json;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::paginate(5);
        return new ApiResource(true, 'List Data Role', $roles);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'role_name' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $data = Role::create($request->all());
        if ($data) {
            return new ApiResource(true, 'Data Role Berhasil Disimpan!', $data);
        } else {
            return new ApiResource(false, 'Data Role Gagal Disimpan!', null);
        }
    }

    public function show($id)
    {
        $role = Role::whereId($id)->first();
        if ($role) {
            return new ApiResource(true, 'Detail Data Role!', $role);
        }
        return new ApiResource(false, 'Detail Data Role Tidak DItemukan!', null);
    }

    public function update(Request $request, Role $role)
    {
        $validator = Validator::make($request->all(), [
            'role_name' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $role->update($request->all());
        if ($role) {
            return new ApiResource(true, 'Data Role Berhasil Diupdate!', $role);
        } else {
            return new ApiResource(false, 'Data Role Gagal Diupdate!', null);
        }
    }

    public function destroy(Role $role)
    {
        if ($role->delete()) {
            return new ApiResource(true, 'Data Role Berhasil Dihapus!', null);
        } else {
            return new ApiResource(false, 'Data Role Gagal Dihapus!', null);
        }
    }
}