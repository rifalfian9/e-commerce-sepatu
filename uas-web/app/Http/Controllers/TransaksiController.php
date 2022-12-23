<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Barang;

class TransaksiController extends Controller
{
    public function transaksi()
    {
        $bayar = DB::table('detail_transaksi')
            ->join('users', 'users.id', '=', 'detail_transaksi.id_user')
            ->join('keranjang_barang', 'keranjang_barang.id_keranjang', '=', 'detail_transaksi.id_keranjang')
            ->join('barang', 'barang.id_barang', '=', 'keranjang_barang.id_barang')
            ->join('transaksi', 'transaksi.id_transaksi', '=', 'detail_transaksi.id_transaksi')
            ->join('size', 'size.id_size', '=', 'barang.id_size')
            ->join('warna', 'warna.id_warna', '=', 'barang.id_warna')
            ->select(
                'detail_transaksi.*',
                'size.size',
                'warna.warna',
                'users.name',
                'users.telepon',
                'users.alamat',
                'keranjang_barang.total_harga',
                'keranjang_barang.jumlah_barang',
                'barang.foto_barang',
                'barang.nama_barang',
                'barang.harga_satuan',
                'transaksi.status'
            )
            ->where('transaksi.status', 'menunggu')->where('detail_transaksi.id_pengguna', auth()->user()->id_user)
            ->orderBy('id_detail_transaksi', 'DESC')
            ->get();



        return view('include.transaction', compact('bayar'), ["title" => 'Riwayat Transaksi']);
    }

    public function group(Request $request)
    {
        $parameter = $request->parameter;
        $bayar = DB::table('detail_transaksi')
            ->join('users', 'users.id', '=', 'detail_transaksi.id_user')
            ->join('keranjang_barang', 'keranjang_barang.id_keranjang', '=', 'detail_transaksi.id_keranjang')
            ->join('barang', 'barang.id_barang', '=', 'keranjang_barang.id_barang')
            ->join('transaksi', 'transaksi.id_transaksi', '=', 'detail_transaksi.id_transaksi')
            ->join('size', 'size.id_size', '=', 'barang.id_size')
            ->join('warna', 'warna.id_warna', '=', 'barang.id_warna')
            ->select(
                'detail_transaksi.*',
                'size.size',
                'warna.warna',
                'users.name',
                'users.telepon',
                'users.alamat',
                'keranjang_barang.total_harga',
                'keranjang_barang.jumlah_barang',
                'barang.foto_barang',
                'barang.nama_barang',
                'barang.harga_satuan',
                'transaksi.status'
            )
            ->where('transaksi.status', $parameter)->where('detail_transaksi.id_pengguna', auth()->user()->id_user)
            ->orderBy('id_detail_transaksi', 'DESC')
            ->get();

        return view('include.transaction', compact('bayar', 'parameter'), ["title" => 'Riwayat Transaksi']);
    }

    public function bayar(Request $request, $id_keranjang)
    {
        DB::table('keranjang_barang')->where('id_keranjang', $id_keranjang)
            ->update([
                'status' => 'acc'
            ]);

        $idtransaksinew = DB::table('transaksi')->insertGetId([
            'id_pengguna' => auth()->user()->id_user,
            'tgl_transaksi' => date("Y-m-d H:i:s"),
            'id_user' => auth()->user()->id,
            'status' => 'menunggu',
            'total_transaksi' => 1
        ]);
        DB::table('detail_transaksi')->insert([
            'id_pengguna' => auth()->user()->id_user,
            'tgl_transaksi' => date("Y-m-d H:i:s"),
            'total_transaksi' => 1,
            'id_user' => auth()->user()->id,
            'id_keranjang' => $request->idkeranjang,
            'id_barang' => $request->idbarang,
            'id_transaksi' =>  $idtransaksinew,
        ]);

        $updatestok = $request->stok - $request->jumlahpesan;
        DB::table('barang')->where('id_barang', $request->idbarang)->update([
            'jumlah_barang' => $updatestok
        ]);

        return redirect('/transaksi');
    }

    public function checkout(Request $request)
    {
        $barangs = Barang::all()->where('id_barang', $request->barang);
        $keranjang_acc = DB::table('keranjang_barang')
            ->join('barang', 'barang.id_barang', '=', 'keranjang_barang.id_barang')
            ->join('users', 'users.id', '=', 'keranjang_barang.id_user')
            ->join('size', 'size.id_size', '=', 'barang.id_size')
            ->join('warna', 'warna.id_warna', '=', 'barang.id_warna')
            ->select('keranjang_barang.*', 'barang.foto_barang', 'barang.nama_barang', 'barang.id_barang', 'barang.harga_satuan', 'keranjang_barang.jumlah_barang', 'size.size', 'warna.warna', 'users.name', 'users.telepon', 'users.alamat', 'users.username')
            ->where('id_keranjang', $request->keranjang)->where('id_pengguna', auth()->user()->id_user)
            ->orderBy('id_keranjang', 'DESC')
            ->get();

        return view('include.bayar', compact('keranjang_acc', 'barangs'), ["title" => 'CheckOut']);
    }
}
