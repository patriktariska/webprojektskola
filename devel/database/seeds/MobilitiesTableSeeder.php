<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Mobility;

class MobilitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1 ; $i<=10; $i++) {
            $mobility = Mobility::create([
                'school_id' => rand(1,10),
                'name' => 'UKF '.str_random(10),
                'type' => str_random(5),
                'description' => '<p>Lorem</p> <strong>lorem </strong>lorem',
                'capacity' => rand(2,980),
                'start' => Carbon::now()->subMinutes(rand(1, 55)),
                'end' => Carbon::now()->subMinutes(rand(1, 55)),
                'title_photo' => '1573216781.png'
            ]);
        }
    }
}
