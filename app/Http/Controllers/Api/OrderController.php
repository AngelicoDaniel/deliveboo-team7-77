<?php

namespace App\Http\Controllers\Api;

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
    public function index(Request $request)
    {
         $data = $request->all();
    //     $customer_name = $request->input('customer_name');
    // $customer_surname = $request->input('customer_surname');
    // $customer_address = $request->input('customer_address');
    // $customer_phone = $request->input('customer_phone');
    // $customer_email = $request->input('customer_email');
    // $customer_note = $request->input('customer_note');
    // $total_price = $request->input('total_price');
    // $user_id = $request->input('user_id');
    // $plates = $request->input('plates');

    dd($request->all());
     $NewOrder = new Order();
     $NewOrder->fill($data);
     $NewOrder->save();

    // invia notifiche all'amministratore e al cliente, se necessario

    return response()->json();
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
}






