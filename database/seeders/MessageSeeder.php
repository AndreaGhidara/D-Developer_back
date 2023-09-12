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
        $developers = config('store.dbDevelopers');

        $i = 1;

        foreach ($developers as $developer) {
            foreach($developer['messages'] as $message) {


                $newMessage = new Message();
                $newMessage->user_id = $i;
                $newMessage->name = $message['name'];
                $newMessage->surname = $message['surname'];
                $newMessage->email = $message['email'];
                $newMessage->text = $message['text'];
                $newMessage->save();
            }
            $i = $i+1;

        }
    }
}

