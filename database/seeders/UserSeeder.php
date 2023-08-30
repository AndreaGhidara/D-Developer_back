<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
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
        for ($i=0; $i < 100; $i++) {
            $developer = new User();
            $developer->name = $faker->firstname();
            $developer->surname = $faker->lastname();
            $developer->email = $faker->email;
            $developer->password = Hash::make('ciao');
            $developer->date_of_birth = $faker->dateTimeBetween('1950-01-01', '2004-01-01');
            $developer->address = $faker->address();
            $developer->bio = $faker->text();
            $developer->img_path = '';
            $developer->bg_dev = '';
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
