<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
     // Table Transaksis
     protected $fillable = [
        'id', 'kd_pelanggan', 'jenis_cucian', 'pembayaran', 'status'
    ];
}
