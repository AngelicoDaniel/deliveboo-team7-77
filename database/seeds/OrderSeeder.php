<?php

use App\Dish;
use App\Order;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $dishes = Dish::all()->pluck('id');

        for ($i=0; $i < 20; $i++) {
            $order = Order::create([
                'order_number' => rand(0, 1000),
                'customer_name' => $faker->words(2, true),
                'customer_surname' => $faker->words(3, true),
                'customer_address' => $faker->address(),
                'customer_phone' => $faker->email(),
                'customer_email' => $faker->phoneNumber(),
                'ship_cost' => $faker->randomElement([250, 350, 450, 700]),
            ]);
            $order->dishes()->attach($faker->randomElements($dishes, rand(1, (count($dishes) > 15) ? 15 : count($dishes))));
        };
    }
}
