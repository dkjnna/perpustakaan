<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Pinjam;
use App\Models\Buku;
use App\Models\Anggota;
use Carbon\Carbon;
use App\Models\Kembali;


class Kendali extends Controller
{
    //proses login
    public function login(){
        return view('login');
    }
    public function prosesLogin(Request $request){
        $kode_admin= $request->kode_admin;
        $data= Admin::where('kode_admin', $kode_admin)->count();
        if ($data>0) {
            $request->session()->put('kode_admin', $kode_admin);

            return redirect('dataPinjam');
        }else {
            echo 'kode admin tidak ada || ';
            echo '<a href="login">kembali ke halaman login</a>';
        }
    }

    //logout
    public function logout(Request $request){
        $request->session()->forget('kode_admin');
        return redirect('login');
    }

    //ambil data pinjam
    public function dataPinjam(){
        $data= Pinjam::select('pinjams.tanggal_pinjam', 'anggotas.nis', 'anggotas.siswa', 'bukus.noseri', 'bukus.judul', 'pinjams.tanggal_pengembalian')
        ->join('anggotas', 'anggotas.nis', '=', 'pinjams.nis')
        ->join('bukus', 'bukus.noseri', '=', 'pinjams.noseri')->get();
        return view('dataPinjam', ['pinjam'=>$data]);
    }

    //ambil penjam buku
    public function pinjambuku(){
        $buku= Buku::all();
        $anggota= Anggota::all();

        return view('pinjambuku', ['bukunya'=>$buku, 'anggotanya'=>$anggota]);
    }

    public function simpan(Request $request){
        Pinjam::create([
            'tanggal_pinjam'=>Carbon::now()->format('Y-m-d'),
            'nis'=>$request->nis,
            'noseri'=>$request->noseri,
            'tanggal_pengembalian'=>Carbon::now()->addDays(3)->toDateString(),
            'kode_admin'=>session()->get('kode_admin')
        ]);
        return redirect('dataPinjam');
    }

    //kembali
    public function kembali(Request $request){
        $nis = $request->nis;

    $pinjam = Pinjam::select('bukus.judul', 'bukus.noseri','pinjams.tanggal_pinjam','pinjams.tanggal_pengembalian', 'pinjams.id')
    ->join('bukus', 'bukus.noseri', '=', 'pinjams.noseri')
    ->where('nis', $nis)->get();

    return view('dataKembali', ['pinjaman'=>$pinjam]);

    }

    public function kembalikanBuku($id){
        $data = Pinjam::where('id', $id)->first();
        Kembali::create([
            'tanggal_pinjam'=>$data->tanggal_pinjam,
            'nis'=>$data->nis,
            'noseri'=>$data->noseri,
            'tanggal_pengembalian'=>$data->tanggal_pengembalian
        ]);

        $data1 = Pinjam::findOrfail($id);
        $data1->delete();
        return redirect('ambilKembali');
    }

    //ambil data kembali
    public function ambilKembali(){
        $data= Buku::select('bukus.noseri', 'bukus.judul', 'kembalis.tanggal_pinjam', 'kembalis.tanggal_pengembalian')
        ->join('kembalis', 'bukus.noseri', '=', 'kembalis.noseri')->get();
        return view('bukuKembali', ['kembali'=>$data]);
    }

}
