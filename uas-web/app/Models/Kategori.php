<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = "kategori_barang";
    protected $primaryKey = "id_kategori_barang";
    protected $guarded = ['id_kategori_barang'];

     public function barang()
    {
        return $this->hasMany(Barang::class, 'id_kategori_barang');
        // return $this->morphToManyo(Barang::class, 'id_kategori_barang');
    }

}
