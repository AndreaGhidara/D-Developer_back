<?php

namespace Database\Seeders;

use App\Models\Sponsor;
use App\Models\SponsorUser;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\LaravelIgnition\Support\Composer\FakeComposer;
use Faker\Generator as Faker;
class SponsorUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $users = User::all();
        $sponsors = Sponsor::all();

        for($i =0 ; $i < 15; $i++){
            $new = new SponsorUser();
            $new->user_id = rand(1, count($users));
            $new->sponsor_id = rand(1, count($sponsors));
            if ($new->sponsor_id == 1) {
                $new->end_sponsor= date('Y-m-d H:i:s',strtotime(' +24 hours '));
            }else if ($new->sponsor_id == 2){
                $new->end_sponsor= date('Y-m-d H:i:s',strtotime(' +48 hours '));
            }else if ($new->sponsor_id == 3) {
                $new->end_sponsor= date('Y-m-d H:i:s',strtotime(' +72 hours '));
            }
            $new ->save();
        }
    }
}
