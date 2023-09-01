@extends('layouts.app')

@php
    $languages = config('store.programmingLanguages');
@endphp

@section('content')
    <div>
        <div class="containerFormCustom gradient-background">
            {{--Gif Gatto  --}}
            {{-- <div class="w-100">
                <img class="catGif"  src="{{ asset('output-onlinegiftools.gif')}}" alt="">
            </div> --}}
            {{-- CheckBOX --}}
            <input type="checkbox" id="signup_toggle">
            {{-- Form --}}
            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" class="needs-validation form">
                @csrf
                <div class="w-100">
                    <img class="catGif"  src="{{ asset('output-onlinegiftools.gif')}}" alt="">
                </div>
                {{-- Form front --}}
                <div class="form_front rounded-2">
                    <div class="row row-gap-3 justify-content-center m-0">
                        {{-- SignUp --}}
                        <div class="col-12 pt-3 text-center form_details">SignUp</div>
                        {{-- Name --}}
                        <div class="col-12 col-md-6 col-lg-6 px-0 form__group field">
                            <input id="name" type="text" name="name"
                                class="input form-control @error('name') is-invalid @enderror" placeholder="Name *"
                                value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                                <div class="invalid-feedback text-center d-flex flex-wrap" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                        {{-- Cognome --}}
                        <div class="col-12 px-0 col-md-4 col-lg-6 form__group field">
                            <input id="surname" type="input"
                                class="input form-control @error('surname') is-invalid @enderror" placeholder="Surname *"
                                name="surname" value="{{ old('surname') }}" required autocomplete="surname" autofocus>
                            @error('surname')
                                <div class="invalid-feedback text-center" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                        {{-- Email --}}
                        <div class="col-12 px-0 form__group field">
                            <input id="email" type="email"
                                class="input form-control @error('email') is-invalid @enderror" placeholder="Email *"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <div class="invalid-feedback text-center" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                        {{-- Password --}}
                        <div class="col-12 col-md-5 col-lg-6 px-0 form__group field">
                            <input id="password" type="password"
                                class="input form-control @error('password') is-invalid @enderror" placeholder="Password *"
                                name="password" required autocomplete="new-password" autofocus>
                            @error('password')
                                <div class="invalid-feedback text-center" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                        {{-- Conferma Password --}}
                        <div class="col-12 col-md-6 col-lg-6 px-0 form__group field">
                            <input id="password-confirm" type="password" class="input form-control"
                                placeholder="Password Confirm *" name="password_confirmation" required
                                autocomplete="new-password" autofocus>
                        </div>
                        {{-- Data di compleanno --}}
                        <div class="col-12 px-0 form__group field">
                            <input id="date_of_birth" type="date"
                                class="input form-control @error('date_of_birth') is-invalid @enderror"
                                placeholder="Date of birth *" name="date_of_birth" value="{{ old('date_of_birth') }}"
                                required autocomplete="date_of_birth" autofocus>
                            @error('date_of_birth')
                                <div class="invalid-feedback text-center" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                        {{-- address --}}
                        <div class="col-12 col-md-4 col-lg-6 px-0 form__group field">
                            <input id="address" type="text"
                                class="input form-control @error('address') is-invalid @enderror"
                                value="{{ old('address') }}" name="address" placeholder="Address *" name="address" required
                                autocomplete="address" autofocus>
                            @error('address')
                                <div class="invalid-feedback text-center" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                        {{-- vat_number Partita Iva --}}
                        <div class="col-12 col-md-7 col-lg-6 px-0 form__group field">
                            <input id="vat_number" type="number"
                                class="input form-control @error('vat_number') is-invalid @enderror"
                                placeholder="Vat Number " name="vat_number" value="{{ old('vat_number') }}"
                                autocomplete="vat_number" autofocus>
                            @error('vat_number')
                                <div class="invalid-feedback text-center" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                        {{-- Numero di telefono --}}
                        <div class="col-12 px-0 form__group field">
                            <input id="phone_number" type="number"
                                class="input form-control @error('phone_number') is-invalid @enderror"
                                placeholder="Phone Number *" name="phone_number" value="{{ old('phone_number') }}" required
                                autocomplete="phone_number" autofocus>
                            @error('phone_number')
                                <div class="invalid-feedback text-center" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                        {{-- git_hub_link link GitHub --}}
                        <div class="col-12 col-md-5 col-lg-6 px-0 form__group field">
                            <input id="github_link" name="github_link" type="text"
                                class="input form-control @error('github_link') is-invalid @enderror"
                                placeholder="Github link" value="{{ old('github_link') }}" autocomplete="github_link"
                                autofocus>
                            @error('github_link')
                                <div class="invalid-feedback text-center" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                        {{-- linkedin_link link Linkedin --}}
                        <div class="col-12 flex flex-wrap col-md-5 col-lg-6 px-0 form__group field">
                            <input id="linkedin_link" name="linkedin_link" type="text"
                                class="input form-control @error('linkedin_link') is-invalid @enderror"
                                placeholder="Linkedin link" value="{{ old('linkedin_link') }}"
                                autocomplete="linkedin_link" autofocus>
                            @error('linkedin_link')
                                <div class="invalid-feedback text-center" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                        {{-- cv --}}
                        <div class="col-12 px-0 form__group field">
                            <label class="custum-file-upload" for="file">
                                <div class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="" viewBox="0 0 24 24">
                                        <g stroke-width="0" id="SVGRepo_bgCarrier"></g>
                                        <g stroke-linejoin="round" stroke-linecap="round" id="SVGRepo_tracerCarrier"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path fill=""
                                                d="M10 1C9.73478 1 9.48043 1.10536 9.29289 1.29289L3.29289 7.29289C3.10536 7.48043 3 7.73478 3 8V20C3 21.6569 4.34315 23 6 23H7C7.55228 23 8 22.5523 8 22C8 21.4477 7.55228 21 7 21H6C5.44772 21 5 20.5523 5 20V9H10C10.5523 9 11 8.55228 11 8V3H18C18.5523 3 19 3.44772 19 4V9C19 9.55228 19.4477 10 20 10C20.5523 10 21 9.55228 21 9V4C21 2.34315 19.6569 1 18 1H10ZM9 7H6.41421L9 4.41421V7ZM14 15.5C14 14.1193 15.1193 13 16.5 13C17.8807 13 19 14.1193 19 15.5V16V17H20C21.1046 17 22 17.8954 22 19C22 20.1046 21.1046 21 20 21H13C11.8954 21 11 20.1046 11 19C11 17.8954 11.8954 17 13 17H14V16V15.5ZM16.5 11C14.142 11 12.2076 12.8136 12.0156 15.122C10.2825 15.5606 9 17.1305 9 19C9 21.2091 10.7909 23 13 23H20C22.2091 23 24 21.2091 24 19C24 17.1305 22.7175 15.5606 20.9844 15.122C20.7924 12.8136 18.858 11 16.5 11Z"
                                                clip-rule="evenodd" fill-rule="evenodd"></path>
                                        </g>
                                    </svg>
                                </div>
                                <div class="text">
                                    <div>Click to upload CV</div>
                                </div>
                                <input id="file" name="cv" type="file"
                                    class="input form-control @error('cv') is-invalid @enderror"
                                    placeholder="Curriculum *" value="{{ old('cv') }}" required autocomplete="cv"
                                    autofocus>
                            </label>
                            @error('cv')
                                <div class="invalid-feedback text-center" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                    </div>
                    {{-- Second Row  --}}
                    <div class="row pt-3 m-0 row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4">
                        @foreach ($languages as $key => $language)
                            {{-- LINGUAGGI --}}
                            <div class="col">
                                <div class="form-check">
                                    <label for="language_{{ $key}}">
                                        <input type="checkbox" class="input" name="languages[]"
                                        value="{{ $key + 1 }}" id="language_{{ $key }}">
                                        <span class="custom-checkbox"></span>
                                        {{ $language }}
                                    </label>
                                    {{-- <input class="form-check-input" type="checkbox" name="languages[]"
                                        value="{{ $key + 1 }}" id="language_{{ $key }}">
                                    <label class="form-check-label" for="language_{{ $key + 1 }}">
                                        {{ $language }}
                                    </label> --}}
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{-- Bottone e messaggio obligatiori --}}
                    <div class="row m-0 ">
                        {{-- BOTTONE --}}
                        <div class="col-12 mt-3 d-flex justify-content-center">
                            <button type="submit" class="btn">Signup</button>
                        </div>
                        {{-- HAI GIA UN ACCOUNT ? --}}
                        <div class="col-12 py-3 d-flex justify-content-center">
                            <span class="switch">Already have an account?
                                <label class="signup_tog" for="signup_toggle">
                                    Sign In
                                </label>
                            </span>
                        </div>
                    </div>
                </div>
                {{-- Form Back --}}
                <div class="form_back py-5">
                    <div class="row row-gap-3 justify-content-center m-0">
                        {{-- LOGIN --}}
                        <div class="col-12 text-center">
                            <div class="form_details">Login</div>
                        </div>
                        <div class="col-12">
                            <input placeholder="Email" class="input" type="text">
                        </div>
                        <div class="col-12">
                            <input placeholder="Password" class="input" type="text">
                        </div>
                        <div class="col-12">
                            <button class="btn">Login</button>
                        </div>
                        <div class="col-12">
                            <span class="switch">Don't have an account?
                                <label class="signup_tog" for="signup_toggle">
                                    Sign Up
                                </label>
                            </span>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
@endsection