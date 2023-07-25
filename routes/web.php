<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DivisiController;
use App\Http\Controllers\HomeITController;
use App\Http\Controllers\LoginController as ControllersLoginController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\TeknisiController;
use App\Http\Controllers\PeralatanController;
use App\Http\Controllers\PermintaanController;
use App\Http\Controllers\ManagerPerawatanController;
use App\Http\Controllers\ManagerPerbaikanController;
use App\Http\Controllers\TeknisiPerawatanController;
use App\Http\Controllers\TeknisiPerbaikanController;

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
    return view('auth.login');
});

Auth::routes();

// Route::group(['middleware' => ['auth', 'role:1']], function () {
//     Route::get('/IT/dashboard', [ITController::class, 'dashboard']);
// });

// Route::group(['middleware' => ['auth', 'role:2']], function () {
//     Route::get('/user/dashboard', [UserController::class, 'dashboard']);
// });

// Route::group(['middleware' => ['auth', 'role:3']], function () {
//     Route::get('/manager/dashboard', [ManagerController::class, 'dashboard']);
// });

// Route::group(['middleware' => ['auth', 'role:4']], function () {
//     Route::get('/teknisi/dashboard', [TeknisiController::class, 'dashboard']);
// });


Route::get('/', [LoginController::class, 'showLoginForm']);


// Route::get('/', [LoginController::class, 'index'])->name('login')
// // Route::post('/login', [LoginController::class, 'authenticate']);

// Route::post('/logout', [LoginController::class, 'signout']);

// Route::get('/signup', [RegisterController::class, 'index'])
// Route::post('/signup', [RegisterController::class, 'store']);

// Route::get('/', [LoginController::class, 'login'])->name('login');

Route::middleware(['auth','CheckRole:ITSupport'])->group(function (){
    Route::get('/IT/dashboard', [App\Http\Controllers\ITController::class, 'dashboard'])->middleware('IT');

    // Start IT Support
    
    Route::get('/IT/peralatan', [App\Http\Controllers\ITController::class, 'indexPeralatan']);
    Route::get('/IT/peralatan/create', [App\Http\Controllers\ITController::class, 'createPeralatan']);
    Route::post('/IT/peralatan/store', [App\Http\Controllers\ITController::class, 'storePeralatan']);
    Route::get('/IT/peralatan/edit/{id}', [App\Http\Controllers\ITController::class, 'editPeralatan']);
    Route::patch('/IT/peralatan/update/{id}', [App\Http\Controllers\ITController::class, 'updatePeralatan']);
    Route::delete('/IT/peralatan/delete/{id}', [App\Http\Controllers\ITController::class, 'deletePeralatan']);
    // Route::get('/IT/peralatan/show/{id}', [App\Http\Controllers\ITController::class, 'showPeralatan']);
    // Route::get('/peralatan.pdf', [App\Http\Controllers\ITController::class, 'generatepdf'])->name('peralatan.pdf');
    
    Route::get('/IT/peralatan/cetak_pdf', [App\Http\Controllers\ITController::class, 'cetak_pdf']);
    
    
    Route::get('/IT/divisi', [App\Http\Controllers\ITController::class, 'indexDivisi']);
    Route::get('/IT/divisi/create', [App\Http\Controllers\ITController::class, 'createDivisi']);
    Route::post('/IT/divisi/store', [App\Http\Controllers\ITController::class, 'storeDivisi']);
    Route::get('/IT/divisi/edit/{id}', [App\Http\Controllers\ITController::class, 'editDivisi']);
    Route::patch('/IT/divisi/update/{id}', [App\Http\Controllers\ITController::class, 'updateDivisi']);
    Route::delete('/IT/divisi/delete/{id}', [App\Http\Controllers\ITController::class, 'deleteDivisi']);
    Route::get('/IT/divisi/show/{id}', [App\Http\Controllers\ITController::class, 'showDivisi']);
    
    Route::get('/IT/akun', [App\Http\Controllers\ITController::class, 'indexAkun']);
    Route::get('/IT/akun/create', [App\Http\Controllers\ITController::class, 'createAkun']);
    Route::post('/IT/akun/store', [App\Http\Controllers\ITController::class, 'storeAkun']);
    Route::get('/IT/akun/edit/{id}', [App\Http\Controllers\ITController::class, 'editAkun']);
    Route::patch('/IT/akun/update/{id}', [App\Http\Controllers\ITController::class, 'updateAkun']);
    Route::delete('/IT/akun/delete/{id}', [App\Http\Controllers\ITController::class, 'deleteAkun']);
    Route::get('/IT/akun/show/{id}', [App\Http\Controllers\ITController::class, 'showAkun']);
});


Route::middleware(['auth','CheckRole:User'])->group(function (){
    Route::get('/user/dashboard', [App\Http\Controllers\UserController::class, 'dashboard']);
    Route::get('/user/permintaan', [App\Http\Controllers\UserController::class, 'index']);
    Route::get('/user/permintaan/create', [App\Http\Controllers\UserController::class, 'create']);
    Route::post('/user/permintaan/store', [App\Http\Controllers\UserController::class, 'store']);
    Route::get('/user/permintaan/edit/{id}', [App\Http\Controllers\UserController::class, 'edit']);
    Route::patch('/user/permintaan/update/{id}', [App\Http\Controllers\UserController::class, 'update']);
    Route::delete('/user/permintaan/delete/{id}', [App\Http\Controllers\UserController::class, 'delete']);
    Route::get('/user/permintaan/show/{id}', [App\Http\Controllers\UserController::class, 'show']);
    
    
});



Route::middleware(['auth','CheckRole:Manager'])->group(function (){
// Start Manager MT
Route::get('/manager/dashboard', [App\Http\Controllers\ManagerController::class, 'home']); //->middleware('auth')
Route::get('/manager/perbaikan', [App\Http\Controllers\ManagerPerbaikanController::class, 'index']);
Route::get('/manager/perbaikan/create', [App\Http\Controllers\ManagerPerbaikanController::class, 'create']);
Route::get('/manager/perbaikan/edit/{id}', [App\Http\Controllers\ManagerPerbaikanController::class, 'edit']);
Route::patch('/manager/perbaikan/update/{id}', [App\Http\Controllers\ManagerPerbaikanController::class, 'update']);
Route::delete('/manager/perbaikan/delete/{id}', [App\Http\Controllers\ManagerPerbaikanController::class, 'delete']);
Route::get('/manager/perbaikan/show/{id}', [App\Http\Controllers\ManagerPerbaikanController::class, 'show']);




Route::get('/manager/perawatan', [App\Http\Controllers\ManagerPerawatanController::class, 'index']);
Route::get('/manager/perawatan/create', [App\Http\Controllers\ManagerPerawatanController::class, 'create']);
Route::post('/manager/perawatan/store', [App\Http\Controllers\ManagerPerawatanController::class, 'store']);
Route::get('/manager/perawatan/edit/{id}', [App\Http\Controllers\ManagerPerawatanController::class, 'edit']);
Route::patch('/manager/perawatan/update/{id}', [App\Http\Controllers\ManagerPerawatanController::class, 'update']);
Route::delete('/manager/perawatan/delete/{id}', [App\Http\Controllers\ManagerPerawatanController::class, 'delete']);
 

Route::get('/manager/cetak-perawatan', [App\Http\Controllers\ManagerPerawatanController::class, 'cetakPerawatan']);
Route::get('/manager/cetak-perawatan-pertanggal/{tanggal_awal}/{tanggal_akhir}', [App\Http\Controllers\ManagerPerawatanController::class, 'cetakPerawatanPertanggal'])->name('cetak-perawatan-pertanggal');

Route::get('/manager/cetak-riwayat', [App\Http\Controllers\ManagerController::class, 'cetakRiwayat']);
Route::get('/manager/cetak-riwayat-peralatan/{nama_peralatan}', [App\Http\Controllers\ManagerController::class, 'cetakRiwayatPeralatan'])->name('cetak-perawatan-pertanggal');

Route::get('/manager/cetak-perbaikan', [App\Http\Controllers\ManagerPerbaikanController::class, 'cetakPerbaikan']);
Route::get('/manager/cetak-perbaikan-pertanggal/{tanggal_awal}/{tanggal_akhir}', [App\Http\Controllers\ManagerPerbaikanController::class, 'cetakPerbaikanPertanggal'])->name('cetak-perbaikan-pertanggal');


// End Manager MT
});

// Route::get('/IT/role', [App\Http\Controllers\ITController::class, 'indexRole'])->middleware('auth');
// Route::get('/IT/role/create', [App\Http\Controllers\ITController::class, 'createRole'])->middleware('auth');
// Route::post('/IT/role/store', [App\Http\Controllers\ITController::class, 'storeRole'])->middleware('auth');
// Route::get('/IT/role/edit/{id}', [App\Http\Controllers\ITController::class, 'editRole'])->middleware('auth');
// Route::patch('/IT/role/update/{id}', [App\Http\Controllers\ITController::class, 'updateRole'])->middleware('auth');
// Route::delete('/IT/role/delete/{id}', [App\Http\Controllers\ITController::class, 'deleteRole'])->middleware('auth');
// Route::get('/IT/role/show/{id}', [App\Http\Controllers\ITController::class, 'showRole'])->middleware('auth');
// End IT Support


// Start Penanggung Jawab

// End Penanggung Jawab

Route::middleware(['auth','CheckRole:Teknisi'])->group(function (){

});

// Start Teknisi
Route::get('/teknisi/dashboard', [App\Http\Controllers\TeknisiController::class, 'home']);
Route::get('/teknisi/perbaikan', [App\Http\Controllers\TeknisiController::class, 'indexPerbaikan']);
Route::get('/teknisi/perbaikan/edit/{id}', [App\Http\Controllers\TeknisiController::class, 'editPerbaikan']);
Route::patch('/teknisi/perbaikan/update/{id}', [App\Http\Controllers\TeknisiController::class, 'updatePerbaikan']);
Route::delete('/teknisi/perbaikan/delete/{id}', [App\Http\Controllers\TeknisiController::class, 'deletePerbaikan']);
Route::get('/teknisi/perbaikan/show/{id}', [App\Http\Controllers\TeknisiController::class, 'showPerbaikan']);




Route::get('/teknisi/perawatan', [App\Http\Controllers\TeknisiController::class, 'indexPerawatan']);
Route::get('/teknisi/perawatan/edit/{id}', [App\Http\Controllers\TeknisiController::class, 'editPerawatan']);
Route::patch('/teknisi/perawatan/update/{id}', [App\Http\Controllers\TeknisiController::class, 'updatePerawatan']);
Route::delete('/teknisi/perawatan/delete/{id}', [App\Http\Controllers\TeknisiController::class, 'deletePerawatan']);
Route::get('/teknisi/perawatan/show/{id}', [App\Http\Controllers\TeknisiController::class, 'showPerawatan']);



// Route::get('/teknisi/perawatan/create', [App\Http\Controllers\TeknisiController::class, 'createPerawatan'])->middleware('auth');

// End Teknisi

