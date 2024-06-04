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

Route::get('/record_inventory', function () {
    return view('record_inventory');
});

Route::get('/record_income', function () {
    return view('record_income');
});