<?php

use App\Http\Controllers\AbsensiController;
use Illuminate\Auth\Middleware\Authenticate;
use App\Http\Controllers\BankController;
use App\Http\Controllers\BidangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DiklatController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeesFileController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\JenisKegiatanController;
use App\Http\Controllers\JenjangJabatanController;
use App\Http\Controllers\KelompokJabatanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PendidikanController;
use App\Http\Controllers\ResikoKerjaController;
use App\Http\Controllers\SttsKerjaController;
use App\Http\Controllers\SttsWpController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UnitEmergencyController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Authenticate as MiddlewareAuthenticate;
use App\Models\Bank;
use App\Models\EmergencyIndex;
use App\Models\Pendidikan;
use App\Models\UnitEmergency;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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

Route::controller(LoginController::class)->group(function () {
    Route::get('login','index')->name('login');
    Route::post('login','store')->name('login.store');
    Route::get('logout','logout');
});


Route::controller(DashboardController::class)->group(function () {
    // Route::get('/','index')->middleware('role:admin')->name('admin.page');
    Route::get('/','index');
});

Route::controller(UnitController::class)->group(function () {
    Route::get('unit','index');
    Route::post('unit','store');
    Route::put('unit/{unit}','update')->name('unit_update');
    Route::get('unit/{unit}','show')->name('unit.show');
    Route::get('unit/delete/{id}','delete')->name('unit.delete');
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
    Route::get('employeesedit/{id}','showEdit')->name('employees.show');
    Route::get('employees/{id}/diklat','diklat')->name('employee.diklat');
    Route::post('employees','store');
    Route::get('employees/delete/{id}','destroy')->name('employees.delete');
    Route::put('employees/{id}','update')->name('employees.update');
});

Route::controller(EmployeesFileController::class)->group(function () {
    Route::get('employees/{id}/files','show')->name('employees.files');
    Route::post('employee/upload','store')->name('employees.upload.store');
    Route::delete('employees/deletefile/{id}','destroy')->name('employees.file.delete');
});

Route::controller(DiklatController::class)->group(function () {
    //Kegiatan
    Route::get('diklat','index')->name('diklat.index');
    Route::get('diklat/{id}','show')->name('diklat.show');
    Route::post('diklat','store')->name('diklat.store');
    Route::put('diklat/{diklat}','update')->name('diklat.update');
    Route::delete('diklat/{id}','destroy')->name('diklat.delete');

    //absensi
    Route::get('absensi/{id}/masuk','showAbsensiMasuk')->name('diklat.absen.masuk');
    Route::get('absensi/{id}/selesai','showAbsensiSelesai')->name('diklat.absen.selesai');
    Route::get('/absen/{id}/rekap/','RekapAbsensi')->name('diklat.absen.rekap');
});

Route::controller(AbsensiController::class)->group(function (){
    Route::post('/absen/masuk', 'store')->name('absen.masuk');
    Route::put('/absen/selesai', 'update')->name('absen.selesai');
});

// Route::controller(UserController::class)->group(function () {
//     Route::get('user','index');
//     Route::post('user','store');
// });

 Route::resource('kelompok',KelompokJabatanController::class);
 Route::resource('jenjang',JenjangJabatanController::class);
 Route::resource('resikokerja',ResikoKerjaController::class);
 Route::resource('emergencies',UnitEmergencyController::class);
 Route::resource('bidang',BidangController::class);
 Route::resource('statuswp',SttsWpController::class);
 Route::resource('sttskerja',SttsKerjaController::class);
 Route::resource('bank',BankController::class);
 Route::resource('jeniskegiatan',JenisKegiatanController::class);
 
 Route::resource('users',UserController::class);
