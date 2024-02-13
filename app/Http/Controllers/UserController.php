<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    // metode store yang digunakan untuk menyimpan data pengguna.
    public function store(Request $request)
    {
        $request->validate([
            // ... validasi lainnya
            'user_type' => 'required|in:admin,pimpinan', // Pastikan sesuai dengan opsi pada dropdown
        ]);

        // Buat pengguna baru
        $user = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            // ... atribut lainnya
        ]);

        // Tentukan tingkatan pengguna berdasarkan pilihan pada dropdown
        $user->role = $request->input('user_type');

        // Simpan pengguna
        $user->save();

        return redirect()->route('pengguna.index')->with('success', 'Pengguna berhasil ditambahkan!');
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('pengguna.index')->with('success', 'Pengguna berhasil dihapus!');
    }
}
