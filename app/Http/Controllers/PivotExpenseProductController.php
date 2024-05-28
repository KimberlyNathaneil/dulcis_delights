<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PivotExpenseProductController extends Controller
{
    public function index()
    {
        $pivotExpenseProducts = PivotExpenseProduct::with('expense')->get();
        return view('pivot_expense_products.index', compact('pivotExpenseProducts'));
    }

    // Show the form for creating a new pivot expense product.
    public function create()
    {
        $expenses = Expense::all();
        return view('pivot_expense_products.create', compact('expenses'));
    }

    // Store a newly created pivot expense product in storage.
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'expense_id' => 'required|exists:expenses,id',
            'unit_price' => 'required|numeric',
            'quantity' => 'required|integer',
        ]);

        $pivotExpenseProduct = PivotExpenseProduct::create($validatedData);

        return redirect()->route('pivot_expense_products.index')->with('success', 'Pivot Expense Product created successfully.');
    }

    // Display the specified pivot expense product.
    public function show(PivotExpenseProduct $pivotExpenseProduct)
    {
        return view('pivot_expense_products.show', compact('pivotExpenseProduct'));
    }

    // Show the form for editing the specified pivot expense product.
    public function edit(PivotExpenseProduct $pivotExpenseProduct)
    {
        $expenses = Expense::all();
        return view('pivot_expense_products.edit', compact('pivotExpenseProduct', 'expenses'));
    }

    // Update the specified pivot expense product in storage.
    public function update(Request $request, PivotExpenseProduct $pivotExpenseProduct)
    {
        $validatedData = $request->validate([
            'expense_id' => 'required|exists:expenses,id',
            'unit_price' => 'required|numeric',
            'quantity' => 'required|integer',
        ]);

        $pivotExpenseProduct->update($validatedData);

        return redirect()->route('pivot_expense_products.index')->with('success', 'Pivot Expense Product updated successfully.');
    }

    // Remove the specified pivot expense product from storage.
    public function destroy(PivotExpenseProduct $pivotExpenseProduct)
    {
        $pivotExpenseProduct->delete();

        return redirect()->route('pivot_expense_products.index')->with('success', 'Pivot Expense Product deleted successfully.');
    }
}
