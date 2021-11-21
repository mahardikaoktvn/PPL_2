<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Verifikasi;
use App\Models\TambahHasilPanen;
use App\Models\PembayaranPanen;

class UserController extends Controller
{
    public function open(){
        $all = Auth::user();
        $data = $all -> id_account_verify;
        $results = Verifikasi::find($data);
        return view('lihat_profil_petani',['user' => $all, 'title' => 'Profile Petani', 'status' => $results]);
    }

    public function about(){
        return view('tentang_kami', ['title' => 'Tentang Kami']);
    }

    public function edit(){
        return view('edit_profil_petani',['title' => 'Edit Profile Petani']);
    }

    public function create()
    {
        return view('daftar',['title' => 'Daftar']);
    }

    public function simulasi(Request $request)
    {
        $luas = $request -> luaslahan;
        $jumlahbibit = round(4*(100*($luas/144)));
        $modal = number_format(29518000*($luas/144), 2, ",", ".");
        $pred1 = 0.5*$jumlahbibit;
        $pred2 = 1.5*$jumlahbibit;
        $pred3 = 2*$jumlahbibit;
        $bghslpetani1 = number_format(0.4*($pred1 * 500000), 2, ",", ".");
        $bghslpetani2 = number_format(0.4*($pred2 * 500000), 2, ",", ".");
        $bghslpetani3 = number_format(0.4*($pred3 * 500000), 2, ",", ".");
        $bghslmitra1 = number_format(0.6*($pred1 * 500000), 2, ",", ".");
        $bghslmitra2 = number_format(0.6*($pred2 * 500000), 2, ",", ".");
        $bghslmitra3 = number_format(0.6*($pred3 * 500000), 2, ",", ".");
        return view('simulasi',['title' => 'Simulasi Penjualan',
        'luas' => $luas, 
        'bibit' => $jumlahbibit, 
        'modal' => $modal,
        'pred1' => $pred1,
        'pred2' => $pred2,
        'pred3' => $pred3,
        'bghslpetani1' => $bghslpetani1,
        'bghslpetani2' => $bghslpetani2,
        'bghslpetani3' => $bghslpetani3,
        'bghslmitra1' => $bghslmitra1,
        'bghslmitra2' => $bghslmitra2,
        'bghslmitra3' => $bghslmitra3]);
    }

    public function upload(Request $request, User $user){
        $id = Auth::id();
        $request -> validate([
            'alamat' => ['required', 'string', 'max:255'],
            'desa' => ['required', 'string', 'max:255'],
            'kecamatan' => ['required', 'string', 'max:255'],
        ]);

        if ($request -> gambar) {
            $pemilik = $id;
            $imageName = "images/user/$request->gambar->getClientOriginalName()";
            $request->gambar->move("images/user/$pemilik/", $imageName);


            User::where('id', $id)
                ->update([
            'profile_photo' => $imageName,
            'alamat' => "$request->alamat,$request->desa,$request->kecamatan",
            'phone_number' => $request->phone_number,
        ]);
        }
        
        else {
            User::where('id', $id)
            ->update([
            'alamat' => "$request->alamat,$request->desa,$request->kecamatan",
            'phone_number' => $request->phone_number,
            ]);
        }

        return redirect('/profile')->with('status', 'Data Berhasil Ditambahkan!');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:6'],
            'nik' => ['required', 'string', 'max:17'],
            'alamat' => ['required', 'string', 'max:255'],
            'desa' => ['required', 'string', 'max:255'],
            'kecamatan' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'max:255'],
            'cek' => ['required'],
        ]);

        $user = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nik' => $request->nik,
            'alamat' => "$request->alamat,$request->desa,$request->kecamatan",
            'phone_number' => $request->phone_number,
            'id_account_verify' => 0,
            'profile_photo' => "images/kosong.png",
        ]);

        $user -> save();

        return redirect('/login');
    }

    public function lihat_hasil_panen($id)
    {
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
        return view('lihat_hasil_panen_petani', ['title' => 'Hasil Panen', 'data' => $data, 'penjualan' => $penjualan, 'bgptn' => $bghslpetani, 'bgmtr' => $bghslmitra]);
    }
}