<?php

namespace Database\Seeders;

use App\Models\ProgrammingLanguages;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProgrammingLanguagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languages = config('store.programmingLanguages');
        foreach($languages as $language){
            
            $NewLanguage = new ProgrammingLanguages();
            $NewLanguage->language = $language;
            $NewLanguage->save();
        };
    }
}
