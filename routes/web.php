<?php

use App\Models\expenses;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LedgerController;

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

Route::get('/', function () {
    return view('home');
});

Route::get('/login', function (){
    return view('login.index');
});

Route::get('login', [AuthController::class, 'index'])->name('login');

Route::post('post-login', [AuthController::class, 'postLogin']);

Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/record', function () {
    return view('record');
});

Route:: get('/record_expenses', function () {
    return view('record_expenses', [
        "title" => "records",
        "record_expenses" => expenses::all()
    ]);
});

Route::resource('ledger', LedgerController::class);
// Route::resource('record', RecordController::class);


Route::get('/record_inventory', function () {
    return view('record_inventory');
});

Route::get('/record_income', function () {
    return view('record_income');
});

Route::get('/proses_record_expenses', function () {
    return view('proses_record_expenses');
});

Route::get('/proses_record_income', function () {
    return view('proses_record_income');
});

Route::get('/proses_record_inventory', function () {
    return view('proses_record_inventory');
});