<?php

use Illuminate\Database\Seeder;
use App\School;

class SchoolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1 ; $i<=10; $i++) {
            $school = School::create([
                'city_id' => rand(10,1000),
                'name' => str_random(10),
                'email' => str_random(10).'@gmail.com',
                'url' => str_random(4).'@ukf.sk',
                'address' => str_random(10),
                'postcode' =>rand(10,100),
            ]);
        }

    }
}
