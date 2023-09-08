<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\ProgrammingLanguages;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        
        //Valido i dati
        $data =  $this->validateUser( $request->all() );
        //Crea un nuvo user
        $user = new User();

          //img cv
        if($request->hasFile("cv")) {
            $img_path = Storage::put("uploads", $data["cv"]);
            $data['cv'] = $img_path;
        } else if (!$request -> has("cv")){
            $data['cv'] = null;
        }

        // $user->languages()->attach($request->input('languages'));
        //Controllo campi compilabili
        $user->fill($data);

        //Creazione User
        $user = User::create([
            'name' => $data['name'],
            "surname" => $data['surname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            "date_of_birth" => $data['date_of_birth'],
            'address' => $data['address'],
            'phone_number' => $data['phone_number'],
            'cv' => $data['cv'],
            'vat_number' => $data['vat_number'],
        ]);

        if ($request->has('languages')) {
            $selectedLanguages = $request->input('languages');
            $user->ProgrammingLanguages()->attach($selectedLanguages);
        }

        event(new Registered($user));
        $user->save();
        return redirect()->route('register')->with('success', 'Registrazione completata. Ora puoi effettuare il login.');

        //RIMUOVO PER RIDIREZIONARE ===============
        // Auth::login($user);

        //Modifica Rotta per arrivare a LOGIN
        // return redirect(RouteServiceProvider::LOGIN);
        // return redirect()->route("login");
    }

    public function validateUser($data) {
        $validator = Validator::make(
            // dd($data),
            $data,
            [
                "name" => "required|min:3|max:50",
                "surname" => "required|min:3|max:50",
                'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                "date_of_birth" => "required|date|before:-18 years",
                "address" => "required",
                "img_path" => ['nullable',
                    File::image()->dimensions(Rule::dimensions()->maxWidth(500)->maxHeight(500)),
                ],
                "bg_dev" => ['nullable',
                    File::image()->dimensions(Rule::dimensions()->maxWidth(2200)->maxHeight(2500)),
                ],
                "cv" => ['required',
                    File::types([
                        1 => "pdf",
                        2 => "doc",
                        3 => "docx"
                    ])->max(500000)
                ],
                "phone_number" => "required|numeric",
                "languages" => "required|min:1",
                "github_link" =>"nullable|url",
                "linkedin_link" =>"nullable|url",
                "vat_number" =>"nullable|max:11",
            ],
            [
                "name.required" => "Il nome è obbligatorio",
                "name.min" => "Il nome deve essere almeno di :min caratteri",
                "name.max" => "Il nome deve essere al massimo di :max caratteri",

                "password.required" => "La password è obbligatoria",
                "password.min" => "La password deve essere almeno di :min caratteri",

                "surname.required" => "Il cognome è obbligatorio",
                "surname.min" => "Il cognome deve essere almeno di :min caratteri",
                "surname.max" => "Il cognome deve essere al massimo di :max caratteri",

                "email.required" => "L'indirizzo email è obbligatorio",
                "email.email" => "L'indirizzo email non è nel formato corretto",

                "date_of_birth.required" => "La data di nascita è obbligatoria",
                "date_of_birth.date" => "La data di nascita non è nel formato corretto",
                "date_of_birth.before"=>"Torna quando sarai più grande",

                "address.required" => "L'indirizzo è obbligatorio",

                "cv.required" => "Il CV è obbligatorio",

                "phone_number.required" => "Il numero di telefono è obbligatorio!!",
                "phone_number.number" => "Il numero di telefono non è nel formato corretto",

                "languages.required" => "Almeno un linguaggio di programmazione è obbligatorio",

                "github_link.url"=> "Devi inserire un link valido",
                "linkedin_link.url" => "Devi inserire un link valido",
                "vat_number.max"=> ":max di caratteri raggiunto",
                "soft_skill.max" => ":max di caratteri raggiunto"

            ]
        )->validate();
        return $validator;
    }

}
