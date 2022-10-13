<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('order.index', [
            'orders' => Order::orderBy('updated_at', 'desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Order::create([
            'user_id' => $request->user_id,
            'progress' => $request->progress,
            'hotel_id' => $request->hotel_id,
        ]);

        
        return redirect()->route('o_index')->with('ok', 'Order made');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('order.edit', [
            'order' => $order
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\Order  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $request->validate(
            [
                'progress' => 'required|min:3',

            ],
        );
        $order->update([

            'progress' => $request->progress,

        ]);
        return redirect()->route('o_index')->with('ok', 'Order updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        
        $order->delete();
        return redirect()->route('o_index')->with('ok', 'Order deleted');
    }
}
