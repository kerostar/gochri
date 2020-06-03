<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Order;
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
        $orders = Order::orderBy('created_at','desc')->with(['products','user'])->get();
        return response()->json(['orders' => $orders],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function markShipped($id){
        $order = Order::findOrFail($id);
        $order->shipping_status = 1;
        $order->save();
        return response()->json(['status' => $order->status, 'success' => 'La commande a été marqué comme livraisé!'], 200);
    }

    public function markPaid($id){
        $order = Order::findOrFail($id);
        $order->payment_status = 1;
        $order->save();
        return response()->json(['status' => $order->status, 'success' => 'La commande a été marqué comme payé!'], 200);
    }
}
