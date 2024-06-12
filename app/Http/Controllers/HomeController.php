<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Expense; 
use App\Models\income;

class HomeController extends Controller
{
    public function index() {
        $now = Carbon::now();
        $monthExpense =  Expense::whereMonth('date', $now->month)->whereYear('date', $now->year)->sum('total_price');
        $monthIncome = Income::whereMonth('date', $now->month)->whereYear('date', $now->year)->sum('amount');
        
        $expenses = Expense::whereMonth('date', $now->month)->whereYear('date', $now->year)->get();
        $incomes = Income::whereMonth('date', $now->month)->whereYear('date', $now->year)->get();
        
        $transactions = $expenses->concat($incomes)->sortByDesc('date');

        $groupedTransactions = $transactions->groupBy(function($date) {
            return Carbon::parse($date->date)->format('d-m-Y');
        });

        return view('home', ['monthExpense' => $monthExpense, 'monthIncome' => $monthIncome, 'transactions' => $transactions, 'groupedTransactions' => $groupedTransactions]);
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