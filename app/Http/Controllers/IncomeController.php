<?php

namespace App\Http\Controllers;

use App\Models\Income;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $incomes = Income::all();
        return view('record_income', [
            'incomes' => $incomes
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
    public function store(Request $request)
    {
        Income::create([
            'date' => request('date'),
            'customer_name' => request('customer_name'),
            'payment_method' => request('payment_method'),
            'amount' => request('amount'),
            'note' => request('note'),
        ]);

        return redirect('incomes');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Income $income)
    {
        $incomes = Income::all();
        return view('record_income_edit', [
            'income' => $income,
            'incomes' => $incomes
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Income $income)
    {
        $income->update([
            'date' => request('date'),
            'customer_name' => request('customer_name'),
            'payment_method' => request('payment_method'),
            'amount' => request('amount'),
            'note' => request('note')
        ]);

        return redirect('incomes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Income $income)
    {
        $income->delete();
        return redirect('incomes');
    }
}
