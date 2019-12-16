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

                'mobility_id' => rand(1, 2),
                'name' => 'Dánsko',
                'description' => 'Dánsko ponúka jeden z najkvalitnejších vzdelávacích systémov na svete.',
                'capacity' => rand(2, 50),
                'start' => $date->format('Y-m-d H:i:s'),
                'end' => $date->addWeeks(rand(4, 26)),
                'title_photo' => 'dennmark_challenge.jpg'
            ]);

            $school = School::create([
                'city_id' => 47990,
                'name' => 'Københavns Universitet',
                'email' => 'kobe@gmail.com',
                'url' => 'https://www.ku.dk',
                'address' => 'Nørregade 10, 1165 København, Dánsko',
                'postcode' => 1165,
            ]);

            $challenge->School()->attach($school);
        }

        {
            $challenge = Challenge::create([
                'mobility_id' => rand(1, 2),
                'name' => 'Česká republika',
                'description' => 'Česká republika ponúka jeden z najkvalitnejších vzdelávacích systémov na svete.',
                'capacity' => rand(2, 50),
                'start' => $date->format('Y-m-d H:i:s'),
                'end' => $date->addWeeks(rand(4, 26)),
                'title_photo' => 'czech_challenge.jpg'
            ]);

            $school = School::create([
                'city_id' => 14805,
                'name' => 'Karlova univerzita',
                'email' => 'karlo@gmail.com',
                'url' => 'https://cuni.cz/UK-4.html',
                'address' => 'Opletalova 38, 110 00 Staré Město, Česko',
                'postcode' => 11000,
            ]);

            $challenge->School()->attach($school);
        }

        {
            $challenge = Challenge::create([
                'mobility_id' => rand(1, 2),
                'name' => 'Rakúsko',
                'description' => 'Rakúsko ponúka jeden z najkvalitnejších vzdelávacích systémov na svete.',
                'capacity' => rand(2, 50),
                'start' => $date->format('Y-m-d H:i:s'),
                'end' => $date->addWeeks(rand(4, 26)),
                'title_photo' => 'austria_challenge.jpg'
            ]);

            $school = School::create([
                'city_id' => 7157,
                'name' => 'Universität Wien',
                'email' => 'wienuni@gmail.com',
                'url' => 'https://www.univie.ac.at',
                'address' => 'Universitätsring 1, 1010 Wien, Rakúsko',
                'postcode' => 1010,
            ]);

            $challenge->School()->attach($school);
        }

        {
            $challenge = Challenge::create([
                'mobility_id' => rand(1, 2),
                'name' => 'Nemecko',
                'description' => 'Nemecko ponúka jeden z najkvalitnejších vzdelávacích systémov na svete.',
                'capacity' => rand(2, 50),
                'start' => $date->format('Y-m-d H:i:s'),
                'end' => $date->addWeeks(rand(4, 26)),
                'title_photo' => 'germany_challenge.jpg'
            ]);

            $school = School::create([
                'city_id' => 15646,
                'name' => 'Humboldt-Universität',
                'email' => 'humboldt@gmail.com',
                'url' => 'https://www.hu-berlin.de/de',
                'address' => 'Unter den Linden 6, 10117 Berlin, Nemecko',
                'postcode' => 10117,
            ]);

            $challenge->School()->attach($school);
        }

        {
            $challenge = Challenge::create([
                'mobility_id' => rand(1, 2),
                'name' => 'Maďarsko',
                'description' => 'Maďarsko ponúka jeden z najkvalitnejších vzdelávacích systémov na svete.',
                'capacity' => rand(2, 50),
                'start' => $date->format('Y-m-d H:i:s'),
                'end' => $date->addWeeks(rand(4, 26)),
                'title_photo' => 'hungary_challenge.jpg'
            ]);

            $school = School::create([
                'city_id' => 21039,
                'name' => 'Universität Budapest',
                'email' => 'budapest@gmail.com',
                'url' => 'https://www.andrassyuni.eu',
                'address' => 'Budapest, Pollack Mihály tér 3, 1088 Maďarsko',
                'postcode' => 1088,
            ]);

            $challenge->School()->attach($school);
        }

        {
            $challenge = Challenge::create([
                'mobility_id' => rand(1, 2),
                'name' => 'Rusko',
                'description' => 'Rusko ponúka jeden z najkvalitnejších vzdelávacích systémov na svete.',
                'capacity' => rand(2, 50),
                'start' => $date->format('Y-m-d H:i:s'),
                'end' => $date->addWeeks(rand(4, 26)),
                'title_photo' => 'russia_challenge.jpg'
            ]);

            $school = School::create([
                'city_id' => 36735,
                'name' => 'Lomonosova univerzita',
                'email' => 'moskva@gmail.com',
                'url' => 'https://www.msu.ru/en/',
                'address' => 'ul. Leninskiye Gory, 1, Moscow, Rusko, 119991',
                'postcode' => 119991,
            ]);

            $challenge->School()->attach($school);
        }

        {
            $challenge = Challenge::create([
                'mobility_id' => rand(1, 2),
                'name' => 'Spojené štáty (USA)',
                'description' => 'Spojené štáty americké ponúkajú jeden z najkvalitnejších vzdelávacích systémov na svete.',
                'capacity' => rand(2, 50),
                'start' => $date->format('Y-m-d H:i:s'),
                'end' => $date->addWeeks(rand(4, 26)),
                'title_photo' => 'usa_challenge.jpg'
            ]);

            $school = School::create([
                'city_id' => 41640,
                'name' => 'Harvard University',
                'email' => 'harvard@gmail.com',
                'url' => 'https://www.harvard.edu',
                'address' => 'Cambridge, MA, Spojené štáty',
                'postcode' => 2139,
            ]);
            $challenge->School()->attach($school);

            $school = School::create([
                'city_id' => 41640,
                'name' => 'Massachusetts Institute of Technology',
                'email' => 'MIT@gmail.com',
                'url' => 'http://www.mit.edu',
                'address' => '77 Massachusetts Ave, Cambridge, MA 02139, Spojené štáty',
                'postcode' => 2139,
            ]);
            $challenge->School()->attach($school);
        }


    }
}
