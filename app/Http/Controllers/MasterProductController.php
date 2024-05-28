<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MasterProductController extends Controller
{
    public function index()
    {
        $products = MasterProduct::all();
        return view('master_products.index', compact('products'));
    }

    // Show the form for creating a new product.
    public function create()
    {
        return view('master_products.create');
    }

    // Store a newly created product in storage.
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer',
        ]);

        $product = MasterProduct::create($validatedData);

        return redirect()->route('master_products.index')->with('success', 'Product created successfully.');
    }

    // Display the specified product.
    public function show(MasterProduct $product)
    {
        return view('master_products.show', compact('product'));
    }

    // Show the form for editing the specified product.
    public function edit(MasterProduct $product)
    {
        return view('master_products.edit', compact('product'));
    }

    // Update the specified product in storage.
    public function update(Request $request, MasterProduct $product)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer',
        ]);

        $product->update($validatedData);

        return redirect()->route('master_products.index')->with('success', 'Product updated successfully.');
    }

    // Remove the specified product from storage.
    public function destroy(MasterProduct $product)
    {
        $product->delete();

        return redirect()->route('master_products.index')->with('success', 'Product deleted successfully.');
    }
}
