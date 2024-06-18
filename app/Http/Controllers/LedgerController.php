<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

class LedgerController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $month = date('n');
        $year = 2024;

        $total_expense = Expense::whereYear('date', $year)->whereMonth('date', $month)->sum('total_price');
        $total_income = Income::whereYear('date', $year)->whereMonth('date', $month)->sum('amount');

        $april_total_expense = Expense::whereYear('date', $year)->whereMonth('date', 4)->sum('total_price');
        $may_total_expense = Expense::whereYear('date', $year)->whereMonth('date', 5)->sum('total_price');
        $june_total_expense = Expense::whereYear('date', $year)->whereMonth('date', 6)->sum('total_price');
        $july_total_expense = Expense::whereYear('date', $year)->whereMonth('date', 7)->sum('total_price');

        $april_total_income = Income::whereYear('date', $year)->whereMonth('date', 4)->sum('amount');
        $may_total_income = Income::whereYear('date', $year)->whereMonth('date', 5)->sum('amount');
        $june_total_income = Income::whereYear('date', $year)->whereMonth('date', 6)->sum('amount');
        $july_total_income = Income::whereYear('date', $year)->whereMonth('date', 7)->sum('amount');

        $expenses = Expense::whereYear('date', $year)->whereMonth('date', $month)->get();
        $incomes = Income::whereYear('date', $year)->whereMonth('date', $month)->get();

        return view('ledger', [
            'expenses' => $expenses,
            'incomes' => $incomes,
            'total_expense' => $total_expense,
            'total_income' => $total_income,
            'april_total_expense' => $april_total_expense,
            'may_total_expense' => $may_total_expense,
            'june_total_expense' => $june_total_expense,
            'july_total_expense' => $july_total_expense,
            'april_total_income' => $april_total_income,
            'may_total_income' => $may_total_income,
            'june_total_income' => $june_total_income,
            'july_total_income' => $july_total_income,

        ]);
    }
        
}   


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
      
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {

    }
}