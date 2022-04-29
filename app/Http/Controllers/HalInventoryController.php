<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use App\Barang;
use App\Mutasi_barang;

class HalInventoryController extends Controller
{
    //Membuka halaman kelola data barang
    public function halamanKelolaBarang()
    {
        $barangs = Barang::select('barangs.*')
                            ->orderBy('created_at', 'desc')
                            ->get();
        $jumlah_awal = Barang::join('mutasi_barangs', 'id_barang', '=', 'barangs.kd_barang')
        ->select('barangs.*', 'mutasi_barangs.jumlah_awal', 'mutasi_barangs.jumlah_akhir')
        ->orderBy('mutasi_barangs.created_at', 'asc')
        ->get();
        $jumlah_akhir = Barang::join('mutasi_barangs', 'id_barang', '=', 'barangs.kd_barang')
        ->select('barangs.*', 'mutasi_barangs.jumlah_awal', 'mutasi_barangs.jumlah_akhir')
        ->orderBy('mutasi_barangs.created_at', 'desc')
        ->get();
        return view('halaman_inventory/halaman_kelola_data_barang', compact('barangs', 'jumlah_awal', 'jumlah_akhir'));
    }

    // Simpan barang
    public function simpanBarang(Request $req)
    {
        $max_barang = Barang::max('kd_barang');
        $check_max_barang = Barang::select('barangs.kd_barang')
        ->count();
        if($check_max_barang == null){
            $max_code_barang = "B0001";
        }else{
            $max_code_barang = $max_barang[1].$max_barang[2].$max_barang[3].$max_barang[4];
            $max_code_barang++;
            if($max_code_barang <= 9){
                $max_code_barang = "B000".$max_code_barang;
            }elseif ($max_code_barang <= 99) {
                $max_code_barang = "B00".$max_code_barang;
            }elseif ($max_code_barang <= 999) {
                $max_code_barang = "B0".$max_code_barang;
            }elseif ($max_code_barang <= 9999) {
                $max_code_barang = "B".$max_code_barang;
            }
        }

        $Barangs = new Barang;
        $Barangs->nama_barang = $req->nama_barang;
        $Barangs->kd_barang = $max_code_barang;
        $Barangs->jumlah_awal = $req->jumlah_barang;
        $Barangs->jumlah_akhir = $req->jumlah_barang;
        $Barangs->harga = $req->harga_barang;
        $Barangs->total = $req->harga_barang * $req->jumlah_barang;
        $Barangs->sisa = $req->harga_barang * $req->jumlah_barang;
        $Barangs->save(); 

        $Mutasis = new Mutasi_barang;
        $Mutasis->id_barang = $max_code_barang; 
        $Mutasis->jumlah_awal = $req->jumlah_barang;
        $Mutasis->jumlah_akhir = $req->jumlah_barang;
        $Mutasis->total = $req->harga_barang * $req->jumlah_barang;
        $Mutasis->sisa = $req->harga_barang * $req->jumlah_barang;
        $Mutasis->save();

        Session::flash('tersimpan', 'Barang baru berhasil ditambahkan');
        return redirect('/kelola_barang');
    }

    // Edit Barang
    public function editBarang(Request $req, $id)
    {
        $barangs = Barang::select('barangs.*')
        ->where('kd_barang', $id)
        ->first();
        $awal = Mutasi_barang::select('mutasi_barangs.*')
        ->where('id_barang', $id)
        ->orderBY('created_at', 'desc')
        ->limit(1)
        ->first();
        $akhir = Mutasi_barang::select('mutasi_barangs.*')
        ->where('id_barang', $id)
        ->orderBY('created_at', 'desc')
        ->limit(1)
        ->first();

        if ($awal->jumlah_akhir == 0) {
            // edit nama dll
            if ($barangs->jumlah_akhir == $req->jumlah_barang) {
                $barangs->nama_barang = $req->nama_barang;
                $barangs->jumlah_awal = $req->jumlah_barang;
                $barangs->jumlah_akhir = $req->jumlah_barang;
                $barangs->harga = $req->harga_barang;
                $barangs->save();
                
            }else{
                // Tambah barang dari 0
                $barangs->nama_barang = $req->nama_barang;
                $barangs->jumlah_awal = $req->jumlah_barang + $barangs->jumlah_awal;
                $barangs->jumlah_akhir = $req->jumlah_barang;
                $barangs->harga = $req->harga_barang;
                $barangs->total         = ($req->harga_barang * $req->jumlah_barang) + ($barangs->total);
                $barangs->sisa          = ($req->harga_barang * $req->jumlah_barang) + ($barangs->sisa);
                $barangs->save();
                
                $Mutasis = new Mutasi_barang;
                $Mutasis->id_barang     = $barangs->kd_barang; 
                $Mutasis->jumlah_awal   = $awal->jumlah_akhir;
                $Mutasis->jumlah_akhir  = $req->jumlah_barang;
                $Mutasis->total = $req->harga_barang * $req->jumlah_barang;
                $Mutasis->sisa = $req->harga_barang * $req->jumlah_barang;
                $Mutasis->save();
            }
        }else{
            if ($barangs->jumlah_akhir == $req->jumlah_barang) {
                $barangs->nama_barang   = $req->nama_barang;
                $barangs->jumlah_akhir  = $req->jumlah_barang;
                $barangs->harga         = $req->harga_barang;
                $barangs->save();
                
            }else{
                // edit jumlah barang
                $barangs->nama_barang   = $req->nama_barang;
                $barangs->jumlah_akhir  = $req->jumlah_barang;
                $barangs->harga         = $req->harga_barang;
                $barangs->sisa = $barangs->total - ($barangs->total - ($req->jumlah_barang * $barangs->harga));
                $barangs->save();
                
                $Mutasis = new Mutasi_barang;
                $Mutasis->id_barang = $barangs->kd_barang; 
                $Mutasis->jumlah_awal = $awal->jumlah_akhir;
                $Mutasis->jumlah_akhir = $req->jumlah_barang;
                $Mutasis->total = $akhir->total;
                $Mutasis->sisa = $barangs->total - ($barangs->total - ($req->jumlah_barang * $barangs->harga));
                $Mutasis->save();
            }
        }
        
        Session::flash('terubah', 'Data barang berhasil dirubah');
        return redirect('/kelola_barang');
    }

    // Lihat Barang
    public function lihatBarang($id)
    {
        $barangs = Barang::select('barangs.*')
        ->where('kd_barang', $id)
        ->get();
        $mutasis = Mutasi_barang::join('barangs', 'barangs.kd_barang', '=', 'mutasi_barangs.id_barang')
        ->select('mutasi_barangs.*', 'barangs.nama_barang')
        ->where('id_barang', $id)
        ->get();

        return response()->json([
            'barangs' => $barangs,
            'mutasis' => $mutasis
        ]);
    }

    // Hapus
    public function hapusBarang($id)
    {
        Barang::where('kd_barang', $id)->delete();
        Mutasi_barang::where('id_barang', $id)->delete();
        Session::flash('terhapus', 'Data barang berhasil dihapus');
        return redirect('/kelola_barang');
    }

    // Laporan
    public function laporan()
    {
        $barangs = Barang::select('barangs.*')
                    ->orderBy('created_at', 'desc')
                    ->get();
        $jumlah_awal = Barang::join('mutasi_barangs', 'id_barang', '=', 'barangs.kd_barang')
        ->select('barangs.*', 'mutasi_barangs.jumlah_awal', 'mutasi_barangs.jumlah_akhir')
        ->orderBy('mutasi_barangs.created_at', 'asc')
        ->get();
        $jumlah_akhir = Barang::join('mutasi_barangs', 'id_barang', '=', 'barangs.kd_barang')
        ->select('barangs.*', 'mutasi_barangs.jumlah_awal', 'mutasi_barangs.jumlah_akhir')
        ->orderBy('mutasi_barangs.created_at', 'desc')
        ->get();
        return view('halaman_inventory/halaman_laporan_data_barang', compact('barangs', 'jumlah_awal', 'jumlah_akhir'));
    }
}
