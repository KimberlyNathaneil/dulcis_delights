<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $inventories = Inventory::all();
        return view('record_inventory', [
            'inventories' => $inventories
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
        Inventory::create([
            'item_name' => request('item_name'),
            'unit_price' => request('unit_price'),
            'qty' => request('qty'),
        ]);

        return redirect('inventories');
    }

    /**
     * Display the specified resource.
     */
    public function show(Inventory $inventory)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inventory $inventory)
    {
        $inventories = Inventory::all();
        return view('record_inventory_edit', [
            'inventory' => $inventory,
            'inventories' => $inventories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Inventory $inventory)
    {
        $inventory->update([
            'item_name' => request('item_name'),
            'unit_price' => request('unit_price'),
            'qty' => request('qty'),
        ]);

        return redirect('inventories');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inventory $inventory)
    {
        $inventory->delete();
        return redirect('inventories');
    }
}
