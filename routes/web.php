<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EoController;
use App\Http\Controllers\UserEOController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IndoregionController;
use App\Http\Controllers\NarasumberController;
use App\Http\Controllers\RekapitulasiController;

use App\Http\Controllers\PendaftaranEventController;
use App\Http\Controllers\KategoriNarasumberController;
use App\Http\Controllers\PelaporanPersiapanController;
use App\Http\Controllers\PertanyaanPersiapanController;

use App\Http\Controllers\PelaporanEfektivitasController;
use App\Http\Controllers\PelaporanPelaksanaanController;
use App\Http\Controllers\PertanyaanEfektivitasController;
use App\Http\Controllers\PertanyaanPelaksanaanController;
use App\Http\Controllers\PelaporanPaskaPelaksanaanController;
use App\Http\Controllers\PertanyaanPaskaPelaksanaanController;
use App\Http\Controllers\PengawasController;



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

Route::get('/', [HomeController::class,'index']);
route::get('/detail-kegiatan/{id}',[HomeController::class,'show'])->name('detailKegiatan.show');

Route::get('/detail/{id}', [HomeController::class,'show']);

Route::get('/daftar-event/{id}', [PendaftaranEventController::class,'pendaftaranEvent'])->name('pendaftaranEvent');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/search', [HomeController::class,'search'])->name('search');

Route::resource('users', \App\Http\Controllers\UserController::class)
    ->middleware('auth');

Route::resource('peserta',PesertaController::class);


Route::group(['middleware' => ['auth','ceklevel:1,2,3,4']], function () {
    Route::get('/kegiatan', function () {
        return view('/kegiatan', [
            "title" => "Kegiatan"
        ]);
    });
    Route::resource('/kegiatan',\App\Http\Controllers\KegiatanController::class)->except(['update']);
    Route::get('/kegiatan/{id}/delete', [KegiatanController::class,'destroy'])->name('kegiatan.destroy');
    Route::post('kegiatan/{id}/update',[KegiatanController::class,'update'])->name('kegiatan.update');
    Route::post('/getkota',[KegiatanController::class,'getkota'])->name('getkota');
    Route::post('/uploadFile', [KegiatanController::class,'uploadFile'])->name('uploadFile');

    Route::get('/kegiatan-show', [KegiatanController::class ,'index6'])->name('index6');
    Route::post('/kegiatan-show', [KegiatanController::class ,'index6']);
});






Route::post('/daftar-getkota',[HomeController::class,'getkota'])->name('daftar.getkota');


Route::group(['middleware' => ['auth','ceklevel:1,5']], function () {
    Route::get('/kategorinarasumber', function () {
        return view('/kategorinarasumber', [
            "title" => "Kategori Narasumber"
        ]);
    });
    Route::resource('/kategorinarasumber',\App\Http\Controllers\KategoriNarasumberController::class)->except(['show','update']);
    Route::get('/kategorinarasumber/{id}/delete',[KategoriNarasumberController::class,'destroy'])->name('kategori.delete');

    Route::get('/kategori-show', [KategoriNarasumberController::class ,'index4'])->name('index4');
    Route::post('/kategori-show', [KategoriNarasumberController::class ,'index4']);
});


Route::group(['middleware' => ['auth','ceklevel:1,2,3']], function () {
    Route::get('/narasumber', function () {
        return view('/narasumber', [
            "title" => "Narasumber"
        ]);
    });
    Route::resource('narasumber',\App\Http\Controllers\NarasumberController::class);
    // Route::post('/getkota',\App\Http\Controllers\NarasumberController::class,'getkota')->name('getkota');
    
    Route::get('/narasumber-show', [NarasumberController::class ,'index5'])->name('index5');
    Route::post('/narasumber-show', [NarasumberController::class ,'index5']);
});


Route::group(['middleware' => ['auth','ceklevel:1,5']], function () {
    Route::get('/eo', function () {
        return view('/eo', [
            "title" => "EO"
        ]);
    });
    Route::resource('/eo',\App\Http\Controllers\EOController::class)->except(['show','update']);
    
    Route::get('/eo-show', [EoController::class ,'index7'])->name('index7');
    Route::post('/eo-show', [EoController::class ,'index7']);
});



 


Route::group(['middleware' => ['auth','ceklevel:1,2']], function () {
    Route::get('/usereo', function () {
        return view('/usereo', [
            "title" => "User EO"
        ]);
    });
    Route::resource('/usereo', App\Http\Controllers\UserEoController::class)->except(['show','update']);
    
    Route::get('/usereo-show', [UserEOController::class ,'index3'])->name('index3');
    Route::post('/usereo-show', [UserEOController::class ,'index3']);
});



// Pendaftaran Controller
Route::post('/daftar-event/{id}/daftar', [PendaftaranEventController::class,'daftarEvent'])->name('pendaftaranEvent.daftar');

Auth::routes();

Route::group(['middleware' => ['auth','ceklevel:1']], function () {
    Route::resource('piu', \App\Http\Controllers\PiuController::class);
});

Route::get('/profile', [UserController::class,'index'])->name('user.edit-profile');
Route::post('/profile', [UserController::class,'store']);

Route::group(['middleware' => ['auth','ceklevel:5']], function () {
    //Route::resource('pengawas', \App\Http\Controllers\PengawasController::class);

    Route::resource('/persiapan', PertanyaanPersiapanController::class);
    Route::resource('/pelaksanaan', PertanyaanPelaksanaanController::class);
    Route::resource('/paskapelaksanaan', PertanyaanPaskaPelaksanaanController::class);
    Route::resource('/efektivitas', PertanyaanEfektivitasController::class);
});

 

Route::resource('/lappersiapan', PelaporanPersiapanController::class);
Route::resource('/lappelaksanaan', PelaporanPelaksanaanController::class);
Route::resource('/lappaskapelaksanaan', PelaporanPaskaPelaksanaanController::class);
Route::resource('/lapefektivitas', PelaporanEfektivitasController::class);
Route::get('/rekapitulasi', [RekapitulasiController::class, 'index']);
Route::post('/uploadFile', [PelaporanEfektivitasController::class,'uploadFile'])->name('uploadFile');

Route::get('/error', function () {
    return view('/error', [
        "title" => "Error"
    ]);
});

Route::group(['middleware' => ['auth','ceklevel:1,5']], function () {
    Route::resource('pengawas', \App\Http\Controllers\PengawasController::class);

    Route::get('/pengawas-detail', [PengawasController::class ,'index2'])->name('index2');
    Route::post('/pengawas-detail', [PengawasController::class ,'index2']);
});


Route::get('/dashboard', [DashboardController::class,'index']);
// Route::get('/lapefektivitas', [PelaporanEfektivitasController::class,'index']);
