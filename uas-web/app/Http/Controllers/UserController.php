<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        $barang = Barang::all();
        return view('include.home', compact('barang'), ["title" => "Beranda"]);
    }
    public function login()
    {
        return view('include.login', ["title" => "Login"]);
    }
    public function register()
    {
        return view('include.daftar', ["title" => "Login"]);
    }
    public function create(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required', 'string', 'email', 'max:255', 'unique:users',
            'password' => 'required', 'string', 'min:8', 'confirmed',
            'telepon' => 'required|min:8',
            'foto' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'alamat' => 'required',

        ]);
        User::create([
            'name' => $request['nama'],
            'username' => $request['username'],
            'email' => $request['email'],
            'role' => 'user',
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'foto_user' => $request->file('foto')->store('user'),
            'id_user' => Str::random(8),
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->route('/');
    }
   
}
