<?php

namespace App\Http\Controllers;

use App\Models\User;
use Symfony\Component\HttpFoundation\Request;

class SuntingMitraController extends Controller
{
    public function index()
    {
        $suntingMitra = User::where('role_id', '3')->get();
        return view('admin.sunting_mitra', compact("suntingMitra"));
    }

    public function create()
    {
        return view('admin.mitra_add_form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'email:dns|unique:users',
            'confirm-password' => 'required|same:password'
        ]);

        User::create($request->all());
        return redirect()->route('sunting_mitra')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        return view('admin.mitra_edit_form', ['data' => User::find($id)]);
    }

    public function update(Request $request, $id)
    {
        $rule = ['email' => 'email:dns'];
        $data = User::find($id);

        if ($request->email != $data->email) {
            $rule['email'] = 'email:dns|unique:users';
        }

        $request->validate($rule);
        User::find($id)->update($request->all());
        return redirect()->route('sunting_mitra')->with('success', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('sunting_mitra')->with('success', 'Data berhasil dihapus');
    }
}