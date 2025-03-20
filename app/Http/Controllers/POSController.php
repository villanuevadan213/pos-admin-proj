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

        // Validate the cart
        if (empty($cart)) {
            return redirect()->route('pos')->with('error', 'Your cart is empty.');
        }

        // Start a database transaction
        DB::beginTransaction();

        try {
            $total = 0;

            // Validate stock and calculate total
            foreach ($cart as $id => $item) {
                $inventoryItem = InventoryItem::find($id);

                if ($inventoryItem->quantity < $item['quantity']) {
                    throw new \Exception("Not enough stock for: {$inventoryItem->name}");
                }

                $total += $item['price'] * $item['quantity'];
            }

            // Create transaction
            $transaction = Transaction::create([
                'user_id' => Auth::user()->id,
                'total' => $total,
            ]);

            // Deduct stock and save transaction items
            foreach ($cart as $id => $item) {
                $inventoryItem = InventoryItem::find($id);
                $inventoryItem->quantity -= $item['quantity'];
                $inventoryItem->save();

                $transaction->items()->create([
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
            // Rollback in case of error
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
