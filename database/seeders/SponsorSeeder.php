<?php

namespace Database\Seeders;

use App\Models\Sponsor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sponsors = config('sponsors');

        foreach($sponsors as $sponsor){
            
            $NewSponsor = new sponsor();
            $NewSponsor->name = $sponsor['title'];
            $NewSponsor->price = $sponsor['price'];
            $NewSponsor->time_sponsor = $sponsor['duration'];
            $NewSponsor->save();
        };
    }
}
