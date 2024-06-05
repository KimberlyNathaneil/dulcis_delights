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

        return redirect('record_income');
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
        return view('record_income', [
            'income' => $income
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
