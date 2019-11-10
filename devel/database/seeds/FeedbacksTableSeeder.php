<?php

use Illuminate\Database\Seeder;
use App\Feedback;

class FeedbacksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1 ; $i<=10; $i++) {
            $mobility = Feedback::create([
                'user_id' => 2,
                'mobility_id' => rand(1,10),
                'comment' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum has been the industry standard dummy text ever since the 1500s',
                'photo' => '1572249230.PNG',
                'rate' => 'Odporúčam',
                'published' => false,
            ]);
        }


    }
}
