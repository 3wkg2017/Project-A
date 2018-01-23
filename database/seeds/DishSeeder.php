<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Dishes;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $faker->name();
        foreach(range(1,10) as $x) {
                $dish = new Dishes;
                $dish->dish_name = $faker->name;
                $dish->dish_price = $faker->randomNumber(3);
                $dish->dish_description = $faker->text;
                $dish->dish_picture = $faker->imageUrl($width=640, $height=480);
                $dish->save();
        }
    }
}
