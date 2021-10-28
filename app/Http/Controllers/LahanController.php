<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Lahan;
use App\Models\Desa;
use App\Models\Kecamatan;
use App\Models\User;
use App\Models\VerifikasiLahan;
use App\Models\TambahHasilPanen;
use App\Models\TemplateMou;
use Illuminate\Http\Request;

class LahanController extends Controller
{

    public function ajukan_kerjasama(Request $request){
        if (Auth::user()) {
            $docValidator = $request -> validate([
                'lokasi_lahan' => 'required',
                'luas_lahan' => 'required',
                'id_desa' => 'required',
                'tanggal_tanam' => 'required',
                'jumlah_bibit' => 'required',
                'foto_bukti_lahan' => 'required|mimes:jpeg,jpg,png,gif',
                'dokumen_mou' => 'required|mimes:docx,doc,pdf',
            ]);

            if ($request -> foto_bukti_lahan && $request -> dokumen_mou) {
                $imageName = $request->foto_bukti_lahan->getClientOriginalName();
                $docName = $request->dokumen_mou->getClientOriginalName();
                $pemilik = Auth::id();
                $request-> foto_bukti_lahan->move("assets/user/$pemilik/", $imageName);
                $request-> dokumen_mou->move("assets/user/$pemilik/", $docName);

                $lahan = new Lahan;
                $lahan -> luas_lahan = $request -> luas_lahan;
                $lahan -> lokasi_lahan = $request->lokasi_lahan;
                $lahan -> id_desa = $request -> id_desa;
                $lahan -> id_petani = Auth::id();
                $lahan -> foto_bukti_lahan = "assets/user/$pemilik/$imageName";
                $lahan -> tanggal_tanam = $request -> tanggal_tanam;
                $lahan -> jumlah_bibit = $request -> jumlah_bibit;
                $lahan -> dokumen_mou = "assets/user/$pemilik/$docName";
                $lahan -> id_verify_status = 0;
                
                $lahan -> save();

                return redirect('/detail_pengajuan_petani');
            }
        }
        return redirect('/tambah_pengajuan_petani');
    }

    public function coba(){
        $id = Auth::id();
        $bool = Lahan::where('id_petani', $id)->first();
        $data = $bool -> id_verify_status;
        $results = VerifikasiLahan::find($data);
        $desa = Desa::where('id_desa', $bool -> id_desa)->first();
        $kec = Kecamatan::where('id_kecamatan', $desa -> id_kecamatan)->first();
        if ($bool->id_verify_status == 2) {
            $panen = TambahHasilPanen::where('id_lahan', $bool -> id_lahan)->get();
            return view('/detail_pengajuan_petani_after', ['title' => 'Detail Kerjasama', 'data' => $bool,'verif' => $results, 'desa' => $desa, 'kec' => $kec,'panen' => $panen]);
        }
        else {
            return view('/detail_pengajuan_petani_before', ['title' => 'Detail Pengajuan', 'data' => $bool,'verif' => $results, 'desa' => $desa, 'kec' => $kec]);
        }
    }

    public function ambil_kerjasama(){
        $id = Auth::id();
        $bool = Lahan::where('id_petani', $id)->first();
        if ($bool) {
            return redirect()->intended('detail_pengajuan_petani');
        }
        else {
            $kecamatan = Kecamatan::get();
            return view('tambah_pengajuan_petani', ['title' => 'Pengajuan', 'kecamatan' => $kecamatan]);
        }
    }

    public function getDesa($id) {
        $desa = Desa::where('id_kecamatan',$id)->get();
        return response()->json($desa);
    }

    public function upload_mou(Request $request){
        if (Auth::user()) {
            $docValidator = $request -> validate([
                'mou' => 'required|mimes:docx,doc,pdf',
            ]);

            $docName = $request->mou->getClientOriginalName();
            $request->mou->move("assets/mou/", $docName);

            $mou = new TemplateMou;
            $mou -> file_mou = "assets/mou/$docName";
            
            $mou -> save();

            return redirect('/kerjasama')->with('message', 'Mou berhasil di upload!');;
        }
    }
}
