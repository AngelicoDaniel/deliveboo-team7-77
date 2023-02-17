<?php

use App\Order;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = config('orders');
        foreach ($orders as $order) {
            $newOrder = new Order();
            $newOrder->restaurant_id = $order['restaurant_id'];
            $newOrder->customer_name = $order['customer_name'];
            $newOrder->customer_surname = $order['customer_surname'];
            $newOrder->phone_number = $order['phone_number'];
            $newOrder->customer_address = $order['customer_address'];
            $newOrder->total_price = $order['total_price'];
            // $dish->vat = $user['vat'];
            // $dish->image = $user['image'];
            $newOrder->save();
        }
    }
}
