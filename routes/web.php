<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\AlarmController;
use Illuminate\Auth\Middleware\Authenticate;
use App\Http\Controllers\BankController;
use App\Http\Controllers\BidangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DiklatController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeesCutiController;
use App\Http\Controllers\EmployeesFileController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\JenisKegiatanController;
use App\Http\Controllers\JenjangJabatanController;
use App\Http\Controllers\KelompokJabatanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PendidikanController;
use App\Http\Controllers\ResikoKerjaController;
use App\Http\Controllers\RoleAksesController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\SetAplikasiController;
use App\Http\Controllers\SipController;
use App\Http\Controllers\StrController;
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
use BaconQrCode\Encoder\QrCode as EncoderQrCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeUnit\FunctionUnit;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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
    Route::get('logout','logout')->name('logout');
});

Route::controller(DashboardController::class)->group(function () {
    Route::get('/','index')->middleware('role:user|admin');
});

Route::controller(UnitController::class)->group(function () {
    Route::get('unit','index')->middleware('role:admin|sdi');
    Route::post('unit','store')->middleware('role:admin|sdi');
    Route::put('unit/{unit}','update')->middleware('role:admin|sdi')->name('unit_update');
    Route::get('unit/{unit}','show')->middleware('role:admin|sdi')->name('unit.show');
    Route::get('unit/delete/{id}','delete')->middleware('role:admin|sdi')->name('unit.delete');
});

Route::controller(JabatanController::class)->group(function () {
    Route::get('jabatan','index')->middleware('role:admin|sdi')->name('unit.delete');
    Route::get('jabatan/{jabatan}','show')->middleware('role:admin|sdi')->name('jabatan.show');
    Route::get('jabatan/delete/{id}','delete')->middleware('role:admin|sdi')->name('jabatan.delete');
    Route::post('jabatan','store')->middleware('role:admin|sdi');
    Route::put('jabatan/{jabatan}','update')->middleware('role:admin|sdi')->name('jabatan_update');
});

Route::controller(PendidikanController::class)->group(function () {
    Route::get('pendidikan','index')->middleware('role:admin|sdi');
    Route::get('pendidikan/{pendidikan}','show')->middleware('role:admin|sdi')->name('pendidikan.show');
    Route::get('pendidikan/delete/{id}','delete')->middleware('role:admin|sdi')->name('pendidikan.delete');
    Route::post('pendidikan','store')->middleware('role:admin|sdi');
    Route::put('pendidikan/{pendidikan}','update')->middleware('role:admin|sdi')->name('pendidikan_update');
});

Route::controller(SekolahController::class)->group(function (){
    Route::get('sekolah','index')->name('sekolah');
    Route::get('sekolah/{id}/show','show')->name('sekolah.show');
    Route::get('sekolah/{id}/delete','destroy')->name('sekolah.destroy');
    Route::post('sekolah/post','store')->name('sekolah.store');
    Route::put('sekolah/{sekolah}','update')->name('sekolah.update');
});

Route::controller(EmployeeController::class)->group(function () {
    Route::get('employees','index')->middleware('role:admin|sdi');
    Route::get('employeeinsert','insertdata')->middleware('role:admin|sdi');
    Route::get('employeesedit/{id}','showEdit')->middleware('role:admin|sdi')->name('employees.show');
    Route::get('employees/{id}/diklat','diklat')->middleware('role:admin|sdi')->name('employee.diklat');
    Route::get('employees/{id}/diklatex','diklatEx')->name('employee.diklatEx');
    Route::get('employee/{id}/user','show')->middleware('role:admin|sdi')->name('employee.user');
    Route::post('employees','store')->middleware('role:admin|sdi');
    Route::get('employees/delete/{id}','destroy')->middleware('role:admin|sdi')->name('employee.delete');
    Route::put('employees/{id}','update')->middleware('role:admin|sdi')->name('employees.update');
    Route::get('employee/{id}/kodeqr','kodeqr')->name('employee.kodeqr');
});

Route::controller(EmployeesFileController::class)->group(function () {
    Route::get('employees/{id}/files','show')->middleware('role:admin|sdi')->name('employees.files');
    Route::post('employee/upload','store')->middleware('role:admin|sdi')->name('employees.upload.store');
    Route::delete('employees/deletefile/{id}','destroy')->middleware('role:admin|sdi')->name('employees.file.delete');
});

Route::controller(EmployeesCutiController::class)->group(function () {
    Route::get('employee/{id}/cuti','show')->name('employee.cuti.show');
    Route::post('employee/cuti/post','store')->name('employee.cuti.store');
    Route::get('employee/cuti/{id}/edit','showupdate')->name('employee.cuti.showupdate');
    Route::put('/employee/cuti/{id}/update','update')->name('employee.cuti.update');
    Route::get('/employee/cuti/{id}/delete','destroy')->name('employee.cuti.destroy');
});

Route::controller(StrController::class)->group(function () {
    Route::get('employees/{id}/str','show')->name('employees.str');
    Route::get('employees/{id}/showstr','showUpdate')->name('employee.str.show');
    Route::post('employee/str/upload','store')->name('employees.str.upload');
    Route::put('employee/{str}/strupdate','update')->name('employee.str.update');
    Route::get('employees/delete/str/{id}','destroy')->middleware('role:admin|sdi')->name('str.delete');
});

Route::controller(SipController::class)->group(function () {
    Route::get('employees/{id}/sip','show')->name('employees.sip');
    Route::get('employees/{id}/showsip','showUpdate')->name('employee.sip.show');
    Route::post('employees/sip/upload','store')->name('employees.sip.upload');
    Route::put('employees/{sip}/sip','update')->name('employee.sip.update');
    Route::get('employees/delete/sip/{id}','destroy')->middleware('role:admin|sdi')->name('sip.delete');
});

Route::controller(DiklatController::class)->group(function () {
    //Kegiatan
    Route::get('diklat','index')->middleware('role:admin|diklat')->name('diklat.index');
    Route::get('diklat/{id}','show')->middleware('role:admin|diklat')->name('diklat.show');
    Route::post('diklat','store')->middleware('role:admin|diklat')->name('diklat.store');
    Route::put('diklat/{diklat}','update')->middleware('role:admin|diklat')->name('diklat.update');
    Route::delete('diklat/{id}','destroy')->middleware('role:admin|diklat')->name('diklat.delete');

    //absensi
    Route::get('absensi/{id}/masuk','showAbsensiMasuk')->middleware('role:admin|diklat')->name('diklat.absen.masuk');
    Route::get('absensi/{id}/selesai','showAbsensiSelesai')->middleware('role:admin|diklat')->name('diklat.absen.selesai');
    Route::get('absensi/{id}/manual','showAbsensiManual')->name('diklat.absen.manual');
    Route::get('/absen/{id}/rekap/','RekapAbsensi')->middleware('role:admin|diklat')->name('diklat.absen.rekap');
});

Route::controller(AbsensiController::class)->group(function (){
    Route::post('/absen/masuk', 'store')->middleware('role:admin|diklat')->name('absen.masuk');
    Route::post('/absen/manual','manual')->name('absen.manual');
    Route::put('/absen/selesai', 'update')->middleware('role:admin|diklat')->name('absen.selesai');
    Route::get('/absen/{id}/delete','destroy')->name('absen.destroy');
});

// Route::controller(UserController::class)->group(function () {
//     Route::get('user','index');
//     Route::post('user','store');
// });

Route::controller(AlarmController::class)->group(function (){
    Route::get('alarmkontrak','AlarmOriented')->name('alarm.orientasi');
});

Route::controller(RoleAksesController::class)->group(function (){
    Route::get('role','index')->middleware('role:admin')->name('role.akses');
    Route::get('role/{id}/show','show')->middleware('role:admin')->name('role.show');
    Route::post('role/tambah','store')->middleware('role:admin')->name('role.akses.insert');
    Route::post('role/permission','addUserPermission')->middleware('role:admin')->name('role.permission.user');
    Route::post('role/permission/delete','deleteUserRole')->middleware('role:admin')->name('role.permission.delete');
    Route::delete('role/{id}','destroy')->middleware('role:admin')->name('role.delete');
});


Route::middleware(['role:admin|sdi'])->group(function (){
    Route::resource('kelompok',KelompokJabatanController::class);
    Route::resource('jenjang',JenjangJabatanController::class);
    Route::resource('resikokerja',ResikoKerjaController::class);
    Route::resource('emergencies',UnitEmergencyController::class);
    Route::resource('bidang',BidangController::class);
    Route::resource('statuswp',SttsWpController::class);
    Route::resource('sttskerja',SttsKerjaController::class);
    Route::resource('bank',BankController::class);
    Route::resource('users',UserController::class);
});

Route::controller(SetAplikasiController::class)->group(function (){
    Route::get('setapp','index')->name('set.aplikasi');
    Route::post('setapp/insert','store')->name('set.aplikasi.insert');
});

Route::middleware(['role:admin|diklat'])->group(function (){
    Route::resource('jeniskegiatan',JenisKegiatanController::class);
});

Route::get('profile', function(){
    dd(Auth::user()->employee);
});
