<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Size;
use App\Models\Warna;
use App\Models\Kategori;
use Illuminate\Support\Facades\DB;

class BelanjaController extends Controller
{
    public function belanja ( Request $request) {
        $search = $request->search; 
        $kategori = Kategori::all();
        $barang = Barang::all();
        $Size = Size::all();
        $Warna = Warna::all();
        return view('include.shop',compact('barang', 'kategori', 'Warna', 'Size'), [ "title" => 'Semua Items']);
        }
    

    public function populer () {
        $kategori = Kategori::all();
        $barang = Barang::where('rating', '>' ,'4.5')->get();
        $Size = Size::all();
        $Warna = Warna::all();
        return view('include.shop',compact('barang', 'kategori','Warna', 'Size'), [ "title" => 'Populer']);
    }

    public function terbaru () {
        $kategori = Kategori::all();
        $barang = Barang::orderBy('id_barang', 'DESC')->get();
        $Size = Size::all();
        $Warna = Warna::all();
        return view('include.shop',compact('barang', 'kategori','Warna', 'Size'), [ "title" => 'Terbaru']);
    }

    public function search (Request $request) {
        $search = $request->search; 
        $kategori = Kategori::all();
        $Size = Size::all();
        $Warna = Warna::all();
        $barang = DB::table('barang')
        ->join('kategori_barang', 'kategori_barang.id_kategori_barang', '=', "barang.id_kategori_barang")
        ->select('*')
        ->where('nama_barang', 'LIKE', '%'.$search.'%')->orWhere('nama_kategori_barang', 'LIKE', '%'.$search.'%')
        ->get();
        return view('include.shop',compact('barang', 'kategori', 'Warna', 'Size'),[ "title" => 'Search']);
        }


        public function filter (Request $request){
            $key1 = $request->kategori;
            $key2 = $request->size;
            $key3 = $request->warna;
            $kategori = Kategori::all();
            $Size = Size::all();
            $Warna = Warna::all();
            $barang = DB::table('barang')
            ->join('size', 'size.id_size', '=', "barang.id_size")
            ->join('warna', 'warna.id_warna', '=', "barang.id_warna")
            ->join('kategori_barang', 'kategori_barang.id_kategori_barang', '=', "barang.id_kategori_barang")
            ->select('*')
            ->where('nama_kategori_barang', $key1)->where('size', $key2)->where('warna', $key3)
            ->get();
            return view('include.shop',compact('barang', 'kategori', 'Warna', 'Size'), [ "title" => 'Filters']);
        }
    // public function warna
}
