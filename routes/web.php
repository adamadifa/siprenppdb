<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JenispembiayaanController;
use App\Http\Controllers\JenissimpananController;
use App\Http\Controllers\LoaddataController;
use App\Http\Controllers\PasController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PembiayaanController;
use App\Http\Controllers\PendaftarController;
use App\Http\Controllers\SimpananController;
use App\Http\Controllers\TabunganController;
use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Route;

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


Route::get('/', function () {
    return view('Auth.login');
})->name('login');

Route::get('/register', [AuthController::class, 'register']);
Route::post('/storeregister', [AuthController::class, 'storeregister']);


Route::post('/postlogin', [AuthController::class, 'postlogin']);
Route::post('/postlogout', [AuthController::class, 'postlogout']);





Route::middleware(['auth:pendaftaronline'])->group(function () {

    Route::get('/dashboardadmin', [DashboardController::class, 'dashboardadmin']);
    //Pendaftar
    Route::get('/pendaftar', [PendaftarController::class, 'index']);
    Route::post('/pendaftar/{no_pendaftaran}/update', [PendaftarController::class, 'update']);
    Route::get('/pendaftar/{no_pendaftaran}/cetak', [PendaftarController::class, 'cetak']);

    //Pembayaran
    Route::get('/pembayaran', [PembayaranController::class, 'index']);
    Route::post('/pembayaran/{no_pendaftaran}/store', [PembayaranController::class, 'store']);
    Route::delete('/pembayaran/{no_pendaftaran}/delete', [PembayaranController::class, 'delete']);

    //Loaddata
    Route::post('/loaddata/getkota', [LoaddataController::class, 'getkota']);
    Route::post('/loaddata/getkecamatan', [LoaddataController::class, 'getkecamatan']);
    Route::post('/loaddata/getkelurahan', [LoaddataController::class, 'getkelurahan']);
});

Route::get('/pas', [PasController::class, 'index']);
