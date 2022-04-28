<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pelanggan;
use App\User;
use Session;
use Illuminate\Support\Facades\Hash;

class HalDepanController extends Controller
{
    //Membuka Halaman Depan
    public function index()
    {
    	return view('front_end.halaman_depan');
    }

    //Membuka Halaman Registrasi
    public function registrasi()
    {
    	return view('front_end.halaman_registrasi');
    }

    // Cek Email
    public function lupaPassword()
    {
        return view('front_end.halaman_cek_email');
    }

    //Masukan Password
    public function cekEmail(Request $req)
    {
        $email = Pelanggan::select('pelanggans.*')
        ->where('email_pelanggan', $req->email)
        ->first();
        if ($email) {
            $req->session()->put('email',$req->email);
            $session = $email->kd_pelanggan;
            return view('front_end.halaman_ganti_password', compact('session'));
        }else{
            Session::flash('gagal_login', 'Maaf Email yang Anda Masukan Salah');
            return redirect('/lupa_password');
        }
    }

    // Ganti Password
    public function gantiPassword(Request $req,$session)
    {
        $penggunas = User::select('users.*')
        ->where('kd_pengguna', $session)
        ->first();
        $penggunas->password = Hash::make($req->password);
        $penggunas->save();
        $pelanggans = Pelanggan::select('pelanggans.*')
        ->where('kd_pelanggan', $session)
        ->first();
        $pelanggans->password = $req->password;
        $pelanggans->save();
        $req->session()->forget('email');
        Session::flash('terubah', 'Password berhasil dirubah');
        return redirect('/login');
    }
}
