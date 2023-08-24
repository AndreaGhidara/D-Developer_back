<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Message;

class MessageSeeder extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker){
        
        for ($i=0; $i < 10; $i++) { 

            $newMessage = new Message();
            $newMessage->user_id = $i;
            $newMessage->name = $faker->word();
            $newMessage->surname = $faker->word();
            $newMessage->email = $faker->email();
            $newMessage->text = $faker->paragraph();
            $newMessage->save();

        }
    }
}

