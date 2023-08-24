<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 10; $i++) {
            $developer = new User();
            $developer->name = $faker->name(1);
            $developer->surname = $faker->name(1);
            $developer->email = $faker->email();
            $developer->password = $faker->words(1, true);
            $developer->date_of_birth = $faker->date();
            $developer->address = $faker->address();
            $developer->bio = $faker->text();
            $developer->img_path = $faker->imageUrl(360, 360, 'developers', true);
            $developer->bg_dev = $faker->imageUrl(480, 480, 'sky', true);
            $developer->github_link = $faker->url();
            $developer->linkedin_link = $faker->url();
            $developer->vat_number = $faker->numberBetween(10000000000, 99999999999);
            $developer->cv = $faker->imageUrl(640, 480, 'documents', true);
            $developer->phone_number = $faker->numberBetween(1000000000, 9999999999);
            $developer->soft_skill = $faker->text();
            $developer->save();
        }
    }
}
