<?php

namespace Database\Seeders;

use App\Models\Sponsor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Ordine di Seeder
        $this->call([
            
            ProgrammingLanguagesSeeder::class,
            ValutationSeeder::class,
            SponsorSeeder::class,
            UserSeeder::class,
            ReviewSeeder::class,
            MessageSeeder::class,
        ]);
    }
}
