<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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
    return view('welcome');
});

Route::post('saveVisitor', [HomeController::class, 'saveVisitorDetails'])->name('saveVisitor');
Route::post('saveContact', [HomeController::class, 'saveContactDetails'])->name('saveContact');
Route::get('showSucess/{id}', [HomeController::class, 'showAddressPage'])->name('showSucess');
Route::post('addAddress', [HomeController::class, 'addAddressDetails'])->name('addAddress');
Route::get('greetings', function () { return view('greeting'); })->name('greetings');
