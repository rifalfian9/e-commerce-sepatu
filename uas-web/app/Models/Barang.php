<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kategori;
use App\Models\Size;
use App\Models\Warna;

class Barang extends Model
{
    protected $table = "barang";
    protected $primaryKey = "id_barang";
    protected $guarded = ['id_barang'];

    public function kategori(){
        return $this->belongsTo(Kategori::class);
        // return $this->morphToManyo(Kategori::class,'id_kategori_barang');
    }
    public function warna(){
        return $this->belongsTo(Warna::class);
        // return $this->morphToMany(Warna::class,'id_warna');
    }
    public function size(){
        return $this->belongsTo(Size::class);
        // return $this->morphToMany(Size::class,'id_size');
    }
}
