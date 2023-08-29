<?php

namespace Database\Seeders;

use App\Models\Code_language;
use App\Models\CodeLanguageUser;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CodeLanguageUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $languages = Code_language::all();

        for($i=0 ; $i<15 ; $i++){
            $new = new CodeLanguageUser();
            $new->user_id = rand(1, count($users));
            $new->code_language_id = rand(1, count($languages));
            $new->save();
        }
    }
}
