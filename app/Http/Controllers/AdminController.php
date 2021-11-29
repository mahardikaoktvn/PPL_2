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
use App\Models\PembayaranPanen;

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

    public function updatefoto(Request $request){
        $id = Auth::id();
        $request -> validate([
            'gambar' => ['image']
        ]);

        $pemilik = $id;
        $imageName = $request->gambar->getClientOriginalName();
        $request->gambar->move("images/admin/$pemilik/", $imageName);


        AdminModel::where('id_mitra', $id)
            ->update([
            'profile_photo' => "images/admin/$pemilik/$imageName"
        ]);

        return redirect('/profile_mitra')->withErrors(['success' => 'Foto Profil berhasil diubah!']);
    }

    public function upload(Request $request, AdminModel $admin){
        $id = Auth::id();
        $request -> validate([
            'nama' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email', 'max:255'],
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

        return redirect('/profile_mitra')->withErrors(['success' => 'Data berhasil diubah!']);
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
        $data = false;
        return view('detail_kerjasama_hasilpanen', ['title' => 'Tambah Hasil Panen', 'lahan' => $id, 'data' => $data ]);
    }

    public function tambah_hasilpanen(Request $request)
    {   
        $request -> validate([
            'panen_ke' => ['required', 'integer', 'max:4'],
            'tanggal_panen' => ['required', 'date'],
            'hasil_panen' => ['required', 'integer', 'gt:0'],
            'biaya_panen' => ['required', 'integer' , 'gt:0']
        ]);

        $kualitas = "ungraded";

        if ($request ->umur_petik == "2-4") {
            if ($request -> panjang_buah == "max 17") {
                if ($request -> diameter_buah == "<1") {
                    if ($request -> warna == "Hijau mengkilat") {
                        if ($request -> rendemen == "4-8") {
                            $kualitas = "Grade III";
                        }
                    }
                }
            }
        }

        elseif ($request ->umur_petik == "4-6") {
            if ($request -> panjang_buah == "max 17") {
                if ($request -> diameter_buah == "<1") {
                    if ($request -> warna == "Hijau kusam") {
                        if ($request -> rendemen == "9-13") {
                            $kualitas = "Grade II";
                        }
                    }
                }
            }
        }

        elseif ($request ->umur_petik == "6-8") {
            if ($request -> panjang_buah == "min 18") {
                if ($request -> diameter_buah == ">1") {
                    if ($request -> warna == "Kuning kecoklatan") {
                        if ($request -> rendemen == "14-19") {
                            $kualitas = "Grade I";
                        }
                    }
                }
            }
        }

        if ($kualitas == "ungraded") {
            return redirect()->back()->withErrors(['msg' => 'Data yang dimasukkan tidak valid!']);
        }

        else {
            $data = new TambahHasilPanen;
            $data -> id_lahan = $request -> id_lahan;
            $data -> panen_ke = $request -> panen_ke;
            $data -> tanggal_panen = $request -> tanggal_panen;
            $data -> hasil_panen = $request -> hasil_panen;
            $data -> biaya_panen = $request -> biaya_panen;
            $data -> umur_petik = $request -> umur_petik;
            $data -> panjang_buah = $request -> panjang_buah;
            $data -> diameter_buah = $request -> diameter_buah;
            $data -> warna = $request -> warna;
            $data -> rendemen = $request -> rendemen;
            $data -> kualitas_mutu = $kualitas;
            
            $data -> save();

            return redirect("/detail_kerjasama/$request->id_lahan")->withErrors(['success' => 'Hasil Panen Berhasil Ditambahkan!']);
        }
    }

    public function edit_hasilpanen(Request $request, $id)
    {
        $request -> validate([
            'panen_ke' => ['required', 'integer', 'max:4'],
            'tanggal_panen' => ['required', 'date'],
            'hasil_panen' => ['required', 'integer', 'gt:0'],
            'biaya_panen' => ['required', 'integer', 'gt:0']
        ]);

        $kualitas = "ungraded";
        
        if ($request ->umur_petik == "2-4") {
            if ($request -> panjang_buah == "max 17") {
                if ($request -> diameter_buah == "<1") {
                    if ($request -> warna == "Hijau mengkilat") {
                        if ($request -> rendemen == "4-8") {
                            $kualitas = "Grade III";
                        }
                    }
                }
            }
        }

        elseif ($request ->umur_petik == "4-6") {
            if ($request -> panjang_buah == "max 17") {
                if ($request -> diameter_buah == "<1") {
                    if ($request -> warna == "Hijau kusam") {
                        if ($request -> rendemen == "9-13") {
                            $kualitas = "Grade II";
                        }
                    }
                }
            }
        }

        elseif ($request ->umur_petik == "6-8") {
            if ($request -> panjang_buah == "min 18") {
                if ($request -> diameter_buah == ">1") {
                    if ($request -> warna == "Kuning kecoklatan") {
                        if ($request -> rendemen == "14-19") {
                            $kualitas = "Grade I";
                        }
                    }
                }
            }
        }

        if ($kualitas == "ungraded") {
            return redirect()->back()->withErrors(['msg' => 'Data yang dimasukkan tidak valid!']);
        }

        else {
            TambahHasilPanen::where('id_panen', $id)
            ->update([
                'panen_ke' => $request -> panen_ke,
                'tanggal_panen' => $request -> tanggal_panen,
                'hasil_panen' => $request -> hasil_panen,
                'biaya_panen' => $request -> biaya_panen,
                'umur_petik' => $request -> umur_petik,
                'panjang_buah' => $request -> panjang_buah,
                'diameter_buah' => $request -> diameter_buah,
                'warna' => $request -> warna,
                'rendemen' => $request -> rendemen,
                'kualitas_mutu' => $kualitas
            ]);
        return redirect("/detail_kerjasama/$request->id_lahan")->withErrors(['success' => 'Hasil Panen Berhasil Diubah!']);
        }
    }

    public function detail_pembayaran($id){
        $data = false;
        return view('detail_kerjasama_pembayaran_hasilpanen', ['title' => 'Tambah Pembayaran', 'id' => $id , 'data' => $data]);
    }

    public function lihat_hasil_panen($id){
        $data = TambahHasilPanen::where('id_panen', $id)->first();
        $penjualan = false;
        $penjualan = PembayaranPanen::where('id_panen', $id)->get();
        $bghslpetani = 0;
        $bghslmitra = 0;
        foreach ($penjualan as $pjl) {
            $bghslpetani += $pjl -> bagi_hasil_petani; 
            $bghslmitra += $pjl -> bagi_hasil_mitra; 
        }
        $bghslmitra = number_format($bghslmitra, 2, ",", ".");
        $bghslpetani = number_format($bghslpetani, 2, ",", ".");
        return view('lihat_hasil_panen', ['title' => 'Hasil Panen', 'data' => $data, 'penjualan' => $penjualan, 'bgptn' => $bghslpetani, 'bgmtr' => $bghslmitra]);
    }

    public function edit_hasil_panen($id){
        $data = TambahHasilPanen::where('id_panen', $id)->first();
        $lahan = Lahan::where('id_lahan', $data -> id_lahan)->first();
        return view('detail_kerjasama_hasilpanen', ['title' => 'Hasil Panen', 'data' => $data, 'lahan' => $lahan]);
    }

    public function tambah_pembayaran(Request $request){
        
        $request -> validate([
            'pembeli' => ['required', 'integer'],
            'berat' => ['required', 'integer', 'gt:0'],
            'harga_terjual' => ['required', 'integer', 'gt:0'],
            'bukti_pembayaran' => ['required', 'image']
        ]);

        $panen = TambahHasilPanen::where('id_panen', $request -> id_panen)->first();
        $lahan = Lahan::where('id_lahan', $panen -> id_lahan)->first();
        $petani = User::where('id', $lahan -> id_petani)->first();
        $id_petani = $petani -> id;
        $imageName = $request->bukti_pembayaran->getClientOriginalName();
        $request -> bukti_pembayaran->move("assets/user/$id_petani", $imageName);

        $data = new PembayaranPanen;
        $data -> id_panen = $request -> id_panen;
        $data -> tanggal_transaksi = $request -> tanggal_transaksi;
        $data -> pembeli = $request -> pembeli;
        $data -> berat = $request -> berat;
        $data -> harga_terjual = $request -> harga_terjual;
        $data -> bukti_pembayaran = "assets/user/$id_petani/$imageName";
        $data -> bagi_hasil_petani = 0.4*$request-> harga_terjual;
        $data -> bagi_hasil_mitra = 0.6*$request-> harga_terjual;
        
        $data -> save();

        return redirect("/lihat_hasil_panen/$request->id_panen")->withErrors(['success' => 'Data Pembayaran Berhasil Ditambahkan!']);
    }

    public function edit_pembayaran(PembayaranPanen $id){
        $data = false;
        return view('detail_kerjasama_pembayaran_hasilpanen', ['title' => 'Edit Pembayaran', 'data' => $id]);
    }

    public function update_pembayaran(Request $request){

        $request -> validate([
            'pembeli' => ['required', 'integer'],
            'berat' => ['required', 'integer', 'gt:0'],
            'harga_terjual' => ['required', 'integer', 'gt:0'],
        ]);

        if ($request -> bukti_pembayaran) {
            $panen = TambahHasilPanen::where('id_panen', $request -> id_panen)->first();
            $lahan = Lahan::where('id_lahan', $panen -> id_lahan)->first();
            $petani = User::where('id', $lahan -> id_petani)->first();
            $id_petani = $petani -> id;
            $imageName = $request->bukti_pembayaran->getClientOriginalName();
            $request -> bukti_pembayaran->move("assets/user/$id_petani", $imageName);

            PembayaranPanen::where('id_pembayaran', $request -> id_pembayaran)
            ->update([
                'tanggal_transaksi' => $request -> tanggal_transaksi,
                'pembeli' => $request -> pembeli,
                'berat' => $request -> berat,
                'harga_terjual' => $request -> harga_terjual,
                'bukti_pembayaran' => "assets/user/$id_petani/$imageName",
                'bagi_hasil_petani' => 0.4*$request-> harga_terjual,
                'bagi_hasil_mitra' => 0.6*$request-> harga_terjual
            ]);
        }
        else {
            PembayaranPanen::where('id_pembayaran', $request -> id_pembayaran)
            ->update([
                'tanggal_transaksi' => $request -> tanggal_transaksi,
                'pembeli' => $request -> pembeli,
                'berat' => $request -> berat,
                'harga_terjual' => $request -> harga_terjual,
                'bagi_hasil_petani' => 0.4*$request-> harga_terjual,
                'bagi_hasil_mitra' => 0.6*$request-> harga_terjual
            ]);
        }
        return redirect("/lihat_hasil_panen/$request->id_panen")->withErrors(['success' => 'Data Pembayaran Berhasil Diubah!']);
    }

    public function delete_pembayaran(PembayaranPanen $id){
        $data = $id;
        $id -> delete();
        return redirect("/lihat_hasil_panen/$data->id_panen");
    }

    public function delete_hasilpanen(TambahHasilPanen $id){
        $data = $id;
        $id -> delete();
        return redirect("/detail_kerjasama/$data->id_lahan");
    }
}
