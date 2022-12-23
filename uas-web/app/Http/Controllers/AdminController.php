<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Size;
use App\Models\Kategori;
use App\Models\Warna;
use App\Models\Barang;
use App\Models\Transaksi;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $u = User::count();
        $w = Warna::count();
        $b = Barang::count();
        $s = Size::count();
        $k = Kategori::count();
        $o = Transaksi::count();
        return view('admin.index', compact('b', 's', 'k', 'w', 'u', 'o'), ['title' => 'Dashboard','content' => 'dashboard']);
    }
    public function barang()
    {
        // $b = Barang::join('warna', 'warna.id_warna', '=', 'barang.id_warna')->join('size', 'size.id_size', '=', 'barang.id_size')
        //     ->join('kategori_barang','kategori_barang.id_kategori_barang','=','barang.id_kategori_barang')
        //     ->select('barang.id_barang', 'warna.warna', 'size.size', 'barang.nama_barang', 'barang.harga_satuan', 'barang.foto_barang',
        //      'barang.rating', 'barang.jumlah_barang', 'kategori_barang.nama_kategori_barang',
        //     'barang.status',
        //     'barang.deskripsi_barang')->get();
        $b = Barang::join('size', 'size.id_size', '=', 'barang.id_size')->join('warna', 'warna.id_warna', '=', 'barang.id_warna')
            ->select('barang.*', 'size.size', 'warna.warna')->get();
        $s = Size::all();
        $k = Kategori::all();
        $w = Warna::all();
        $warna = Barang::with('id_warna')->pluck('id_warna')->toArray();
        $size = Barang::with('id_size')->pluck('id_size')->toArray();
        return view('admin.produk.barang', compact('b', 's', 'k', 'w','warna','size'), ['title' => 'Produk', 'content' => 'data barang']);
    }
    public function tambah()
    {
        $kt = Kategori::all();
        $s = Size::all();
        $w = Warna::all();
        $b = Barang::join('size', 'size.id_size', '=', 'barang.id_size')->join('warna', 'warna.id_warna', '=', 'barang.id_warna')->join('kategori_barang', 'kategori_barang.id_kategori_barang', '=', 'barang.id_kategori_barang')
            ->select('barang.*', 'kategori_barang.id_kategori_barang', 'kategori_barang.nama_kategori_barang')->latest()->get();
        return view('admin.produk.tambah', compact('b', 'w', 's', 'kt'), ['title' => 'Produk', 'content' => 'tambah barang']);
    }
    public function warna()
    {
        $w = Warna::latest()->get();
        return view('admin.produk.warna', compact('w'), ['title' => 'Detail Produk', 'content' => 'warna']);
    }
    public function size()
    {
        $s = Size::latest()->get();
        return view('admin.produk.size', compact('s'), ['title' => 'Detail Produk', 'content' => 'size']);
    }
    public function kategori()
    {
        $k = Kategori::latest()->get();
        return view('admin.produk.kategori', compact('k'), ['title' => 'Detail Produk', 'content' => 'kategori']);
    }
    public function user()
    {
        $u = User::latest()->paginate(5);
        return view('admin.user', compact('u'), ['title' => 'User', 'content' => 'User']);
    }
    public function data_user()
    {
        $u = User::all();
        return view('admin.data', compact('u'), ['title' => 'User', 'content' => 'Data User']);
    }
    public function profile()
    {
        $u = User::all();
        return view('admin.profile', compact('u'), ['title' => 'Profile', 'content' => 'Profile']);
    }
    
}
