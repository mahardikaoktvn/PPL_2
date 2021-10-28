<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\AdminModel;
use App\Models\User;
use App\Models\Desa;
use App\Models\Kecamatan;
use App\Models\Lahan;
use App\Models\TemplateMou;
use App\Models\TambahHasilPanen;

class AdminController extends Controller
{
    
    public function welcome()
    {
        $cust = [];
        $akun = User::where('id_account_verify', 0)->get();
        $akun = $akun->all();
        $itung = count($akun);
        $kerjasama = Lahan::where('id_verify_status', 0)->get();
        $kerjasama = $kerjasama->all();
        $itung1 = count($kerjasama);
        $kerjasamajalan = Lahan::where('id_verify_status', 2)->get();
        $kerjasamajalan = $kerjasamajalan->all();
        $itung2 = count($kerjasamajalan);
        $blmverif = Lahan::where('id_verify_status', 0)->get();
        foreach ($blmverif as $key => $row) {
            $cust[$key] = User::find($row->id_petani);
        }
        if ($blmverif) {
            return view('dashboard',['title' => 'Dashboard Admin', 'data' => $itung, 'data1' => $itung1, 'data2' => $itung2, 'data3' => $blmverif, 'data4' => $cust]);
        }
        else {
            return view('dashboard',['title' => 'Dashboard Admin', 'data' => $itung, 'data1' => $itung1, 'data2' => $itung2]);
        }
        
    }

    public function tampil_verifikasi()
    {

        $data = User::where('id_account_verify', 0)->get();
        return view('verifikasi',['title' => 'Verifikasi Akun', 'data' => $data]);
    }

    public function detail_verifikasi(User $detail_verifikasi)
    {
        $id = $detail_verifikasi->id;
        return view('detail_verifikasi',['title' => 'Detail', 'data' => $detail_verifikasi]);
    }

    public function tolak(User $tolak)
    {
        User::where('id', $tolak -> id)
            ->update([
                'id_account_verify' => 1,
            ]);
        
        return redirect('/verifikasi')->with('status', 'Data Berhasil Diubah!');
    }

    public function terima(User $terima)
    {
        User::where('id', $terima -> id)
            ->update([
                'id_account_verify' => 2,
            ]);
        
        return redirect('/verifikasi')->with('status', 'Data Berhasil Diubah!');
    }

    public function kerjasama()
    {
        $cust1=[];
        $sdhverif = Lahan::where('id_verify_status', 2)->get();
        foreach ($sdhverif as $key => $row) {
            $cust1[$key] = User::find($row->id_petani);
        }
        $data = TemplateMou::get()->last();
        if ($sdhverif) {
            return view('kerjasama', ['title' => 'Kerjasama', 'data1' => $sdhverif, 'data2' => $cust1, 'data' => $data]);
        }
        else {
            return view('kerjasama', ['title' => 'Kerjasama','data' => $data]);        
        }
    }

    public function detail_kerjasama(Lahan $id)
    {
        $data = $id;
        $orang = User::find($data -> id_petani);
        $desa = Desa::where('id_desa', $data -> id_desa)->first();
        $kec = Kecamatan::where('id_kecamatan', $desa -> id_kecamatan)->first();
        $panen = TambahHasilPanen::where('id_lahan', $data -> id_lahan)->get();
        return view('detail_kerjasama', ['title' => 'Detail Kerjasama', 'data' => $data, 'orang' => $orang, 'desa' => $desa, 'kec' => $kec, 'panen' => $panen]);
    }

    public function ambil_data_lahan(Request $request)
    {
        $data = Lahan::where('id_lahan', $request -> id_lahan)->first();
        $orang = User::find($data -> id_petani);
        $desa = Desa::where('id_desa', $data -> id_desa)->first();
        $kec = Kecamatan::where('id_kecamatan', $desa -> id_kecamatan)->first();
        return view('detail_dashboard', ['title' => 'Detail Pengajuan', 'data' => $data, 'orang' => $orang, 'desa' => $desa, 'kec' => $kec]);
    }

    public function open_profile()
    {
        $data = Auth::user();
        return view('lihat_profil_mitra', ['title' => 'Profil Mitra', 'data' => $data]);
    }

    public function edit_profile()
    {
        $data = Auth::user();
        return view('edit_profil_mitra', ['title' => 'Edit Profile Mitra', 'data' => $data]);
    }

    public function upload(Request $request, AdminModel $admin){
        $id = Auth::id();
        $request -> validate([
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255'],
        ]);

        if ($request -> gambar) {
            $pemilik = $id;
            $imageName = "images/admin/$request->gambar->getClientOriginalName()";
            $request->gambar->move("images/admin/$pemilik/", $imageName);


            AdminModel::where('id_mitra', $id)
                ->update([
                'profile_photo' => $imageName,
                'nama' => $request->nama,
                'email' => $request->email,
            ]);
        }
        
        else {
            AdminModel::where('id_mitra', $id)
                ->update([
                'nama' => $request->nama,
                'email' => $request->email,
            ]);
        }

        return redirect('/profile_mitra')->with('status', 'Data Berhasil Ditambahkan!');
    }

    public function tolak_lahan(Lahan $tolak)
    {
        Lahan::where('id_lahan', $tolak -> id_lahan)
            ->update([
                'id_verify_status' => 1,
            ]);
        
        return redirect('/administrator')->with('status', 'Data Berhasil Diubah!');
    }

    public function setuju_lahan(Lahan $setuju)
    {
        Lahan::where('id_lahan', $setuju -> id_lahan)
            ->update([
                'id_verify_status' => 2,
            ]);
        
        return redirect('/administrator')->with('status', 'Data Berhasil Diubah!');
    }

    public function detail_kerjasama_hasilpanen(Lahan $id)
    {
        return view('detail_kerjasama_hasilpanen', ['title' => 'Tambah Hasil Panen', 'lahan' => $id]);
    }

    public function tambah_hasilpanen(Request $request)
    {
        
        $request -> validate([
            'panen_ke' => 'required',
            'tanggal_panen' => 'required',
            'hasil_panen' => 'required',
            'tanggal_penjualan' => 'required',
            'hasil_penjualan' => 'required',
            'foto_bukti_penjualan' => 'required',
        ]);

        $lahan = Lahan::where('id_lahan', $request -> id_lahan)->first();
        $petani = User::where('id', $lahan -> id_petani)->first();
        $id_petani = $petani -> id;
        $imageName = $request->foto_bukti_penjualan->getClientOriginalName();
        $request-> foto_bukti_penjualan->move("assets/user/$id_petani", $imageName);

        $data = new TambahHasilPanen;
        $data -> panen_ke = $request -> panen_ke;
        $data -> tanggal_panen = $request -> tanggal_panen;
        $data -> hasil_panen = $request -> hasil_panen;
        $data -> tanggal_penjualan = $request -> tanggal_penjualan;
        $data -> hasil_penjualan = $request -> hasil_penjualan;
        $data -> foto_bukti_penjualan = "assets/user/$id_petani/$imageName";
        $data -> id_lahan = $request -> id_lahan;
        $data -> bagi_hasil_petani = 0.6*$request->hasil_penjualan;
        $data -> bagi_hasil_mitra = 0.4*$request->hasil_penjualan;
        
        $data -> save();

        return redirect("/detail_kerjasama/$request->id_lahan");
    }
}
