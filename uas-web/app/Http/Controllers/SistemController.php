<?php

namespace App\Http\Controllers;

use App\Models\Size;
use App\Models\Kategori;
use App\Models\Warna;
use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SistemController extends Controller
{
    public function add_warna(Request $request)
    {
        Warna::create([
            'warna' => $request->warna,
        ]);
        return redirect()->back();
    }
    public function add_size(Request $request)
    {
        Size::create([
            'size' => $request->size,
        ]);
        return redirect()->back();
    }
    public function add_kategori(Request $request)
    {
        Kategori::create([
            'nama_kategori_barang' => $request->kategori,
        ]);
        return redirect()->back();
    }
    public function hapus_size($id_size)
    {
        $size = Size::find($id_size);
        $size->delete();
        return back()->with('destroy', 'Data Success di hapus');
    }
    public function hapus_user($id)
    {
        $user = user::find($id);
        $user->delete();
        return back()->with('destroy', 'Data Success di hapus');
    }
    public function hapus($id_barang)
    {
        $barang = Barang::find($id_barang);
        if ($barang->foto_barang) {
            Storage::delete($barang->foto_barang);
        }
        $barang->delete();
        return back()->with('destroy', 'Data Success di hapus');
    }
    public function hapus_warna($id_warna)
    {
        $warna = Warna::find($id_warna);
        $warna->delete();
        return back()->with('destroy', 'Data Success di hapus');
    }
    public function hapus_kategori($id_kategori_barang)
    {
        $kategori = Kategori::find($id_kategori_barang);
        $kategori->delete();
        return back()->with('destroy', 'Data Success di hapus');
    }
    public function status($id_barang, Request $request)
    {
        $barang = Barang::find($id_barang);
        if ($barang->status == 'ready') {
            $barang = $request->all();
            Barang::where(['id_barang' => $id_barang])->update([
                'status' => $barang['sold'],
            ]);
        } elseif ($barang->status == 'soldout') {
            $barang = $request->all();
            Barang::where(['id_barang' => $id_barang])->update([
                'status' => $barang['ready'],
            ]);
        }
        return redirect()->back()->with('success', 'Data Successfully');
    }
    public function tambah_barang(Request $request)
    {

        $request->validate([
            'nama_barang' => 'required',
            'harga_satuan' => 'required|integer',
            'jumlah_barang' => 'required|integer',
            'size' => 'required|integer',
            'warna' => 'required|integer',
            'kategori' => 'required|integer',
            'deskripsi' => 'required',
            'gambar' => 'required|image',
        ]);
        $request = Barang::create([
            'nama_barang' => $request->nama_barang,
            'harga_satuan' => $request->harga_satuan,
            'jumlah_barang' => $request->jumlah_barang,
            'id_size' => $request->size,
            'id_warna' => $request->warna,
            'foto_barang' => $request->file('gambar')->store('barang'),
            'id_kategori_barang' => $request->kategori,
            'deskripsi_barang' => $request->deskripsi,
        ]);
        return redirect()->back()->with('success', 'Data Successfully');
    }
    public function edit($id_barang, Request $request)
    {

        if ($request->gambar <> "") {
            $item = $request->all();
            Barang::where(['id_barang' => $id_barang])->update([
                'nama_barang' => $request->nama_barang,
                'harga_satuan' => $request->harga_satuan,
                'jumlah_barang' => $request->jumlah_barang,
                'id_size' => $request->size,
                'id_warna' => $request->warna,
                'foto_barang' => $request->file('gambar')->store('barang'),
                'id_kategori_barang' => $request->kategori,
                'deskripsi_barang' => $request->deskripsi,

            ]);

            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
        } else {
            $item = $request->all();
            Barang::where(['id_barang' => $id_barang])->update([
                'nama_barang' => $request->nama_barang,
                'harga_satuan' => $request->harga_satuan,
                'jumlah_barang' => $request->jumlah_barang,
                'id_size' => $request->size,
                'id_warna' => $request->warna,
                'id_kategori_barang' => $request->kategori,
                'deskripsi_barang' => $request->deskripsi,

            ]);
        }
        return redirect()->back()->with('success', 'Data Successfully');
    }
    public function edit_role($id, Request $request)
    {
        User::where(['id' => $id])->update([
            'role' => $request->role,
        ]);
        return redirect()->back()->with('success', 'Data Successfully');
    }
    public function edit_profile($id, Request $request)
    {
        if ($request->foto <> "") {
            User::where(['id' => $id])->update([
                'name' => $request['name'],
                'username' => $request['username'],
                'alamat' => $request->alamat,
                'telepon' => $request->telepon,
                'foto_user' => $request->file('foto')->store('user'),

            ]);

            if ($request->lama) {
                Storage::delete($request->lama);
            }
        } else {
            User::where(['id' => $id])->update([
                'name' => $request['name'],
                'username' => $request['username'],
                'alamat' => $request->alamat,
                'telepon' => $request->telepon,

            ]);
        }
        return redirect()->back()->with('success', 'Data Successfully');
    }
    public function user(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required', 'string', 'email', 'max:255', 'unique:users',
            'password' => 'required', 'string', 'min:8', 'confirmed',

        ]);
        if ($request->foto <> "") {
            User::create([
                'name' => $request['name'],
                'username' => $request['username'],
                'email' => $request['email'],
                'role' => 'admin',
                'alamat' => $request->alamat,
                'telepon' => $request->telepon,
                'foto_user' => $request->file('foto')->store('user'),
                'id_user' => Str::random(8),
                'password' => Hash::make($request['password']),
            ]);
        } else {
            User::create([
                'name' => $request['name'],
                'username' => $request['username'],
                'email' => $request['email'],
                'role' => 'admin',
                'alamat' => $request->alamat,
                'telepon' => $request->telepon,
                'id_user' => Str::random(8),
                'password' => Hash::make($request['password']),
            ]);
        }

        return redirect()->back()->with('success', 'Data Successfully');
    }
}
