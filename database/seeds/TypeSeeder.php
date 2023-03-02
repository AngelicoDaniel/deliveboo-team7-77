<?php

use App\Type;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $restaurants = User::all()->pluck('id');
        $types = [
            'Pizzeria',
            'Italiano',
            'Cinese',
            'Giapponese',
            'Messicano',
            'Indiano',
            'Pesce',
            'Carne',
            'Vegetariano',
            'Senza glutine',
            'Americano',
            'Dessert',
            'Gelato',
            'Poke',

        ];
        $restaurantTypes = [
            1 => [1, 2, 7, 8], // O'Pizzaiuolo
            2 => [1, 2, 7, 8], // Pizzeria da Ciro
            3 => [4, 7], // Hokkaido
            4 => [11, 7, 8], // Streat Piombo
            5 => [10], // Gluten Free
            6 => [3, 8, 7], //Hang Zhou
            7 => [4, 7], //Hachi
            8 => [13, 12], //Scimmia
            9 => [14], //pokémon
            10 => [9], //cavoli
            11 => [6, 7, 8], //shabababa
            12 => [5] //mexican ziocan
        ];

        foreach ($types as $type) {
            $objType = new Type;
            $objType->name = $type;
            $objType->save();

            foreach ($restaurantTypes as $restaurantId => $preferredTypes) {
                if (in_array($objType->id, $preferredTypes)) {
                    $restaurant = User::find($restaurantId);
                    $objType->users()->attach($restaurant);}

} }
}}
