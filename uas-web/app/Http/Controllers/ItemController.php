<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Size;
use App\Models\Keranjang;
use App\Models\Kategori;
use Illuminate\Support\Facades\DB;
use App\Models\Warna;
use App\Models\User;




class ItemController extends Controller
{
    public function item($id_barang)
    {

        $barang = DB::table('barang')
            ->join('kategori_barang', 'barang.id_kategori_barang', '=', 'kategori_barang.id_kategori_barang')
            ->join('size', 'barang.id_size', '=', 'size.id_size')
            ->join('warna', 'barang.id_warna', '=', 'warna.id_warna')
            ->where('id_barang', $id_barang)
            ->select('barang.*', 'kategori_barang.nama_kategori_barang', 'size.size', 'warna.warna')
            ->get();
        $size = Size::all();
        $warna = Warna::all();
        return view('include.item', compact('barang', 'warna', 'size'), ["title" => 'Item']);
    }

    public function tambah(Request $request)
    {
        $keranjang = Keranjang::all();
        $jum = $request->jumlah;
        if ($jum <= 0) {
            $jum = 1;
        }
        DB::table('keranjang_barang')
            ->insert([
                'id_barang' => $request->id_barang,
                'id_user' => auth()->user()->id,
                'id_pengguna' => auth()->user()->id_user,
                'jumlah_barang' => $jum,
                'total_harga' => $request->hargasatuan * $jum,
                'status' => 'belum'
            ]);

        return redirect('/keranjang');
    }
}
