<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class TrainsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i <= 20; $i++) {
        // istanziare un ogetto del modello
        $new_train = new Train();
        $new_train->company = $faker->company();
        $new_train->departure_station = $faker->city();
        $new_train->arrival_station = $faker->city();
        $new_train->departure_time = $faker->time();
        $new_train->arrival_time = $faker->time();
        $new_train->code = randomFloat([100, 999]);
        $new_train->wagon = $faker->numberBetween([5, 10]);
        $new_train->is_in_time = rand(0,1);
        $new_train->is_cancelled = rand(0,1);
        // salva il record nel DB
        $new_train->save();
        }
    }
}
