<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Train;
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
        // ciclo per compilare i dati x50
        for($i = 0; $i <= 50; $i++) {

        // istanziare un ogetto del modello
        $new_train = new Train();

        // compilare i campi della tabella
        $new_train->company = $faker->company();
        $new_train->departure_station = $faker->city();
        $new_train->arrival_station = $faker->city();

        //per non duplicare il dato tra le stazioni di partenza/arrivo
        while($new_train->departure_station === $new_train->arrival_station){
            $new_train->arrival_station = $faker->city();
        }

        $new_train->departure_time = $faker->dateTimeBetween('-1 day', '+2 days');
        $new_train->arrival_time = $faker->dateTimeBetween('-1 day', '+2 days');
        $new_train->code = $faker->bothify(['?????#####']);
        $new_train->wagon = $faker->numberBetween([1, 10]);
        $new_train->is_in_time = $faker->boolean(80);
        $new_train->is_cancelled = $faker->boolean(10);
        
        // salva il record nel DB
        $new_train->save();
        }
    }
}
