<?php

use App\School;
use Illuminate\Database\Seeder;
use App\Challenge;
use Carbon\Carbon;

class ChallengeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = Carbon::create(2019, 12, 17, 0, 0, 0);
{
            $challenge = Challenge::create([

                'mobility_id' => rand(1,2),
                'name' => 'Dánsko',
                'description' => '<p>Københavns Universitet</p> Københavns Universitet (po slovensky Kodanská univerzita) je druhá najväčšia a najstaršia univerzitná a výskumná inštitúcia v Dánsku. ',
                'capacity' => rand(2,50),
                'start' => $date->format('Y-m-d H:i:s'),
                'end' => $date->addWeeks(rand(4, 26)),
                'title_photo' => 'koge.jpg'
            ]);

            $school = School::create([
                'city_id' => rand(10,1000),
                'name' => 'Københavns Universitet',
                'email' => 'kobe@gmail.com',
                'url' => str_random(4).'@kobe.com',
                'address' =>  '2000 Frederiksberg C',
                'postcode' =>rand(10,100),
            ]);

            $challenge->School()->attach($school);
        }

        {
            $challenge = Challenge::create([
                'mobility_id' => rand(1,2),
                'name' => 'Česká republika',
                'description' => '<p>Karlova univerzita</p> Karlova univerzita (čes. Univerzita Karlova, skratka UK) je najstaršia univerzita v strednej Európe a popredná česká vysoká škola.',
                'capacity' => rand(2,50),
                'start' => $date->format('Y-m-d H:i:s'),
                'end' => $date->addWeeks(rand(4, 26)),
                'title_photo' => 'karlo.jpg'
            ]);

            $school = School::create([
                'city_id' => rand(10,1000),
                'name' => 'Karlova univerzita',
                'email' => 'karlo@gmail.com',
                'url' => str_random(4).'@karlo.cz',
                'address' => 'Ovocný trh 560/5',
                'postcode' =>rand(10,100),
            ]);

            $challenge->School()->attach($school);
        }

        {
            $challenge = Challenge::create([
                'mobility_id' => rand(1,2),
                'name' => 'Rakúsko',
                'description' => '<p>Universität Wien</p> Viedenská univerzita je hlavná všeobecná univerzita vo Viedni.',
                'capacity' => rand(2,50),
                'start' => $date->format('Y-m-d H:i:s'),
                'end' => $date->addWeeks(rand(4, 26)),
                'title_photo' => 'wien.jpg'
            ]);

            $school = School::create([
                'city_id' => rand(10,1000),
                'name' => 'Universität Wien',
                'email' => 'wienuni@gmail.com',
                'url' => str_random(4).'@wienuni.com',
                'address' => str_random(10),
                'postcode' =>rand(10,100),
            ]);

            $challenge->School()->attach($school);
        }

        {
            $challenge = Challenge::create([
                'mobility_id' => rand(1,2),
                'name' => 'Nemecko',
                'description' => '<p>Humboldt-Universität</p> Humboldt-Universität zu Berlin je najstaršia berlínska univerzita.',
                'capacity' => rand(2,50),
                'start' => $date->format('Y-m-d H:i:s'),
                'end' => $date->addWeeks(rand(4, 26)),
                'title_photo' => 'humbo.jpg'
            ]);

            $school = School::create([
                'city_id' => rand(10,1000),
                'name' => 'Humboldt-Universität',
                'email' => 'humboldt@gmail.com',
                'url' => str_random(4).'@humbo.de',
                'address' => 'Unter den Linden 6',
                'postcode' =>rand(10,100),
            ]);

            $challenge->School()->attach($school);
        }

        {
            $challenge = Challenge::create([
                'mobility_id' => rand(1,2),
                'name' => 'Maďarsko',
                'description' => '<p>Universität Budapest</p> <strong>Budapešť </strong>Andrássy Gyula Deutschsprachige Universität Budapest  je súkromná univerzita v Budapešti. ',
                'capacity' => rand(2,50),
                'start' => $date->format('Y-m-d H:i:s'),
                'end' => $date->addWeeks(rand(4, 26)),
                'title_photo' => 'buda.jpg'
            ]);

            $school = School::create([
                'city_id' => rand(10,1000),
                'name' => 'Universität Budapest',
                'email' => 'budapest@gmail.com',
                'url' => str_random(4).'@budapest.hu',
                'address' => 'Pollack Mihály tér 3',
                'postcode' =>rand(10,100),
            ]);

            $challenge->School()->attach($school);
        }

        {
            $challenge = Challenge::create([
                'mobility_id' => rand(1,2),
                'name' => 'Rusko',
                'description' => '<p>Lomonosova univerzita</p> <strong>Moskva </strong>Moskovskij gosudarstvennyj universitet imeni M. V. Lomonosova je najstaršia a najväčšia univerzita v Rusku.',
                'capacity' => rand(2,50),
                'start' => $date->format('Y-m-d H:i:s'),
                'end' => $date->addWeeks(rand(4, 26)),
                'title_photo' => 'moskva.jpg'
            ]);

            $school = School::create([
                'city_id' => rand(10,1000),
                'name' => 'Lomonosova univerzita',
                'email' => 'moskva@gmail.com',
                'url' => str_random(4).'@moskva.ru',
                'address' => 'ul. Leninskiye Gory 1',
                'postcode' =>rand(10,100),
            ]);



            $challenge->School()->attach($school);
            }
    }
}
