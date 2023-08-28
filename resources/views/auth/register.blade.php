@extends('layouts.app')

@php
    $languages = config('code_languages');
@endphp

@section('content')
    <div class="containe-fluid bg_gradiant py-3">
        <div>
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
        <div class="row justify-content-center m-0">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" class="needs-validation">
                            @csrf
                            {{-- Name --}}
                            <div class="mb-4 row">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- Cognome --}}
                            <div class="mb-4 row">
                                <label for="surname"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Surname') }}</label>

                                <div class="col-md-6">
                                    <input id="surname" type="text"
                                        class="form-control @error('surname') is-invalid @enderror" name="surname"
                                        value="{{ old('surname') }}" required autocomplete="surname" autofocus>

                                    @error('surname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- Email --}}
                            <div class="mb-4 row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- Password --}}
                            <div class="mb-4 row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- Conferma Password --}}
                            <div class="mb-4 row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            {{-- Data di compleanno --}}
                            <div class="mb-4 row">
                                <label for="date_of_birth"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Date of birth') }}</label>

                                <div class="col-md-6">
                                    <input id="date_of_birth" type="date"
                                        class="form-control @error('date_of_birth') is-invalid @enderror"
                                        name="date_of_birth" value="{{ old('date_of_birth') }}" required
                                        autocomplete="date_of_birth" autofocus>

                                    @error('date_of_birth')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- address --}}
                            <div class="mb-4 row">
                                <label for="address"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                                <div class="col-md-6">
                                    <input id="address" type="text"
                                        class="form-control @error('address') is-invalid @enderror" name="address"
                                        value="{{ old('address') }}" required autocomplete="address" autofocus>

                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- vat_number Partita Iva --}}
                            <div class="mb-4 row">
                                <label for="vat_number"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Vat number (partita Iva)') }}</label>

                                <div class="col-md-6">
                                    <input id="vat_number" type="number"
                                        class="form-control @error('vat_number') is-invalid @enderror" name="vat_number"
                                        value="{{ old('vat_number') }}" autocomplete="vat_number" autofocus>

                                    @error('vat_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- Numero di telefono --}}
                            <div class="mb-4 row">
                                <label for="phone_number"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Phone_number') }}</label>

                                <div class="col-md-6">
                                    <input id="phone_number" type="number"
                                        class="form-control @error('phone_number') is-invalid @enderror"
                                        name="phone_number" value="{{ old('phone_number') }}" required
                                        autocomplete="phone_number" autofocus>

                                    @error('phone_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- bio --}}
                            <div class="mb-4 row">
                                <label for="bio"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Bio') }}</label>

                                <div class="col-md-6">
                                    <textarea id="bio" name="bio" cols="30" rows="10"
                                        class="form-control @error('bio') is-invalid @enderror" value="{{ old('bio') }}"
                                        autocomplete="bio" autofocus>

                                </textarea>
                                    @error('bio')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- img_path Immagine profilo --}}
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
                            {{-- background_dev Backround profilo --}}

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
                            <div class="mb-4 row">
                                <label for="github_link"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Github') }}</label>

                                <div class="col-md-6">
                                    <input id="github_link" type="text"
                                        class="form-control @error('github_link') is-invalid @enderror"
                                        name="github_link" value="{{ old('github_link') }}"
                                        autocomplete="github_link" autofocus>

                                    @error('github_link')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- linkedin_link link Linkedin --}}
                            <div class="mb-4 row">
                                <label for="linkedin_link"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Linkedin') }}</label>

                                <div class="col-md-6">
                                    <input id="linkedin_link" type="text"
                                        class="form-control @error('linkedin_link') is-invalid @enderror"
                                        name="linkedin_link" value="{{ old('linkedin_link') }}"
                                        autocomplete="linkedin_link" autofocus>

                                    @error('linkedin_link')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- cv --}}
                            <div class="mb-4 row">
                                <label for="curriculum"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Curriculum') }}</label>

                                <div class="col-md-6">
                                    <input id="cv" type="file"
                                        class="form-control @error('cv') is-invalid @enderror" name="cv"
                                        value="{{ old('cv') }}"required autocomplete="cv" autofocus>

                                    @error('cv')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- Soft Skill --}}
                            <div class="mb-4 row">
                                <label for="soft_skill"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Soft skill') }}</label>

                                <div class="col-md-6">
                                    <textarea id="soft_skill" cols="30" rows="10"
                                        class="form-control @error('soft_skill') is-invalid @enderror" name="soft_skill"
                                        value="{{ old('soft_skill') }}" autocomplete="soft_skill" autofocus>

                                </textarea>
                                    @error('soft_skill')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
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
            </div>
        </div>
    </div>
@endsection
