<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InventoryItem;

class InventoryManagementController extends Controller
{
    /**
     * Display a listing of the inventory items.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = InventoryItem::all();
        return view('inventory-management.index', compact('items'));
    }

    /**
     * Show the form for creating a new inventory item.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inventory-management.create');
    }

    /**
     * Store a newly created inventory item in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'unit_price' => 'required|numeric',
            'total_value' => 'required|numeric',
            'supplier' => 'required|string|max:255',
            'notes' => 'nullable|string',
        ]);

        // Check if the item already exists
        $existingItem = InventoryItem::where('item_name', $request->name)
            ->where('category', $request->category)
            ->first();

        if ($existingItem) {
            $existingItem->category = $request->category;
            $existingItem->quantity += $request->quantity;
            $existingItem->unit_price = $request->unit_price;
            $existingItem->total_value = $existingItem->quantity * $existingItem->unit_price;
            $existingItem->supplier = $request->supplier;
            $existingItem->notes = $request->notes;
            $existingItem->save();

            return redirect()->route('inventory-management')->with('success', 'Item quantity added successfully.');
        }

        // Generate a unique item code
        $itemCode = 'ITEM' . strtoupper(uniqid());

        InventoryItem::create([
            'item_code' => $itemCode,
            'item_name' => $request->name,
            'category' => $request->category,
            'quantity' => $request->quantity,
            'unit_price' => $request->unit_price,
            'total_value' => $request->total_value,
            'supplier' => $request->supplier,
            'notes' => $request->notes,
        ]);

        return redirect()->route('inventory-management')->with('success', 'Inventory item created successfully.');
    }

    /**
     * Show the form for editing the specified inventory item.
     *
     * @param  \App\Models\InventoryItem  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(InventoryItem $item)
    {
        return view('inventory-management.edit', compact('item'));
    }

    /**
     * Update the specified inventory item in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InventoryItem  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InventoryItem $item)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'unit_price' => 'required|numeric',
            'total_value' => 'required|numeric',
            'supplier' => 'required|string|max:255',
            'notes' => 'nullable|string',
        ]);

        $item->update([
            'item_name' => $request->name,
            'category' => $request->category,
            'quantity' => $request->quantity,
            'unit_price' => $request->unit_price,
            'total_value' => $request->total_value,
            'supplier' => $request->supplier,
            'notes' => $request->notes,
        ]);

        return redirect()->route('inventory-management')->with('success', 'Inventory item updated successfully.');
    }

    /**
     * Remove the specified inventory item from storage.
     *
     * @param  \App\Models\InventoryItem  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(InventoryItem $item)
    {
        $item->delete();

        return redirect()->route('inventory-management')->with('success', 'Inventory item deleted successfully.');
    }
}