<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PawnshopController;
use App\Http\Controllers\ResponseController;

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
    return view('index');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/auth', [PawnshopController::class, 'auth'])->name('auth');
Route::get('/logout', [PawnshopController::class, 'logout'])->name('logout');

Route::prefix('/pawnshop')->name('pawnshop')->group(function() {
    Route::post('/store', [PawnshopController::class, 'store'])->name('.store');
});

Route::middleware('cekRole:admin')->prefix('/admin')->name('admin')->group(function() {
    Route::get('/data', [PawnshopController::class, 'dataAdmin'])->name('.data');
    Route::get('/print/pdf', [PawnshopController::class, 'printPDF'])->name('.print-pdf');
    Route::get('/print/excel', [PawnshopController::class, 'printExcel'])->name('.print-excel');
});

Route::middleware('cekRole:petugas')->prefix('/petugas')->name('petugas')->group(function() {
    Route::get('/data', [PawnshopController::class, 'dataPetugas'])->name('.data');
    Route::get('/data/status', [PawnshopController::class, 'dataStatus'])->name('.data.status');
    Route::get('/response/{pawnshop_id}', [ResponseController::class, 'edit'])->name('.response.edit');
    Route::patch('/response/{pawnshop_id}', [ResponseController::class, 'update'])->name('.response');
});
