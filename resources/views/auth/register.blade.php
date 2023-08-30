@extends('layouts.app')

@php
    $languages = config('store.programmingLanguages');
@endphp

@section('content')
    <div class="container-fluid bg_gradiant py-3">
        <div class="row">
            @if ($errors->any())
                <div class="alert alert-danger col-12">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div class="container justify-content-center">
            <div class="row">
                <div class="col-12">{{ __('Register') }}</div>
            </div>
            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" class="needs-validation row">
                @csrf

                {{-- Name --}}
                <div class="col-12 form__group field">
                    <input id="name" type="text" name="name" class="form__field form-control rounded-0 @error('name') is-invalid @enderror" placeholder="Name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    <label for="name" class="form__label">{{ __('Name') }}*</label>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- Cognome --}}
                <div class="col-12 form__group field">
                    <input id="surname" type="input" class="form__field form-control rounded-0 @error('surname') is-invalid @enderror" placeholder="Name" name="surname"
                    value="{{ old('surname') }}" required autocomplete="surname" autofocus>
                    <label for="surname" class="form__label">{{ __('Surname') }}*</label>
                    @error('surname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- Email --}}
                <div class="col-12 form__group field">
                    <input id="email" type="email" class="form__field form-control rounded-0 @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    <label for="email" class="form__label">{{ __('E-Mail Address') }}*</label>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="col-12 form__group field">
                    <input id="password" type="password" class="form__field form-control rounded-0 @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="new-password" autofocus>
                    <label for="password" class="form__label">{{ __('Password') }}*</label>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- Conferma Password --}}
                <div class="col-12 form__group field">
                    <input id="password-confirm" type="password" class="form__field form-control rounded-0" placeholder="Password Confirm" name="password_confirmation" required autocomplete="new-password" autofocus>
                    <label for="password" class="form__label">{{ __('Confirm Password') }}*</label>
                </div>

                {{-- Data di compleanno --}}
                <div class="col-12 form__group field">
                    <input id="date_of_birth" type="date" class="form__field form-control rounded-0 @error('date_of_birth') is-invalid @enderror" placeholder="Date of birth" name="date_of_birth" value="{{ old('date_of_birth') }}" required autocomplete="date_of_birth" autofocus>
                    <label for="date_of_birth" class="form__label">{{ __('Date of birth') }}*</label>
                    @error('date_of_birth')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- address --}}
                <div class="col-12 form__group field">
                    <input id="address" type="text" class="form__field form-control rounded-0 @error('address') is-invalid @enderror" value="{{ old('address') }}" name="address" placeholder="Address" name="address" required autocomplete="address" autofocus>
                    <label for="address" class="form__label">{{ __('Address') }}*</label>
                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- vat_number Partita Iva --}}
                <div class="col-12 form__group field">
                    <input id="vat_number" type="number" class="form__field form-control rounded-0 @error('vat_number') is-invalid @enderror" placeholder="Vat Number" name="vat_number" value="{{ old('vat_number') }}" autocomplete="vat_number" autofocus>
                    <label for="vat_number" class="form__label">{{ __('Vat number (partita Iva)') }}</label>
                    @error('vat_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- Numero di telefono --}}
                <div class="col-12 form__group field">
                    <input id="phone_number" type="number" class="form__field form-control rounded-0 @error('phone_number') is-invalid @enderror" placeholder="Phone Number" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number" autofocus>
                    <label for="phone_number" class="form__label">{{ __('Phone_number') }}*</label>
                    @error('phone_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- bio completa di stile da decomentare --}}
                {{-- <div class="col-12 form__group field">
                    <textarea id="bio" name="bio" cols="30" rows="10" class="form__field form-control rounded-0 @error('bio') is-invalid @enderror" placeholder="Bio" value="{{ old('bio') }}" required autocomplete="bio" autofocus></textarea>
                    <label for="bio" class="form__label">{{ __('Bio') }}</label>
                    @error('bio')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div> --}}

                {{-- img_path Immagine profilo senza stile --}}
                {{-- <div class="mb-4 row">
                    <label for="img_path"
                        class="col-md-4 col-form-label text-md-right">{{ __('Img path') }}</label>

                    <div class="col-md-6">
                        <input id="img_path" type="file"
                            class="form-control @error('img_path') is-invalid @enderror" name="img_path"
                            value="{{ old('img_path') }}" autocomplete="img_path" autofocus>

                        @error('img_path')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div> --}}

                {{-- background_dev Backround profilo senza stile --}}
                {{-- <div class="mb-4 row">
                    <label for="background_dev"
                        class="col-md-4 col-form-label text-md-right">{{ __('Background') }}</label>

                    <div class="col-md-6">
                        <input id="Background" type="file"
                            class="form-control @error('img_path') is-invalid @enderror" name="img_path"
                            value="{{ old('img_path') }}" autocomplete="img_path" autofocus>

                        @error('img_path')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div> --}}

                {{-- git_hub_link link GitHub --}}
                <div class="col-12 form__group field">
                    <input id="github_link" name="github_link" type="text" class="form__field form-control rounded-0 @error('github_link') is-invalid @enderror" placeholder="Github link" value="{{ old('github_link') }}" autocomplete="github_link" autofocus>
                    <label for="github_link" class="form__label">{{ __('Github') }}</label>
                    @error('github_link')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- linkedin_link link Linkedin --}}
                <div class="col-12 form__group field">
                    <input id="linkedin_link" name="linkedin_link" type="text" class="form__field form-control rounded-0 @error('linkedin_link') is-invalid @enderror" placeholder="Linkedin link" value="{{ old('linkedin_link') }}" autocomplete="linkedin_link" autofocus>
                    <label for="linkedin_link" class="form__label">{{ __('Linkedin') }}</label>
                    @error('linkedin_link')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- cv --}}
                <div class="col-12 form__group field">
                    <input id="cv" name="cv" type="file" class="form__field form-control rounded-0 @error('cv') is-invalid @enderror" placeholder="Curriculum" value="{{ old('cv') }}" required autocomplete="cv" autofocus>
                    <label for="curriculum" class="form__label">{{ __('Curriculum') }}*</label>
                    @error('cv')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- Soft Skill completa di stile da decomentare --}}
                {{-- <div class="col-12 form__group field">
                    <textarea id="soft_skill" name="soft_skill"  cols="30" rows="10" class="form__field form-control rounded-0 @error('soft_skill') is-invalid @enderror" placeholder="Soft skill" value="{{ old('soft_skill') }}" required autocomplete="soft_skill" autofocus></textarea>
                    <label for="soft_skill" class="form__label">{{ __('Soft skill') }}</label>
                    @error('soft_skill')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div> --}}

                {{-- LINGUAGGI --}}
                <div class="row py-3">
                    @foreach ($languages as $key => $language)
                    <div class="col-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="languages[]" value="{{$key+1}}" id="language_{{ $key }}">
                            <label class="form-check-label" for="language_{{ $key+1 }}">
                                {{$language}}
                            </label>
                        </div>
                    </div>
                    @endforeach
                    <div class="col-12 py-3">You must fill all the fields marked with *</div>
                </div>
                {{-- Pulsante registrati --}}
                <div class="mb-4 row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
