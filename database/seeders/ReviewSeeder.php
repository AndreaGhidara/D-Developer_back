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

        $user = User::all();

        for ($i=0; $i < 10; $i++) { 
            $newReview = new Review();
    
            $newReview->user_id = rand(1, count($user));
            $newReview->date = $faker->date();
            $newReview->name = $faker->name();
            $newReview->email = $faker->email();
            $newReview->review = $faker->text(100);
    
            $newReview->save();
        }

    }
}
