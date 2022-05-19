<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
     // Table pesanans
     protected $fillable = [
        'id', 'kd_invoice', 'kd_pelanggan', 'jenis_cucian', 'pembayaran', 'total_harga', 'upload', 'status', 'alasan_batal'
    ];
}
