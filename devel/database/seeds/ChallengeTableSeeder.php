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

        for($i=1 ; $i<=10; $i++) {
            $challenge = Challenge::create([
                'mobility_id' => rand(1,2),
                'name' => 'UKF '.str_random(10),
                'description' => '<p>Lorem</p> <strong>lorem </strong>lorem',
                'capacity' => rand(2,980),
                'start' => Carbon::now()->subMinutes(rand(1, 55)),
                'end' => Carbon::now()->subMinutes(rand(1, 55)),
                'title_photo' => '1573216781.png'
            ]);

            $school = School::create([
                'city_id' => rand(10,1000),
                'name' => str_random(10),
                'email' => str_random(10).'@gmail.com',
                'url' => str_random(4).'@ukf.sk',
                'address' => str_random(10),
                'postcode' =>rand(10,100),
            ]);

            $challenge->School()->attach($school);
        }
    }
}
