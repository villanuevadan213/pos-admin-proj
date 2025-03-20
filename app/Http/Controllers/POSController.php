<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Import DB facade
use App\Models\InventoryItem;
use App\Models\Transaction;
use App\Models\TransactionItem;
use Illuminate\Support\Facades\Auth;

class POSController extends Controller
{
    public function index()
    {
        // Fetch all inventory items to display in the POS interface
        $inventoryItems = InventoryItem::all();

        // Return the view with the fetched data
        return view('pos.index', compact('inventoryItems'));
    }

    public function checkout(Request $request)
    {
        $cart = json_decode($request->input('cart'), true);
        $discountType = $request->input('discount_type'); // Get discount type
        $discountValue = floatval($request->input('discount_value')); // Get discount value
    
        if (empty($cart)) {
            return redirect()->route('pos')->with('error', 'Your cart is empty.');
        }
    
        DB::beginTransaction();
    
        try {
            $total = 0;
            $orderId = 'ORD' . mt_rand(100000, 999999); // Generate unique order_id
    
            foreach ($cart as $id => $item) {
                $inventoryItem = InventoryItem::find($id);
    
                if ($inventoryItem->quantity < $item['quantity']) {
                    throw new \Exception("Not enough stock for: {$inventoryItem->item_name}");
                }
    
                $total += $item['price'] * $item['quantity'];
            }
    
            // Apply discount logic
            if ($discountType === 'percentage') {
                $total -= ($total * ($discountValue / 100));
            } elseif ($discountType === 'fixed') {
                $total -= $discountValue;
            } elseif ($discountType === 'volume') {
                // Example logic for volume discount
                $total -= ($total > 1000) ? 50 : 0; // Flat discount for orders over ₱1000
            }
    
            // Prevent total from going below zero
            $total = max($total, 0);
    
            $transaction = Transaction::create([
                'user_id' => Auth::user()->id,
                'total' => $total,
                'order_id' => $orderId,
            ]);
    
            foreach ($cart as $id => $item) {
                $inventoryItem = InventoryItem::find($id);
                $inventoryItem->quantity -= $item['quantity'];
                $inventoryItem->save();
    
                TransactionItem::create([
                    'transaction_id' => $transaction->id,
                    'order_id' => $transaction->order_id,
                    'inventory_item_id' => $inventoryItem->id,
                    'item_code' => $inventoryItem->item_code,
                    'item_name' => $inventoryItem->item_name,
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                    'total_value' => $item['price'] * $item['quantity'],
                ]);
            }
    
            DB::commit();
            return redirect()->route('pos')->with('message', 'Checkout successful!');
    
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('pos')->with('error', 'Checkout failed: ' . $e->getMessage());
        }
    }
    public function showCheckout()
    {
        $items = session('checkout_items'); // For example, store items in a session
        return view('pos.checkout', compact('items'));
    }

}
