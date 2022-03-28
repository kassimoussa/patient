<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\UserController;

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

/* Route::get('/', function () {
    return view('index');
}); */

Route::get('/', function () {
    return view('connexion');
});
Route::post('check', [UserController::class, 'check'])->name('check'); 

 

Route::group(['middleware' => ['logged']], function () { 
    Route::get('index', [UserController::class, 'index']);
    
    Route::get('create_patient', [PatientController::class, 'create']);
    Route::get('show_patient/{patient}', [PatientController::class, 'show']);
    Route::get('create_consultation/{patient}', [PatientController::class, 'create_consultation']);
    Route::post('store_patient', [PatientController::class, 'store']);
    Route::post('/store_consultation', [PatientController::class, 'store_consultation']);
    Route::get('getConsultation', [PatientController::class, 'getConsultation'])->name('getConsultation');


});

