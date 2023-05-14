<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SuntingPenggunaController extends Controller
{
    public function index()
    {
        $suntingPengguna = User::where('role_id', '2')->get();
        return view('admin.sunting_pengguna', compact("suntingPengguna"));
    }

    public function create()
    {
        return view('admin.pengguna_add_form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'email:dns|unique:users',
            'confirm-password' => 'required|same:password'
        ]);

        $data = User::create($request->all());
        activity()
            ->performedOn($data)
            ->log('Menambah pengguna baru dengan nama ' . $data->name);
        return redirect()->route('sunting_pengguna')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        return view('admin.pengguna_edit_form', ['data' => User::find($id)]);
    }

    public function update(Request $request, $id)
    {
        $rule = ['email' => 'email:dns'];
        $data = User::find($id);

        if ($request->email != $data->email) {
            $rule['email'] = 'email:dns|unique:users';
        }

        $request->validate($rule);
        $data = User::find($id);
        $data->update($request->all());
        activity()
            ->performedOn($data)
            ->log('Mengubah data pengguna dengan id ' . $data->id);
        return redirect()->route('sunting_pengguna')->with('success', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $data = User::find($id);
        activity()
            ->performedOn($data)
            ->log('Menghapus pengguna dengan nama ' . $data->name);
        $data->delete();
        return redirect()->route('sunting_pengguna')->with('success', 'Data berhasil dihapus');
    }
}