<?php

namespace App\Http\Controllers;
use App\Models\Income;
use App\Models\Expense;


class LedgerController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $months = ['April', 'May', 'June', 'July'];
        $month = date('n');
        $year = 2024;

        $total_expense = Expense::whereYear('date', $year)->whereMonth('date', $month)->sum('total_price');
        $total_income = Income::whereYear('date', $year)->whereMonth('date', $month)->sum('amount');

        $April_total_expense = Expense::whereYear('date', $year)->whereMonth('date', 4)->sum('total_price');
        $May_total_expense = Expense::whereYear('date', $year)->whereMonth('date', 5)->sum('total_price');
        $June_total_expense = Expense::whereYear('date', $year)->whereMonth('date', 6)->sum('total_price');
        $July_total_expense = Expense::whereYear('date', $year)->whereMonth('date', 7)->sum('total_price');

        $April_total_income = Income::whereYear('date', $year)->whereMonth('date', 4)->sum('amount');
        $May_total_income = Income::whereYear('date', $year)->whereMonth('date', 5)->sum('amount');
        $June_total_income = Income::whereYear('date', $year)->whereMonth('date', 6)->sum('amount');
        $July_total_income = Income::whereYear('date', $year)->whereMonth('date', 7)->sum('amount');

        $expenses = Expense::whereYear('date', $year)->whereMonth('date', $month)->get();
        $incomes = Income::whereYear('date', $year)->whereMonth('date', $month)->get();

        return view('ledger', [
            'expenses' => $expenses,
            'incomes' => $incomes,
            'total_expense' => $total_expense,
            'total_income' => $total_income,
            'April_total_expense' => $April_total_expense,
            'May_total_expense' => $May_total_expense,
            'June_total_expense' => $June_total_expense,
            'July_total_expense' => $July_total_expense,
            'April_total_income' => $April_total_income,
            'May_total_income' => $May_total_income,
            'June_total_income' => $June_total_income,
            'July_total_income' => $July_total_income,
            'months' => $months,
        ]);
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