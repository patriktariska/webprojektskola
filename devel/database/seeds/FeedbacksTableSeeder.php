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
                'challenge_id' => 1,
                'comment' => 'Super pobyt.',
                'photo' => 'selfie_denmark.png',
                'rate' => 'Odporúčam',
                'published' => true,
            ]);

        $challenge = Feedback::create([
            'user_id' => 4,
            'challenge_id' => 2,
            'comment' => 'Veľa nových skúseností.',
            'photo' => 'selfie_czech.png',
            'rate' => 'Odporúčam',
            'published' => true,
        ]);

        $challenge = Feedback::create([
            'user_id' => 5,
            'challenge_id' => 3,
            'comment' => 'Určite odporúčam vyskúšať!',
            'photo' => 'selfie_austria.png',
            'rate' => 'Odporúčam',
            'published' => true,
        ]);

        $challenge = Feedback::create([
            'user_id' => 6,
            'challenge_id' => 4,
            'comment' => 'Hodnotím túto skúsenosť veľmi pozitívne',
            'photo' => 'selfie_berlin.png',
            'rate' => 'Odporúčam',
            'published' => true,
        ]);

        $challenge = Feedback::create([
            'user_id' => 7,
            'challenge_id' => 6,
            'comment' => 'Nové poznatky + nový priatelia = super pobyt!',
            'photo' => 'selfie_moscow.png',
            'rate' => 'Odporúčam',
            'published' => true,
        ]);

    }
}
