<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mutasi_barang extends Model
{
    //Tabel mutasi_barangs
    protected $fillable = [
        'id', 'id_barang', 'jumlah_awal', 'jumlah_akhir', 'created_at', 'updated_at'
    ];
}
