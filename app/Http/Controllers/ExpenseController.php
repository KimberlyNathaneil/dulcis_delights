<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $expenses = Expense::all();
        return view('record_expenses', [
            'expenses' => $expenses
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
        Expense::create([
            'date' => request('date'),
            'item_name' => request('item_name'),
            'qty' => request('qty'),
            'unit_price' => request('unit_price'),
            'total_price' => request('total_price'),
            'note' => request('note'),
        ]);

        return redirect('expenses');
    }

    /**
     * Display the specified resource.
     */
    public function show(Expense $expense)
    {
        // dd($expense);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Expense $expense)
    {
        $expenses = Expense::all();
        return view('record_expenses_edit', [
            'expense' => $expense,
            'expenses' => $expenses
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Expense $expense)
    {
        $expense->update([
            'date' => request('date'),
            'item_name' => request('item_name'),
            'qty' => request('qty'),
            'unit_price' => request('unit_price'),
            'total_price' => request('total_price'),
            'note' => request('note'),
        ]);

        return redirect('expenses');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expense $expense)
    {
        $expense->delete();
        return redirect('expenses');
    }
}
