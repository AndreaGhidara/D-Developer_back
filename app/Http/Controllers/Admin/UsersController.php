<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Code_language;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

class UsersController extends Controller{

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $languages = Code_language::all();
        return view('admin.users.edit' , compact('user', 'languages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    //public function update(UpdateProjectRequest $request, Project $project)
    public function update(Request $request, User $user)
    {
        $data =  $this->validateUser( $request->all() );

        //img profilo
        if($request->hasFile("img_path")) {
            $img_path = Storage::put("uploads", $data["img_path"]);
            $data['img_path'] = $img_path;
        }

        //img bg
        if($request->hasFile("bg_dev")) {
            $img_path = Storage::put("uploads", $data["bg_dev"]);
            $data['bg_dev'] = $img_path;
        }

        //img cv
        if($request->hasFile("cv")) {
            $img_path = Storage::put("uploads", $data["cv"]);
            $data['cv'] = $img_path;
        }

        $user->name = $data['name'];
        $user->surname = $data['surname'];
        $user->email = $data['email'];
        $user->date_of_birth = $data['date_of_birth'];
        $user->address = $data['address'];
        $user->img_path = $data['img_path'];
        $user->bg_dev = $data['bg_dev'];
        $user->github_link = $data['github_link'];
        $user->linkedin_link = $data['linkedin_link'];
        $user->bio = $data['bio'];
        $user->vat_number = $data['vat_number'];
        $user->cv = $data['cv'];
        $user->phone_number = $data['phone_number'];
        $user->soft_skill = $data['soft_skill'];
        $user->update();

        $user->languages()->sync($data["code_languages"]);

        return  redirect()->route('admin.users.show', $user->id);
    }

    private function validateUser($data) {
        $validator = Validator::make($data, [
            "name" => "required|min:1|max:50",
            "surname" => "required|min:1|max:50",
            "email" => "required|email:rfc",
            "date_of_birth" => "required|date",
            "address" => "required",
            "img_path" => [
                File::image()->dimensions(Rule::dimensions()->maxWidth(500)->maxHeight(500)),
            ],
            "bg_dev" => [
                File::image()->dimensions(Rule::dimensions()->maxWidth(2200)->maxHeight(2500)),
            ],
            "cv" => [
                "required",
                File::types([
                    1 => "pdf",
                    2 => "doc",
                    3 => "docx"
                ]) ->  max(500000)
            ],
            "phone_number" => "required|numeric",
            "code_languages" =>"required",
        ], [
            "name.required" => "Il nome è obbligatorio",
            "name.min" => "Il nome deve essere almeno di :min caratteri",
            "name.max"=> "Il nome deve essere al massimo di :max caratteri",

            "surname.required" => "Il cognome è obbligatorio",
            "surname.min" => "Il cognome deve essere almeno di :min caratteri",
            "surname.max"=> "Il cognome deve essere al massimo di :max caratteri",

            "email.required" => "L'indirizzo email è obbligatorio",
            "email.email" => "L'indirizzo email non è nel formato corretto",

            "date_of_birth.required" => "La data di nascita è obbligatoria",
            "date_of_birth.date" => "La data di nascita non è nel formato corretto",

            "address.required" => "L'indirizzo è obbligatorio",

            "cv.required" => "Il CV è obbligatorio",

            "phone_number.required" => "Il numero di telefono è obbligatorio",
            "phone_number.number" => "Il numero di telefono non è nel formato corretto",

            "code_languages.required" => "Almeno un linguaggio di programmazione è obbligatorio",
        ])->validate();

        return $validator;
    }

}
