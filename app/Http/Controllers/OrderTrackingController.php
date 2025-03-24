<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class OrderTrackingController extends Controller
{
    /**
     * Display a listing of the orders.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $orders = Order::all();

        $orders = DB::table('transactions')
            ->join('transaction_items', function ($join) {
                $join->on('transactions.id', '=', 'transaction_items.transaction_id')
                    ->on('transactions.order_id', '=', 'transaction_items.order_id');
            })
            ->select(
                'transactions.order_id',
                'transactions.user_id',
                'transactions.total',
                'transactions.created_at as transaction_created_at',
                'transaction_items.item_code',
                'transaction_items.item_name',
                'transaction_items.quantity',
                'transaction_items.price',
                'transaction_items.total_value'
            )
            ->get()
            ->groupBy('order_id'); // Group items by order_id

        return view('order-tracking.index', compact('orders'));
    }

    /**
     * Display the specified order.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($order_id)
    {
        $order = DB::table('transactions')
            ->join('transaction_items', function ($join) {
                $join->on('transactions.id', '=', 'transaction_items.transaction_id')
                    ->on('transactions.order_id', '=', 'transaction_items.order_id');
            })
            ->where('transactions.order_id', $order_id)
            ->select(
                'transactions.order_id',
                'transactions.user_id',
                'transactions.total',
                'transactions.created_at as transaction_created_at',
                'transaction_items.item_code',
                'transaction_items.item_name',
                'transaction_items.quantity',
                'transaction_items.price',
                'transaction_items.total_value'
            )
            ->get();

        return view('order-tracking.show', compact('order'));
    }

    /**
     * Store a newly created order in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = Order::create($request->all());
        return redirect()->route('order-tracking')->with('success', 'Order created successfully.');
    }
    /**
     * Show the form for editing the specified order.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit($order_id)
    {
        $order = DB::table('transactions')
            ->join('transaction_items', function ($join) {
                $join->on('transactions.id', '=', 'transaction_items.transaction_id')
                    ->on('transactions.order_id', '=', 'transaction_items.order_id');
            })
            ->where('transactions.order_id', $order_id)
            ->select(
                'transactions.order_id',
                'transactions.user_id',
                'transactions.total',
                'transaction_items.item_name',
                'transaction_items.quantity',
                'transaction_items.price'
            )
            ->get();
    
        return view('order-tracking.edit', compact('order', 'order_id')); // Pass $order_id explicitly
    }
    
    /**
     * Update the specified order in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'order_number' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
            'total_amount' => 'required|numeric|min:0',
            'status' => 'required|string|in:Pending,Processing,Completed,Cancelled',
        ]);

        // Update the order with validated data
        $order->update($validatedData);

        return redirect()->route('order-tracking')->with('success', 'Order updated successfully.');
    }

    /**
     * Remove the specified order from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('order-tracking')->with('success', 'Order deleted successfully.');
    }
}