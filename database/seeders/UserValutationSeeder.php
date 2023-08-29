<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserValutation;
use App\Models\Valutation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserValutationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $valutations = Valutation::all();

        for($i= 0; $i < 15; $i++){

            $new = new UserValutation();
            $new->user_id = rand(1, count($users));
            $new->valutation_id = rand(1, count($valutations));
            $new ->save(); 
        }
    }
}
