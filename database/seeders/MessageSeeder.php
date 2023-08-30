<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Message;
use App\Models\User;

class MessageSeeder extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker){

        $user = User::all();

        for ($i=0; $i < 100; $i++) {

            $newMessage = new Message();
            $newMessage->user_id = rand(1, count($user));
            $newMessage->name = $faker->word();
            $newMessage->surname = $faker->word();
            $newMessage->email = $faker->email();
            $newMessage->text = $faker->paragraph();
            $newMessage->save();

        }
    }
}

