<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keranjang;
use Illuminate\Support\Facades\DB;

class KeranjangController extends Controller
{
    public function keranjang()
    {
        $belum = 'belum';
        $keranjang = DB::table('keranjang_barang')
        ->join('barang', 'barang.id_barang', '=', 'keranjang_barang.id_barang')
        ->join('size', 'size.id_size', '=', 'barang.id_size')
        ->join('warna', 'warna.id_warna', '=', 'barang.id_warna')
        ->select('keranjang_barang.*', 'barang.foto_barang', 'barang.harga_satuan', 'barang.nama_barang', 'size.size', 'warna.warna')
        ->where('keranjang_barang.status', $belum)->where('keranjang_barang.id_pengguna', auth()->user()->id_user)
            ->orderBy('id_keranjang', 'DESC')
            ->get();

        return view('include.bucket', compact('keranjang'), ["title" => "Keranjang"]);
    }

    public function hapus($id_keranjang)
    {
        DB::table('keranjang_barang')
        ->where('id_keranjang', $id_keranjang)->delete();
        return redirect('/keranjang');
    }

    
}
