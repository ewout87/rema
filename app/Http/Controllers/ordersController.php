<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\OrderResource;
use App\Http\Controllers\Controller;
use App\Order;

class ordersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with('products', 'products.sizes', 'products.brand')->get();

        return OrderResource::collection($orders);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = new Order;
        $order->klant = $request->input('klant');
        $order->contact = $request->input('contact');
        $order->print_id = $request->input('print_id');
        $order->status = $request->input('status');
        $order->opmerking = $request->input('opmerking');
        $order->datum = $request->input('datum');
        $order->save();

        return new OrderResource($order);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::findOrFail($id);

        return new OrderResource($order);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        $order = Order::findOrFail($id);
        $order->klant = $request->input('klant');
        $order->contact = $request->input('contact');
        $order->print_id = $request->input('print_id');
        $order->status = $request->input('status');
        $order->opmerking = $request->input('opmerking');
        $order->datum = $request->input('datum');
        $order->save();

        return new OrderResource($order);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return $order; 
    }
}
