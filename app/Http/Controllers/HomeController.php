<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Expense; 
use App\Models\income;

class HomeController extends Controller
{
    public function index() {
        $now = Carbon::now();
        $monthExpense =  Expense::whereMonth('created_at', $now->month)->whereYear('created_at', $now->year)->sum('total_price');
        $monthIncome = Income::whereMonth('created_at', $now->month)->whereYear('created_at', $now->year)->sum('amount');

        return view('home', ['monthExpense' => $monthExpense, 'monthIncome' => $monthIncome]);
    }


    // public function monthExpense() {
    //     $now = Carbon::now();
    //     $monthExpense = Expense::whereMonth('created_at', $now->month)->whereYear('created_at', $now->year)->sum('total_price');
    //     return $monthExpense;
    // }

    // public function monthIncome() {
    //     $now = Carbon::now();
    //     $monthIncome = Income::whereMonth('created_at', $now->month)->whereYear('created_at', $now->year)->sum('amount');
    //     return $monthIncome;
    // }
}