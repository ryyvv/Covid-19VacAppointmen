<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\SchedController;


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
    return view('auth/login');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('user', 'fireauth');
// Route::get('/home/customer', [App\Http\Controllers\HomeController::class, 'customer'])->middleware('user', 'fireauth');
Route::get('/email/verify', [App\Http\Controllers\Auth\ResetController::class, 'verify_email'])->name('verify')->middleware('fireauth');
Route::post('login/{provider}/callback', 'Auth\LoginController@handleCallback');
Route::resource('/home/profile', App\Http\Controllers\Auth\ProfileController::class)->middleware('user', 'fireauth');
Route::resource('/password/reset', App\Http\Controllers\Auth\ResetController::class);
Route::resource('/img', App\Http\Controllers\ImageController::class);

Route::get('appointment', [AppointmentController::class, 'index'])->name('appointment')->middleware('user', 'fireauth');
Route::get('patientInfo', [PatientController::class, 'index'])->name('patientInfo')->middleware('user', 'fireauth');
Route::get('schedule', [SchedController::class, 'index'])->name('schedule')->middleware('user', 'fireauth');
