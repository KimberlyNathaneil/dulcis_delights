<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
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

Route::get('/', function (){
    return view('index');
})->name('index');

Route::group(['middleware' => 'SessionCheck'], function () {
    // Route::get('/home', [HomeController::class, 'index'])->name('home');
    // Route::get('/ledger', [LedgerController::class, 'index'])->name('ledger');
    // Route::get('/expenses', [ExpenseController::class, 'index'])->name('expenses');
    Route::resource('expenses', ExpenseController::class);
    Route::resource('incomes', IncomeController::class);
    Route::resource('inventories', InventoryController::class);
    Route::get('/incomes', [IncomeController::class, 'index'])->name('incomes');
    Route::get('/inventories', [InventoryController::class, 'index'])->name('inventories');
});

Route::post('/login', [UserController::class, 'login'])->name('login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

// Route::get('login', [AuthController::class, 'index'])->name('login');

// Route::post('post-login', [AuthController::class, 'postLogin']);

// Route::get('logout', [AuthController::class, 'logout'])->name('logout');


// Route::resource('expenses', ExpenseController::class);
// Route::resource('incomes', IncomeController::class);
// Route::resource('inventories', InventoryController::class);

// Route::resource('ledger', LedgerController::class);
// Route::get('ledger', [LedgerController::class, 'index']);
// Route::get('ledger', function(){
//     $month = date('n');
//     $year = 2024;
//     $total_expense = Expense::whereYear('date', $year)->whereMonth('date', $month)->sum('total_price');
//     $total_income = Income::whereYear('date', $year)->whereMonth('date', $month)->sum('amount');

//     $april_total_expense = Expense::whereYear('date', $year)->whereMonth('date', 4)->sum('total_price');
//     $may_total_expense = Expense::whereYear('date', $year)->whereMonth('date', 5)->sum('total_price');
//     $june_total_expense = Expense::whereYear('date', $year)->whereMonth('date', 6)->sum('total_price');
//     $july_total_expense = Expense::whereYear('date', $year)->whereMonth('date', 7)->sum('total_price');

//     $april_total_income = Income::whereYear('date', $year)->whereMonth('date', 4)->sum('amount');
//     $may_total_income = Income::whereYear('date', $year)->whereMonth('date', 5)->sum('amount');
//     $june_total_income = Income::whereYear('date', $year)->whereMonth('date', 6)->sum('amount');
//     $july_total_income = Income::whereYear('date', $year)->whereMonth('date', 7)->sum('amount');

//     $expenses = Expense::whereYear('date', $year)->whereMonth('date', $month)->get();
//     $incomes = income::whereYear('date', $year)->whereMonth('date', $month)->get();
//     return view('ledger', [
//         'expenses' => $expenses,
//         'incomes' => $incomes,
//         'total_expense' => $total_expense,
//         'total_income' => $total_income,
//         'april_total_expense' => $april_total_expense,
//         'may_total_expense' => $may_total_expense,
//         'june_total_expense' => $june_total_expense,
//         'july_total_expense' => $july_total_expense,

//         'april_total_income' => $april_total_income,
//         'may_total_income' => $may_total_income,
//         'june_total_income' => $june_total_income,
//         'july_total_income' => $july_total_income
//     ]);

    
// });

// Route::resource('record', RecordController::class);
