<?php

namespace Database\Seeders;

use App\Models\Review;
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

        for ($i=0; $i < 5; $i++) { 
            $newReview = new Review();
    
            $newReview->user_id = 1;
            $newReview->date = $faker->date();
            $newReview->name = $faker->name();
            $newReview->email = $faker->email();
            $newReview->review = $faker->text(100);
    
            $newReview->save();
        }

    }
}
