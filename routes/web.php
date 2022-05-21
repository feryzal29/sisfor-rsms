<?php

use App\Http\Controllers\BankController;
use App\Http\Controllers\BidangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\JenjangJabatanController;
use App\Http\Controllers\KelompokJabatanController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PendidikanController;
use App\Http\Controllers\ResikoKerjaController;
use App\Http\Controllers\SttsKerjaController;
use App\Http\Controllers\SttsWpController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UnitEmergencyController;
use App\Models\Bank;
use App\Models\EmergencyIndex;
use App\Models\Pendidikan;
use App\Models\UnitEmergency;
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

Route::controller(DashboardController::class)->group(function () {
    Route::get('/','index');
});

Route::controller(UnitController::class)->group(function () {
    Route::get('unit','index');
    Route::post('unit','store');
    Route::put('unit/{unit}','update')->name('unit_update');
    Route::get('unit/{unit}','show')->name('unit.show');
    Route::get('unit/delete/{id}','delete')->name('unit.delete');
});

Route::controller(PegawaiController::class)->group(function () {
    Route::get('pegawai','index');
});

Route::controller(JabatanController::class)->group(function () {
    Route::get('jabatan','index');
    Route::get('jabatan/{jabatan}','show')->name('jabatan.show');
    Route::get('jabatan/delete/{id}','delete')->name('jabatan.delete');
    Route::post('jabatan','store');
    Route::put('jabatan/{jabatan}','update')->name('jabatan_update');
});

Route::controller(PendidikanController::class)->group(function () {
    Route::get('pendidikan','index');
    Route::get('pendidikan/{pendidikan}','show')->name('pendidikan.show');
    Route::get('pendidikan/delete/{id}','delete')->name('pendidikan.delete');
    Route::post('pendidikan','store');
    Route::put('pendidikan/{pendidikan}','update')->name('pendidikan_update');
});

Route::controller(EmployeeController::class)->group(function () {
    Route::get('employees','index');
    Route::get('employeeinsert','insertdata');
});

 Route::resource('kelompok',KelompokJabatanController::class);
 Route::resource('jenjang',JenjangJabatanController::class);
 Route::resource('resikokerja',ResikoKerjaController::class);
 Route::resource('emergencies',UnitEmergencyController::class);
 Route::resource('bidang',BidangController::class);
 Route::resource('statuswp',SttsWpController::class);
 Route::resource('sttskerja',SttsKerjaController::class);
 Route::resource('bank',BankController::class);