<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Reservation;

class ReservationsSeeder extends Seeder
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
        foreach(range(1,15) as $x) {
                $reservation = new Reservation;
                $reservation->name = $faker->name;
                $reservation->persons = $faker->randomNumber(3);
                $reservation->date = $faker->date($format = 'Y-m-d', $max = 'now');
                $reservation->time = $faker->time($format = 'H:i:s', $max = 'now');
                $reservation->phone = $faker->e164PhoneNumber;
                $reservation->save();
        }
    }
}
// id, name, persons, date, time, phone

// php artisan db:seed --class=ReservationsSeeder