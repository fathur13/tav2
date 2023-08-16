<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\ApiPostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CuacaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KelembapanController;
use App\Http\Controllers\KetinggianairController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SuhuController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::post('/export', [TesController::class, 'exportData'])->name('export.data');
// Route::get('/tes', function () {
//     return view('tes');
// });

Route::get('/profile', function () {
    return view('auth.profil');
});

Route::get('/apichart', [DashboardController::class, 'apiChart']);

Route::get('/get-ka-status', [KetinggianairController::class, 'getKIDStatus'])->name('get-ka-status');
Route::get('/chartMenit', [KetinggianairController::class, 'chartMenit']);
Route::get('/chartJam', [KetinggianairController::class, 'chartJam']);
Route::get('/chartHari', [KetinggianairController::class, 'chartHari']);

Route::get('/chartKelembapanDetik', [KelembapanController::class, 'chartDetik']);
Route::get('/chartKelembapanJam', [KelembapanController::class, 'chartJam']);
Route::get('/chartKelembapanHari', [KelembapanController::class, 'chartHari']);
Route::get('/bacakelembapan', [KelembapanController::class, 'bacakelembapan']);

Route::get('/bacacuaca', [CuacaController::class, 'bacacuaca']);
Route::get('/chartCuacaDetik', [CuacaController::class, 'chartDetik']);

Route::get('/bacasuhu', [SuhuController::class, 'bacasuhu']);
Route::get('/chartSuhuDetik', [SuhuController::class, 'chartDetik']);
Route::get('/chartSuhuJam', [SuhuController::class, 'chartJam']);
Route::get('/chartSuhuHari', [SuhuController::class, 'chartHari']);

Route::middleware('auth')->group(function () {
    // dashboard
    Route::get('dashboard', [DashboardController::class, 'index']);
    Route::get('/export', [DashboardController::class, 'export']);

    //ketinggian air
    Route::get('/ketinggian_air', [KetinggianairController::class, 'index']);
    Route::get('/ketinggian_air/export', [KetinggianairController::class, 'export']);

    //suhu
    Route::get('/suhu', [SuhuController::class, 'index']);
    Route::get('/suhu/export', [SuhuController::class, 'export']);

    //kelembapan
    Route::get('/kelembapan', [KelembapanController::class, 'index']);
    Route::get('/kelembapan/export', [KelembapanController::class, 'export']);

    //cuaca
    Route::get('/cuaca', [CuacaController::class, 'index']);
    Route::get('/cuaca/export', [CuacaController::class, 'export']);

    //report
    Route::get('/report', [ReportController::class, 'index']);
    Route::get('/report/export', [ReportController::class, 'export']);
    Route::get('/report/exportbyrange', [ReportController::class, 'exportbyrange']);
});

//Api
Route::get('/public_api', [ApiController::class, 'index']);

//auth
Route::get('/', [AuthController::class, 'index'])->name('login');
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('actionlogin');
Route::get('/logout', [AuthController::class, 'logout'])->name('actionlogout');
