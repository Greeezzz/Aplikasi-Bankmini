<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index ()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    public function createUser()
    {
        return view('user.create');
    }

    public function editUser()
    {
        return view('user.edit');
    }

    public function simpanUser(Request $request)
    {
        $request->validate([
            'ktp' => 'required|numeric|unique:users,ktp',
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'hp' => 'required|unique:users,hp',
            'peran' => 'required',
        ]); 

        $simpan = new User();
        $simpan->ktp = $request->ktp;
        $simpan->name = $request->name;
        $simpan->email = $request->email;
        $simpan->password = bcrypt($request->password);
        $simpan->hp = $request->hp;
        $simpan->peran = $request->peran;
        $simpan->save();

        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan');
    }

    public function edittUser($id)
    {
        $edit = User::find($id);
        return view('user.edit', compact('edit'));
    }

    public function hapusUser($id)
    {
        $hapus = User::find($id);
        $hapus->delete();

        return redirect()->route('user.index')->with('success', 'User berhasil dihapus');
    }

    public function updateUser(Request $request, $id)
    {
        $request->validate([
            'ktp' => 'required|numeric|unique:users,ktp,'.$id,
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id, 
            'hp' => 'required|unique:users,hp,'.$id,
            'peran' => 'required',
        ]); 

        $update = User::find($id);
        $update->ktp = $request->ktp;
        $update->name = $request->name;
        $update->email = $request->email;
        $update->password = bcrypt($request->password);
        if ($request->password != null) {
            $update->password = bcrypt($request->password);
        }
        $update->hp = $request->hp;
        $update->peran = $request->peran;
        $update->save();

        return redirect()->route('user.index')->with('success', 'User berhasil diupdate');
    }
}