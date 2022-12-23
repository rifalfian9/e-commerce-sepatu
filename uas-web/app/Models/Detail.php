<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    protected $table = "detail_transaksi";
    protected $primaryKey = "id_detail_transaksi";
    protected $guarded = ['id_detail_transaksi'];

}
