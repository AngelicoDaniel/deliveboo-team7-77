<?php

use App\Dish;
use Illuminate\Database\Seeder;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dishes = config('dishes');
        foreach ($dishes as $dish) {
            $dish = new Dish();
            $dish->name = $dish['name'];
            $dish->ingredients = $dish['ingredients'];
            $dish->price = $dish['price'];
            $dish->visible = $dish['visible'];
            $dish->image = $dish['image'];
            // $dish->address = $user['address'];
            // $dish->vat = $user['vat'];
            // $dish->image = $user['image'];
            $dish->save();
        }
    }
}
