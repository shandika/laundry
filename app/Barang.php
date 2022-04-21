<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    //Tabel barangs
    protected $fillable = [
        'id', 'nama_barang', 'kd_barang', 'created_at', 'updated_at'
    ];
}
