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
            $challenge = Feedback::create([
                'user_id' => 3,
                'challenge_id' => rand(1,6),
                'comment' => 'Super pobyt.',
                'photo' => 'selfie1.jpg',
                'rate' => 'Odporúčam',
                'published' => false,
            ]);

        $challenge = Feedback::create([
            'user_id' => 4,
            'challenge_id' => rand(1,6),
            'comment' => 'Veľa nových skúseností.',
            'photo' => 'selfie2.jpg',
            'rate' => 'Odporúčam',
            'published' => false,
        ]);

        $challenge = Feedback::create([
            'user_id' => 5,
            'challenge_id' => rand(1,6),
            'comment' => 'Určite odporúčam vyskúšať!',
            'photo' => 'selfie3.jpg',
            'rate' => 'Odporúčam',
            'published' => false,
        ]);

        $challenge = Feedback::create([
            'user_id' => 6,
            'challenge_id' => rand(1,6),
            'comment' => 'Hodnotím túto skúsenosť veľmi pozitívne',
            'photo' => 'selfie4.jpg',
            'rate' => 'Odporúčam',
            'published' => false,
        ]);

        $challenge = Feedback::create([
            'user_id' => 7,
            'challenge_id' => rand(1,6),
            'comment' => 'Nové poznatky + nový priatelia = super pobyt!',
            'photo' => 'selfie5.jpg',
            'rate' => 'Odporúčam',
            'published' => false,
        ]);



    }
}
