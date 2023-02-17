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
            $newDish = new Dish();
            $newDish->name = $dish['name'];
            $newDish->ingredients = $dish['ingredients'];
            $newDish->price = $dish['price'];
            $newDish->visible = $dish['visible'];
            $newDish->image = $dish['image'];
            // $dish->address = $user['address'];
            // $dish->vat = $user['vat'];
            // $dish->image = $user['image'];
            $newDish->save();
        }
    }
}
