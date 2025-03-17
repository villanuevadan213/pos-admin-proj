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

        $orders = DB::table('users')
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->select('users.id', 'users.name', 'users.email', 'orders.order_number', 'orders.total_amount', 'orders.status', 'orders.created_at')
            ->get();

        return view('order-tracking.index', compact('orders'));
    }

    /**
     * Display the specified order.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
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
    public function edit(Order $order)
    {
        return view('order-tracking.edit', compact('order'));
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