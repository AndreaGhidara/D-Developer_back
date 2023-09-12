<?php

namespace Database\Seeders;


use App\Models\User;
use App\Models\Sponsor;
use App\Models\ProgrammingLanguages;
use App\Models\Review;
use App\Models\Valutation;


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
        $developers = config('store.dbDevelopers');
        foreach ($developers as $developer) {
            $user = User::create([

                'name' => $developer['name'],
                'surname' => $developer['surname'],
                'email' => $developer['email'],
                'password' => Hash::make('ciao'),
                'surname' => $developer['surname'],
                'date_of_birth' => $developer['date_of_birth'],
                'address' => $developer['address'],
                'bio' => $developer['bio'],
                'img_path' => '',
                'bg_dev' => '',
                'github_link' => $developer['github_link'],
                'linkedin_link' => $developer['linkedin_link'],
                'vat_number' => $developer['vat_number'],
                'cv' => $faker->imageUrl(640, 480, 'documents', true),
                'phone_number' => $developer['phone_number'],
                'soft_skill' => $developer['soft_skill'],

            ]);

            // popolamento tabella pivot UserLangueges
            foreach ($developer['programming_languages'] as $programmingLanguage) {
                $language = ProgrammingLanguages::firstOrCreate(['language' => $programmingLanguage['language']]);
                $user->programmingLanguages()->attach($language->id);
            }

            // popolamento tabella pivot UserValutation
            foreach ($developer['valuations'] as $valutation) {
                $valutations = Valutation::firstOrCreate([
                    'valutation_name' => $valutation['valutation_name'],
                    'valutation' => $valutation['valutation'],
                ]);
                $user->valutations()->attach($valutations->id);
            }


            //popolare Tabella pivot | sponsor_users |
            $sponsors = Sponsor::all();
            $user->sponsors()->attach(
                $sponsors->random(rand(0, 1))->pluck('id')->toArray(),
                ['start_date' => now(), 'end_date' => now()->addDays(30)] // Esempio date
            );
        }
    }
}
