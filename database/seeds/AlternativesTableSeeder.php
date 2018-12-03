<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Alternative;
use App\Criteria;

class AlternativesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for ($i=0; $i < 10; $i++) { 
        	$alternative = Alternative::create([
        		'name' => $faker->name,
        		'phone_number' => $faker->e164PhoneNumber,
        		'address' => $faker->address,
        	]);

            for ($x=1; $x <= count(Criteria::all()) ; $x++) { 
                $alternative->scores()->create([
                    'criteria_id' => $x,
                    'score' => $faker->numberBetween(1,5),
                ]);
            }
        }
    }
}
