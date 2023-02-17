<?php

use App\Type;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = config('types');
        foreach ($types as $type) {
            $newType = new Type();
            $newType->title = $type['title'];
            $newType->description = $type['description'];
            $newType->save();
        }
    }
}
