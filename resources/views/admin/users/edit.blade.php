@extends('layouts.admin')

@section('content')
<div class="container my-3">
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

    <div class="row g-4 py-4">
        <div class="col">
            <form action="{{ route('admin.users.update', $user->id ) }}" method="put" class="needs-validation" enctype="multipart/form-data">
                @csrf

                @method("PUT")

                <!--NOME E COGNOME-->
                <label>Nome</label>
                <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old("name")  ?? $user->name}}">
                @error("name")
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror

                <label>Cognome</label>
                <input class="form-control @error('surname') is-invalid @enderror" type="text" name="surname" value="{{ old("surname")  ?? $user->surname}}">
                @error("surname")
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror

                <!--EMAIL-->
                <label>Email</label>
                <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" value="{{ old("email")  ?? $user->email}}">
                @error("email")
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror

                <!--DATA DI NASCITA CON PICKER-->
                <label>Data di nascita</label>
                <input class="form-control @error('date_of_birth') is-invalid @enderror" type="date" name="date_of_birth" value="{{ old("date_of_birth")}}" required autocomplete="date_of_birth" autofocus>
                @error("date_of_birth")
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror

                <!--INDIRIZZO-->
                <label>Indirizzo</label>
                <input class="form-control @error('address') is-invalid @enderror" type="text" name="address" value="{{ old("address")  ?? $user->address}}">
                @error("address")
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror

                <!--IMG PROFILO E BG-->
                <label for="image">Immagine del profilo</label>
                <input type="file" name="img_path" id="image" class="form-control mb-4 @error('img_path') is-invalid @enderror">
                @error("img_path")
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror

                <label for="image_bg">Immagine background</label>
                <input type="file" name="bg_dev" id="image_bg" class="form-control mb-4 @error('bg_dev') is-invalid @enderror">
                @error("bg_dev")
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror

                <!--LINK AI SOCIAL-->
                <label>Link al tuo GitHub</label>
                <input class="form-control @error('github_link') is-invalid @enderror" type="text" name="github_link" value="{{ old("github_link")  ?? $user->github_link}}">
                @error("github_link")
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror

                <label>Link al tuo Linkedin</label>
                <input class="form-control @error('linkedin_link') is-invalid @enderror" type="text" name="linkedin_link" value="{{ old("linkedin_link")  ?? $user->linkedin_link}}">
                @error("linkedin_link")
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror

                <!--BIO-->
                <label>Bio</label>
                <textarea name="bio" class="form-control @error('bio') is-invalid @enderror" cols="30" rows="5">{{ old("bio") ?? $user->bio}}</textarea>
                @error("bio")
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror

                <!--P.IVA E CELLULARE-->
                <label>Partita IVA</label>
                <input class="form-control @error('vat_number') is-invalid @enderror" type="text" name="vat_number" value="{{ old("vat_number")  ?? $user->vat_number}}">
                @error("vat_number")
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror

                <label for="cv">CV</label>
                <input type="file" name="cv" id="cv" class="form-control mb-4 @error('cv') is-invalid @enderror">
                @error("cv")
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror

                <label>Numero di telefono</label>
                <input class="form-control @error('phone_number') is-invalid @enderror" type="text" name="phone_number" value="{{ old("phone_number")  ?? $user->phone_number}}">
                @error("phone_number")
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror

                <!--SKILLS-->
                <label>Soft Skills</label>
                <textarea name="soft_skill" class="form-control @error('soft_skill') is-invalid @enderror" cols="30" rows="5">{{ old("soft_skill") ?? $user->soft_skill}}</textarea>
                @error("soft_skill")
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror

                <!--LINGUAGGI DI PROGRAMMAZIONE-->
                <div class="d-flex mt-3">
                    @foreach ($languages as $i => $language)
                        <div class="form-check m-3">
                            <input type="checkbox" value="{{old(" $language->id") ??  $language->id}}" name="code_languages[]" id="code_languages{{$i}}" class="form-check-input" >
                            <label for="code_languages{{$i}}" class="form-check-label">{{$language->technology}}</label>
                        </div>
                    @endforeach
                </div>

                <input class="form-control mt-4 btn btn-secondary" type="submit" value="Invia">
             </form>
        </div>
    </div>

</div>
@endsection
