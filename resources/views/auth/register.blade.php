@extends('layouts.app')

@php
    $languages = config('store.programmingLanguages');
@endphp

@section('content')
    @if (session('success'))
        <div class="alert alert-success m-0">
            {{ session('success') }}
        </div>
        <script>
            // Nascondi il form di registrazione dopo un certo periodo di tempo
            setTimeout(function() {
                document.getElementById('signup_toggle').click();
            }, 2000); // 3000 millisecondi (3 secondi) prima di nascondere il form di registrazione
        </script>
    @endif
    {{-- BACKGROUND --}}
    <div class="registerPageBg">
        {{-- CONTAINER FORM --}}
        <div class="FlipFormSign p-2">
            <input type="checkbox" id="signup_toggle">
            {{-- CONTAINER CHE RUOTA --}}
            <div class="FlipFormSign-inner">
                {{-- Front --}}
                <div class="FlipFormSign-front z-2">
                    <div class="container-fluid h-100 d-flex flex-column flex-sm-row p-2">
                        {{-- FORM FRONT --}}
                        <form class="w-100 needs-validation overflow-y-auto" method="POST" action="{{ route('register') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row m-0">
                                <div class="col-12 pt-3 text-center">Register</div>
                                {{-- Name --}}
                                <div class="col-6 p-1">
                                    <div class="input-container">
                                        <input type="text" id="name" name="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            value="{{ old('name') }}" required>
                                        <label for="input" class="label d-block form-label">Name</label>
                                        <div class="underline"></div>
                                        @error('name')
                                            <div class="invalid-feedback text-center d-flex flex-wrap" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                {{-- Surname --}}
                                <div class="col-6 p-1">
                                    <div class="input-container">
                                        <input type="text" id="surname" name="surname" id="surname"
                                            value="{{ old('surname') }}"
                                            class="form-control @error('surname') is-invalid @enderror" required>
                                        <label for="surname" class="label d-block  form-label">Surname</label>
                                        <div class="underline"></div>
                                        @error('surname')
                                            <div class="invalid-feedback text-center d-flex flex-wrap" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                {{-- EMAIL --}}
                                <div class="col-6 p-1">
                                    <div class="input-container">
                                        <input type="email" id="email" name="email" value="{{ old('email') }}"
                                            class="form-control @error('email') is-invalid @enderror" required>
                                        <label for="email" class="label d-block  form-label">Email</label>
                                        <div class="underline"></div>
                                        @error('email')
                                            <div class="invalid-feedback text-center d-flex flex-wrap" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                {{-- ANNO DI NASCITA --}}
                                <div class="col-6 p-1">
                                    <div class="input-container">
                                        <input id="date_of_birth" type="date"
                                            class="bg-trasparent inputForm form-control @error('date_of_birth') is-invalid @enderror"
                                            placeholder="Date of birth *" name="date_of_birth"
                                            value="{{ old('date_of_birth') }}" required autocomplete="date_of_birth"
                                            autofocus>
                                        <label for="date_of_birth" class="label d-block  form-label"></label>
                                        <div class="underline"></div>
                                        @error('date_of_birth')
                                            <div class="invalid-feedback text-center" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                {{-- PASSWORD --}}
                                <div class="col-6 p-1">
                                    <div class="input-container">
                                        <input type="password" id="password" name="password"
                                            class="form-control @error('password') is-invalid @enderror" required>
                                        <label for="input" class="label d-block  form-label">Password</label>
                                        <div class="underline"></div>
                                        @error('password')
                                            <div class="invalid-feedback text-center d-flex flex-wrap" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                {{-- VERIFIFA PASSWORD --}}
                                <div class="col-6 p-1">
                                    <div class="input-container">
                                        <input type="password" id="password_confirmation" name="password_confirmation"
                                            id="password_confirmation"
                                            class="form-control @error('password_confirmation') is-invalid @enderror"
                                            required>
                                        <label for="password_confirmation" class="label d-block form-label">Password Confirm
                                            *</label>
                                        <div class="underline"></div>
                                        @error('password_confirmation')
                                            <div class="invalid-feedback text-center d-flex flex-wrap" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                {{-- ADDRESS --}}
                                <div class="col-6 p-1">
                                    <div class="input-container">
                                        <input type="text" id="address" name="address"
                                            class="form-control @error('address') is-invalid @enderror"
                                            value="{{ old('address') }}" required>
                                        <label for="address" class="label d-block  form-label">Indirizzo</label>
                                        <div class="underline"></div>
                                        @error('address')
                                            <div class="invalid-feedback text-center d-flex flex-wrap" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                {{-- NUMERO DI TELEFONO --}}
                                <div class="col-6 p-1">
                                    <div class="input-container">
                                        <input type="text" id="phone_number" name="phone_number"
                                            class="form-control @error('phone_number') is-invalid @enderror"
                                            value="{{ old('phone_number') }}" required="">
                                        <label for="phone_number" class="label d-block  form-label">Numero di
                                            Telefono</label>
                                        <div class="underline"></div>
                                        @error('phone_number')
                                            <div class="invalid-feedback text-center d-flex flex-wrap" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                {{-- Partita IVA --}}
                                <div class="col-12 p-1">
                                    <div class="input-container">
                                        <input type="text" id="vat_number" name="vat_number"
                                            class="form-control @error('vat_number') is-invalid @enderror"
                                            value="{{ old('vat_number') }}" required>
                                        <label for="vat_number" class="label d-block  form-label">Partita
                                            IVA</label>
                                        <div class="underline"></div>
                                        @error('vat_number')
                                            <div class="invalid-feedback text-center d-flex flex-wrap" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                {{-- CV --}}
                                <div class="col-12">
                                    <div class="div">
                                        <label class="custum-file-upload" for="cv">
                                            <div class="icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill=""
                                                    viewBox="0 0 24 24">
                                                    <g stroke-width="0" id="SVGRepo_bgCarrier"></g>
                                                    <g stroke-linejoin="round" stroke-linecap="round"
                                                        id="SVGRepo_tracerCarrier">
                                                    </g>
                                                    <g id="SVGRepo_iconCarrier">
                                                        <path fill=""
                                                            d="M10 1C9.73478 1 9.48043 1.10536 9.29289 1.29289L3.29289 7.29289C3.10536 7.48043 3 7.73478 3 8V20C3 21.6569 4.34315 23 6 23H7C7.55228 23 8 22.5523 8 22C8 21.4477 7.55228 21 7 21H6C5.44772 21 5 20.5523 5 20V9H10C10.5523 9 11 8.55228 11 8V3H18C18.5523 3 19 3.44772 19 4V9C19 9.55228 19.4477 10 20 10C20.5523 10 21 9.55228 21 9V4C21 2.34315 19.6569 1 18 1H10ZM9 7H6.41421L9 4.41421V7ZM14 15.5C14 14.1193 15.1193 13 16.5 13C17.8807 13 19 14.1193 19 15.5V16V17H20C21.1046 17 22 17.8954 22 19C22 20.1046 21.1046 21 20 21H13C11.8954 21 11 20.1046 11 19C11 17.8954 11.8954 17 13 17H14V16V15.5ZM16.5 11C14.142 11 12.2076 12.8136 12.0156 15.122C10.2825 15.5606 9 17.1305 9 19C9 21.2091 10.7909 23 13 23H20C22.2091 23 24 21.2091 24 19C24 17.1305 22.7175 15.5606 20.9844 15.122C20.7924 12.8136 18.858 11 16.5 11Z"
                                                            clip-rule="evenodd" fill-rule="evenodd"></path>
                                                    </g>
                                                </svg>
                                            </div>
                                            <div class="text text-white">
                                                <div>Click to upload CV</div>
                                            </div>
                                            <input onchange="changeColor()" id="cv" name="cv" type="file"
                                                class="inputForm @error('cv') is-invalid @enderror"
                                                value="{{ old('cv') }}" placeholder="Curriculum *">
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-0 mt-3 row-cols-1 row-cols-sm-2 ">
                                {{-- LINGUAGGI --}}
                                @foreach ($languages as $key => $language)
                                    <div class="col">
                                        <div class="form-check">
                                            <label class="text-white" for="language_{{ $key }}">
                                                <input type="checkbox" class="input" name="languages[]"
                                                    value="{{ $key + 1 }}" id="language_{{ $key }}">
                                                <span class="custom-checkbox"></span>
                                                {{ $language }}
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            {{-- Row-3-FRONT --}}
                            <div class="row m-0 ">
                                {{-- BOTTONE --}}
                                <div class="col-12 mt-3 d-flex justify-content-center">
                                    <button type="submit" class="buttonFormSignIn">
                                        <span class="liquid"></span>
                                        <span class="buttonFormSignIn-txt">Registrati</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                        {{-- Seconda PARTE FRONT --}}
                        <div class="w-75 d-flex">
                            <div class="row w-100 d-flex justify-content-beetwen m-0">
                                <div class="col-12 d-none d-sm-block p-3 d-flex justify-content-end align-items-start">
                                    <img class="img-fluid rounded-2" src="camera.jpg" alt="">
                                </div>
                                <div class="col-12 py-2 d-flex justify-content-end align-items-end">
                                    <span class="switch">Hai già un account?
                                        <label class="signup_tog text-white" for="signup_toggle">
                                            Login
                                        </label>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- BACK --}}
                <div class="FlipFormSign-back">
                    <div
                        class="container-fluid d-flex flex-column-reverse justify-content-between flex-sm-row h-100 d-flex p-2">
                        <div class="row  m-0">
                            <div class="col-12 d-none d-sm-block h-75 p-3">
                                <img class="img-fluid w-75 rounded-2" src="homeCity.jpg" alt="">
                            </div>
                            <div class="col-12 d-flex justify-content-start align-items-end">
                                <span class="switch text-black">Non hai un account?
                                    <label class="signup_tog text-white" for="signup_toggle">
                                        Registrati
                                    </label>
                                </span>
                            </div>
                        </div>
                        <div class="row w-100 d-flex flex-column m-0">
                            {{-- LOGIN --}}
                            <div class="col-12 pt-3 text-center form_details">LogIn</div>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                {{-- EMAIL --}}
                                <div class="col-12">
                                    <div class="input-container">
                                        <input id="emailLog" type="text"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" required autofocus>
                                        <label for="input" class="label d-block  form-label">Email</label>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                {{-- Password --}}
                                <div class="col-12">
                                    <div class="input-container">
                                        <input id="passwordLog" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                {{-- Remeber Password --}}
                                <div class="col-12 d-flex text-white">
                                    <input type="checkbox" class="input" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>
                                    <label class="custom-checkbox" for="remember">
                                    </label>
                                    <p class="ps-2 m-0">
                                        {{ __('Remember Me') }}
                                    </p>
                                </div>
                                {{-- Login --}}
                                <div class="col-12 mt-3 d-flex justify-content-center">
                                    <button type="submit" class="buttonFormSignIn">
                                        <span class="liquid"></span>
                                        <span class="buttonFormSignIn-txt">{{ __('Login') }}</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/function.js') }}"></script>
@endsection
