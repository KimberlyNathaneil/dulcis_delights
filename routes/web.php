<?php

use App\Models\income;
use App\Models\Expense;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\LedgerController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\InventoryController;
use App\Models\Inventory;

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

// Route::get('login', [AuthController::class, 'index'])->name('login');

// Route::post('post-login', [AuthController::class, 'postLogin']);

// Route::get('logout', [AuthController::class, 'logout'])->name('logout');


Route::resource('record_expenses', ExpenseController::class);

Route::resource('record_income', IncomeController::class);


Route::resource('record_inventory', InventoryController::class);

// Route::resource('ledger', LedgerController::class);
Route::get('ledger', function(){
    $expenses = Expense::all();
    $incomes = income::all();
    $inventories = Inventory::all();
    return view('ledger', [
        'expenses' => $expenses,
        'incomes' => $incomes,
        'inventories' => $inventories
    ]);
});
// Route::resource('record', RecordController::class);
