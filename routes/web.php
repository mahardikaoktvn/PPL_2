<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\EkspedisiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LahanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/login', [LoginController::class,'index'])->name('login');
Route::post('/proses_login', [LoginController::class, 'proses_login'])->name('proses_login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/daftar', [UserController::class,'store']);
Route::get('/register', [UserController::class,'create'])->name('register');
Route::get('/',[PagesController::class, 'home']);
Route::get('/dashboard',[PagesController::class, 'home']);
Route::get('/about',[UserController::class, 'about']);
Route::post('/simulasi',[UserController::class, 'simulasi']);

Route::group(['middleware'=>['auth:user']], function(){
        Route::get('/profile', [UserController::class,'open']);
        Route::post('/editprofile', [UserController::class,'upload']);
        Route::get('/editprofile', [UserController::class,'edit']);
        Route::post('/updatefotopetani',[UserController::class, 'updatefoto']);
        Route::get('/tambah_pengajuan_petani', [LahanController::class, 'ambil_kerjasama']);
        Route::post('/ajukan', [LahanController::class, 'ajukan_kerjasama']);
        Route::get('/detail_pengajuan_petani', [LahanController::class, 'coba']);
        Route::get('/getDesa/{id}', [LahanController::class, 'getDesa']);
        Route::get('/lihat_hasil_panen_petani/{id}', [UserController::class, 'lihat_hasil_panen']);
});

Route::group(['middleware'=>['auth:admin']], function(){
        Route::get('/administrator', [AdminController::class, 'welcome']);
        Route::get('/verifikasi', [AdminController::class, 'tampil_verifikasi']);
        Route::get('/detail_kerjasama_hasilpanen/{id}', [AdminController::class, 'detail_kerjasama_hasilpanen']);
        Route::get('/profile_mitra', [AdminController::class, 'open_profile']);
        Route::get('/lihat_hasil_panen/{id}', [AdminController::class, 'lihat_hasil_panen']);
        Route::post('/upload_mou', [LahanController::class, 'upload_mou']);
        Route::get('/editprofile_mitra', [AdminController::class, 'edit_profile']);
        Route::post('/editprofile_mitra', [AdminController::class, 'upload']);
        Route::post('/detail_dashboard', [AdminController::class, 'ambil_data_lahan']);
        Route::get('/kerjasama',[AdminController::class, 'kerjasama']);
        Route::get('/profileadmin', [AdminController::class, 'edit_profile']);
        Route::get('/detail_kerjasama/{id}',[AdminController::class, 'detail_kerjasama']);
        Route::get('/detail_pembayaran/{id}',[AdminController::class, 'detail_pembayaran']);
        Route::get('/edit_hasil_panen/{id}',[AdminController::class, 'edit_hasil_panen']);
        Route::get('/{detail_verifikasi}', [AdminController::class, 'detail_verifikasi']);
        Route::post('/tambah_hasilpanen', [AdminController::class, 'tambah_hasilpanen']);
        Route::post('/edit_hasilpanen/{id}', [AdminController::class, 'edit_hasilpanen']);
        Route::post('/tambah_pembayaran', [AdminController::class, 'tambah_pembayaran']);
        Route::get('/edit_pembayaran/{id}', [AdminController::class, 'edit_pembayaran']);
        Route::post('/update_pembayaran', [AdminController::class, 'update_pembayaran']);
        Route::get('/delete_pembayaran/{id}', [AdminController::class, 'delete_pembayaran']);
        Route::get('/hapus_hasil_panen/{id}', [AdminController::class, 'delete_hasilpanen']);
        Route::post('/updatefoto',[AdminController::class, 'updatefoto']);
        Route::get('/tolak/{tolak}', [AdminController::class, 'tolak']);
        Route::get('/terima/{terima}', [AdminController::class, 'terima']);
        Route::get('/tolak_lahan/{tolak}', [AdminController::class, 'tolak_lahan']);
        Route::get('/setuju_lahan/{setuju}', [AdminController::class, 'setuju_lahan']);
});