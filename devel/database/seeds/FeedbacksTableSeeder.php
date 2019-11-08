<?php

use Illuminate\Database\Seeder;
use App\User;
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
        $getStudent = User::with('Roles')->where(['name' => 'student'])->first();

        for($i=1 ; $i<=10; $i++) {
            $feedback = Feedback::create([
                'user_id' => $getStudent->id,
                'comment' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                          Lorem Ipsum has been the industry standard dummy text ever since the 1500s',
                'photo' => '1572249230.PNG',
                'rate' => 'Odporúčam',
                'published' => false,
            ]);
        }


    }
}
