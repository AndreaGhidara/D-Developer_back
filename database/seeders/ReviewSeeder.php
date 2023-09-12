<?php

namespace Database\Seeders;

use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $developers = config('store.dbDevelopers');

        $i = 1;
        foreach($developers as $developer) {
            foreach($developer['reviews'] as $review) {

                $newReview = new Review();

                $newReview->user_id = $i;
                $newReview->date = $faker->date();
                $newReview->name = $review['name'];
                $newReview->email = $review['email'];
                $newReview->review = $review['review'];

                $newReview->save();
            }

            $i = $i+1;

        }

    }
}
