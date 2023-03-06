<?php

namespace App\Http\Controllers\Api;

use App\Order;
use App\Dish;
use App\Http\Controllers\Controller;
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


$data = $request->all();
        // // Validazione dei dati ricevuti
        // $validatedData = $request->validate([
        //     'customer_name' => 'required|max:255',
        //     'customer_surname' => 'required|max:255',
        //     'customer_address' => 'required|max:255',
        //     'customer_phone' => 'required|max:20',
        //     'customer_email' => 'required|email|max:255',
        //     'order_number' => 'required|max:20',
        //     'ship_cost' => 'required',
        //     // 'cart' => 'required|array',
        //     // 'cart.*.chiave.name' => 'required|max:255',
        //     // 'cart.*.chiave.price' => 'required|numeric|min:0',
        //     // 'cart.*.quantity' => 'required|integer|min:1',
        //     // 'restaurant_id' => 'required|exists:restaurants,id',
        // ]);

        // return response()->json(['message' => $validatedData], 201);
         $cart = $data['cart'];

        $newOrder = new Order();
        $newOrder->fill($data);
        $newOrder->save();

        // Associa i piatti all'ordine nella tabella pivot "dish_order"
        foreach ($cart as $item) {


            $newOrder->dishes()->attach($item['id']
            // ['quantity' => $item['quantity']]
        );
            $newOrder->save();
            }


        // Invio della risposta
        return response()->json(['message' => 'Ordine salvato con successo'], 201);
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
