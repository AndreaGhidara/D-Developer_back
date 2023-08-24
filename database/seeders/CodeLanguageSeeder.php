<?php

namespace Database\Seeders;

use App\Models\code_language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CodeLanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technologies = config('code_languages');
        foreach($technologies as $tecnology){
            
            $Newtechnology = new code_language();
            $Newtechnology->technology = $tecnology;
            $Newtechnology->save();
        };
    }
}
