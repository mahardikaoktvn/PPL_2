<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Verifikasi;

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
}