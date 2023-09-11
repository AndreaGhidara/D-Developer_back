@extends('layouts.admin')

@section('content')
<div class="container-fluid my-3">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Modifica i tuoi dati utente</h1>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
        <form action="{{ route('admin.users.update', $user ) }}" method="post" class="needs-validation" enctype="multipart/form-data">
            @csrf
            @method("PUT")

            <!-- NAME -->
            <div class="col-12 form__group field">
                <label for="name" class="form__label text-secondary  ">{{ __('Nome') }}</label>
                <input id="name" name="name" type="text" class="form__field form-control my_border_bottom text-black @error('name') is-invalid @enderror" value="{{ old("name")  ?? $user->name}}" placeholder="Nome" required autofocus>

                @error("name")
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            {{-- SURNAME --}}
            <div class="col-12 form__group field">
                <label for="Surname" class="form__label text-secondary   mt-2">{{ __('Cognome') }}</label>
                <input type="text" class="form__field form-control text-black my_border_bottom text-black @error('surname') is-invalid @enderror" id="surname" name="surname" value="{{ old("surname")  ?? $user->surname}}" placeholder="Cognome" required autofocus>
                @error("surname")
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <!--DATA DI NASCITA CON PICKER-->
            <div class="col-12 form__group field">
                <label for="date_of_birth" class="form__label text-secondary   mt-2">{{ __('Data di nascita') }}</label>
                <input type="date" id="date_of_birth" name="date_of_birth" class="form__field form-control text-black my_border_bottom text-black @error('date_of_birth') is-invalid @enderror" id="date_of_birth" name="date_of_birth" value="{{ old("date_of_birth") ?? $user->date_of_birth}}" placeholder="Data di nascita" required autofocus>
                @error("date_of_birth")
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <!--INDIRIZZO-->
            <div class="col-12 form__group field">
                <label for="address" class="form__label text-secondary   mt-2">{{ __('Indirizzo') }}</label>
                <input type="text" id="address" name="address" class="form__field form-control text-black my_border_bottom text-black @error('address') is-invalid @enderror" value="{{ old("address") ?? $user->address}}" placeholder="Indirizzo" required autofocus>
                @error("address")
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <!--IMG PROFILE-->
            <div class="col-12 form__group field">
                <label for="img_path" class="form__label text-secondary   mt-2">{{ __('Immagine profilo') }}</label>
                <input type="file" name="img_path" id="img_path" class="form__field form-control my_border_bottom text-black p-0 @error('img_path') is-invalid @enderror" placeholder="Immagine Profilo" autofocus>
                @error("img_path")
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            {{-- IMG BACKGROUND --}}
            <div class="col-12 form__group field">
                <label for="bg_dev" class="form__label text-secondary text mt-2">{{ __('Immagine sfondo') }}</label>
                <input id="bg_dev" name="bg_dev" type="file" class="form__field form-control text-black my_border_bottom p-0 @error('bg_dev') is-invalid @enderror" placeholder="Immagine sfondo" autofocus>
                @error("bg_dev")
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            {{-- LINK GITHUB --}}
            <div class="col-12 form__group field">
                <label for="github_link" class="form__label text-secondary mt-2">{{ __('Github') }}</label>
                <input type="text" id="github_link" name="github_link" class="form__field form-control text-black my_border_bottom text-black @error('github_link') is-invalid @enderror" value="{{ old("github_link")  ?? $user->github_link}}" placeholder="Link Github" autofocus>
                @error("github_link")
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            {{-- LINK LINKEDIN --}}
            <div class="col-12 form__group field">
                <label for="linkedin_link" class="form__label text-secondary   mt-2">{{ __('Linkedin') }}</label>
                <input type="text" id="linkedin_link" name="linkedin_link"  class="form__field form-control text-black my_border_bottom text-black @error('linkedin_link') is-invalid @enderror" value="{{ old("linkedin_link")  ?? $user->linkedin_link}}" placeholder="Link Linkedin" autofocus>
                @error("linkedin_link")
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <!--BIO-->
            <div class="col-12 form__group field">
                <label for="bio" class="form__label text-secondary   mt-2">{{ __('Bio') }}</label>
                <textarea type="text" id="bio" name="bio" class="form__field form-control text-black my_border_bottom text-black @error('bio') is-invalid @enderror" cols="30" rows="5"  placeholder="Bio" autofocus>{{ old("bio")  ?? $user->bio}}</textarea>
                @error("bio")
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <!-- VAT NUMBER -->
            <div class="col-12 form__group field">
                <label for="vat_number" class="form__label text-secondary   mt-2">{{ __('Vat number (partita Iva)') }}</label>
                <input type="text" id="vat_number" name="vat_number" class="form__field my_border_bottom text-black form-control text-black @error('vat_number') is-invalid @enderror" value="{{ old("vat_number")  ?? $user->vat_number}}" placeholder="Vat Number" required autofocus>
                @error("vat_number")
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            {{-- CV --}}
            <div class="col-12 form__group field">
                <label for="curriculum" class="form__label text-secondary   mt-2">{{ __('Curriculum') }}*</label>
                <input type="file" id="cv" name="cv" class="form__field form-control text-black my_border_bottom text-black p-0 @error('cv') is-invalid @enderror" placeholder="Curriculum" autofocus>
                @error("cv")
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            {{-- TEL NUMBER --}}
            <div class="col-12 form__group field">
                <label for="phone_number" class="form__label text-secondary   mt-2">{{ __('Numero di telefono') }}*</label>
                <input type="number" id="phone_number" name="phone_number" class="form__field form-control text-black my_border_bottom text-black @error('phone_number') is-invalid @enderror" value="{{ old("phone_number")  ?? $user->phone_number}}" placeholder="Numero di telefono" required autofocus>
                @error("phone_number")
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <!-- SOFT SKILLS -->
            <div class="col-12 form__group field">
                <label for="soft_skill" class="form__label text-secondary   mt-2">{{ __('Soft skill') }}</label>
                <textarea type="text" id="soft_skill" name="soft_skill" class="form__field form-control text-black my_border_bottom text-black @error('soft_skill') is-invalid @enderror" cols="30" rows="5" placeholder="Soft Skills" autofocus>{{ old("soft_skill") ?? $user->soft_skill}}</textarea>
                @error("soft_skill")
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <!--LINGUAGGI DI PROGRAMMAZIONE-->
            <div class="row p-3">
                @foreach ($languages as $i => $language)
                <div class="form-check col-2 d-flex">
                    <input type="checkbox" value="{{old(" $language->id") ??  $language->id}}" name="programmingLanguages[]" id="programmingLanguages{{$i}}" class="cyberpunk-checkbox"  @if( $user_languages->contains($language->id) ) checked @endif>
                    <label for="programmingLanguages{{$i}}" class="cyberpunk-checkbox-label form-check-label text-secondary">{{$language->language}}</label>
                    </div>
                @endforeach
            </div>

            <div class="row">
                <div class="col d-flex justify-content-center">
                    <button class="button" type="submit">
                        <span class="text">Invia</span>
                        <div class="wave"></div>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
