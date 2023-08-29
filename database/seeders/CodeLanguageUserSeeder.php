<?php

namespace Database\Seeders;

use App\Models\Code_language;
use App\Models\CodeLanguageUser;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CodeLanguageUserSeeder extends Seeder
{
    public function run()
    {
        // Esempio di assegnazione di codici lingua a utenti
        $users = User::all();
        $codeLanguages = Code_language::all();

        foreach ($users as $user) {
            // Esempio: Assegna due lingue casuali a ciascun utente
            $user->code_languages()->attach($codeLanguages->random(2));
        }
    }
}
