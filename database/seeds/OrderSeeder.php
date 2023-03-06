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
                'order_number' => rand(1000, 10000),
                'customer_name' => $faker->firstName('male'),
                'customer_surname' => $faker->firstName('male'),
                'customer_address' => $faker->address(),
                'customer_phone' => $faker->phoneNumber(),
                'customer_email' => $faker->email(),
                'ship_cost' => $faker->randomElement([50, 75, 100, 110]),
            ]);
            $order->dishes()->attach($faker->randomElements($dishes, rand(1, (count($dishes) > 15) ? 15 : count($dishes))));
        };
    }
}
