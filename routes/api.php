<?php

use App\Http\Controllers\DiklatController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller('users', 'UserController');
Route::get('/pegawai/{nip}', [DiklatController::class, 'getEmployees'])->name('api.pegawai');
// Route::controller(DiklatController::class)->group(function () {
//     Route::get('pegawai/{nip}','getEmployees')->name('pegawai.nip');
// });
