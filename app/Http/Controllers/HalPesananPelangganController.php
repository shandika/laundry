<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\User;
use App\Pelanggan;
use App\Struk;
use App\Transaksi;
use App\Checkout_kilo;
use App\Checkout_satu;
use App\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Twilio\Rest\Client;

class HalPesananPelangganController extends Controller
{
    // Halaman Pesanan Pelanggan
    public function halamanPesananPelanggan()
    {
    	$id = Auth::id();
    	$users = User::find($id);
        if($users->role == 'member')
        {
            $transaksis = Transaksi::join('outlets', 'outlets.id', '=', 'transaksis.id_outlet')
            ->join('users', 'users.kd_pengguna', '=', 'transaksis.kd_pegawai')
            ->select('transaksis.*', 'outlets.nama as nama_outlet', 'users.name as nama_pegawai', 'users.kd_pengguna')
            ->where('kd_pelanggan', $users->kd_pengguna)
            ->get();
            // $pesanans = Pesanan::join('transaksis', 'transaksis.kd_invoice', '=', 'pesanans.kd_invoice')
            // ->select('pesanans.*', 'transaksis.status as status_transaksi')
            // ->where('pesanans.kd_pelanggan', $users->kd_pengguna)
            // ->orderBy('created_at', 'desc')
            // ->get();
            $pesanans = Pesanan::select('pesanans.*')
            ->where('kd_pelanggan', $users->kd_pengguna)
            ->get();
            return view('halaman_pesanan_pelanggan.pesanan_pelanggan_member', compact('transaksis', 'pesanans'));
        }else{
            $transaksis = Transaksi::join('outlets', 'outlets.id', '=', 'transaksis.id_outlet')
            ->join('users', 'users.kd_pengguna', '=', 'transaksis.kd_pegawai')
            ->select('transaksis.*', 'outlets.nama as nama_outlet', 'users.name as nama_pegawai', 'users.kd_pengguna')
            ->where('kd_pelanggan', $users->kd_pengguna)
            ->get();
            // $pesanans = Pesanan::join('transaksis', 'transaksis.kd_invoice', '=', 'pesanans.kd_invoice')
            // ->select('pesanans.*', 'transaksis.status as status_transaksi')
            // ->where('pesanans.kd_pelanggan', $users->kd_pengguna)
            // ->orderBy('created_at', 'desc')
            // ->get();
            $pesanans = Pesanan::select('pesanans.*')
            ->where('kd_pelanggan', $users->kd_pengguna)
            ->get();
            return view('halaman_pesanan_pelanggan.pesanan_pelanggan_non_member', compact('transaksis', 'pesanans'));
        }
    }

    // Melihat Pesanan Pelanggan
    public function lihatPesananPelanggan($id)
    {
    	$transaksis = Transaksi::find($id);
    	$check_kilo = Checkout_kilo::where('kd_invoice', $transaksis->kd_invoice)
        ->count();
        $check_satu = Checkout_satu::where('kd_invoice', $transaksis->kd_invoice)
        ->count();
        $check_struk = Struk::where('kd_invoice', $transaksis->kd_invoice)
        ->count();
        if($check_kilo != 0){
            $checkout_kilos = Checkout_kilo::join('paket_kilos', 'paket_kilos.kd_paket', '=', 'checkout_kilos.kd_paket')
            ->select('checkout_kilos.*', 'paket_kilos.nama_paket', 'paket_kilos.harga_paket as harga_paket_satuan')
            ->where('checkout_kilos.kd_invoice', $transaksis->kd_invoice)
            ->get();
            $checkout_kilo = Checkout_kilo::join('paket_kilos', 'paket_kilos.kd_paket', '=', 'checkout_kilos.kd_paket')
            ->select('checkout_kilos.*', 'paket_kilos.nama_paket', 'paket_kilos.antar_jemput_paket', 'paket_kilos.harga_paket as harga_paket_satuan')
            ->where('checkout_kilos.kd_invoice', $transaksis->kd_invoice)
            ->first();
            $checkout_satus = "";
            $checkout_satu = "";
            $harga_paket = Checkout_kilo::where('kd_invoice', $transaksis->kd_invoice)
            ->sum('checkout_kilos.harga_paket');
        }elseif ($check_satu != 0){
            $checkout_satus = Checkout_satu::join('paket_satus', 'paket_satus.kd_barang', '=', 'checkout_satus.kd_barang')
            ->select('checkout_satus.*', 'paket_satus.nama_barang', 'paket_satus.ket_barang', 'paket_satus.harga_barang as harga_barang_satuan')
            ->where('checkout_satus.kd_invoice', $transaksis->kd_invoice)
            ->get();
            $checkout_satu = Checkout_satu::join('paket_satus', 'paket_satus.kd_barang', '=', 'checkout_satus.kd_barang')
            ->select('checkout_satus.*', 'paket_satus.nama_barang', 'paket_satus.ket_barang', 'paket_satus.harga_barang as harga_barang_satuan')
            ->where('checkout_satus.kd_invoice', $transaksis->kd_invoice)
            ->first();
            $checkout_kilos = "";
            $checkout_kilo = "";
            $harga_paket = Checkout_satu::where('kd_invoice', $transaksis->kd_invoice)
            ->sum('checkout_satus.harga_barang');
        }
        if($check_struk != 0){
            $struks = Struk::select('struks.*')
            ->where('kd_invoice', $transaksis->kd_invoice)
            ->first();
        }else{
            $struks = "";
        }

        return response()->json([
            'transaksis' => $transaksis,
            'checkout_kilos' => $checkout_kilos,
            'checkout_kilo' => $checkout_kilo,
            'checkout_satus' => $checkout_satus,
            'checkout_satu' => $checkout_satu,
            'harga_paket' => $harga_paket,
            'struks' => $struks
        ]);
    }

    // Pesanan Baru
    public function pesanBaru(Request $req)
    {
        $max_transaksi = Pesanan::max('kd_invoice');
        $max_transaksi .= Transaksi::max('kd_invoice');
        $check_max_transkasi = Pesanan::select('pesanans.kd_invoice')
        ->count();
        $check_max_transkasi .= Transaksi::select('transaksis.kd_invoice')
        ->count();
        if($check_max_transkasi == null){
            $max_code_transaksi = "I0001";
        }else{
            $max_code_transaksi = $max_transaksi[1].$max_transaksi[2].$max_transaksi[3].$max_transaksi[4];
            $max_code_transaksi++;
            if($max_code_transaksi <= 9){
                $max_code_transaksi = "I000".$max_code_transaksi;
            }elseif ($max_code_transaksi <= 99) {
                $max_code_transaksi = "I00".$max_code_transaksi;
            }elseif ($max_code_transaksi <= 999) {
                $max_code_transaksi = "I0".$max_code_transaksi;
            }elseif ($max_code_transaksi <= 9999) {
                $max_code_transaksi = "I".$max_code_transaksi;
            }
        }

        $akun = Pelanggan::select('pelanggans.*')
        ->where('kd_pelanggan', $req->kode_pengguna)
        ->first();

        $pesanans = new Pesanan;
        $pesanans->kd_invoice = $max_code_transaksi;
        $pesanans->kd_pelanggan = $req->kode_pengguna;
        $pesanans->jenis_cucian = $req->jenis_cucian;
        $pesanans->pembayaran   = $req->pembayaran;
        $pesanans->status       = 0;
        $pesanans->save();
        
        $sid    = getenv("TWILIO_AUTH_SID");
        $token  = getenv("TWILIO_AUTH_TOKEN");
        $wa_from= getenv("TWILIO_WHATSAPP_FROM");
        $recipient = "+6285759045485";
        $twilio = new Client($sid, $token);
        
        $body = "----Pesanan Baru---- \n Kode Invoice: $max_code_transaksi \n Jenis Cucian: $req->jenis_cucian \n Pembayaran: $req->pembayaran \n Nama Pelanggan: $akun->nama_pelanggan \n Alamat: $akun->alamat_pelanggan \n No HP: $akun->no_hp_pelanggan";

        $twilio->messages->create("whatsapp:$recipient",["from" => "whatsapp:$wa_from", "body" => $body]);

        Session::flash('tersimpan', 'Pesanan Baru Telah Ditambahkan');
        return redirect('/pesanan_saya');
    }

    // Upload Bukti Transfer
    public function uploadBuktiTransfer(Request $req, $id)
    {
        $pesanans = Pesanan::find($id);
        if ($req->transfer != '') {
            $pesanans->status = 1;
            $avatar = $req->file('transfer');
            $fileName = time() . '.' . $avatar->getClientOriginalExtension();
            $avatar->storeAs('public/bukti-transfer', $fileName);
            if ($pesanans->upload) {
				Storage::delete('public/bukti-transfer/' . $pesanans->upload);
			}
            $pesanans->upload = $fileName;
            $pesanans->save();     
        }
		Session::flash('tersimpan', 'Berhasil Mengupload Bukti Transfer');
        return redirect('/pesanan_saya');
    }
}
