<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    protected $table = "keranjang_barang";
    protected $primaryKey = "id_keranjang";
    protected $guarded= ['id_keranjang']; 
}
