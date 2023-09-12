@extends('layouts.admin')

@section('content')
    <div class="w-100 h-100 py-3 pe-2">

        <div class="container-fluid h-100  p-0 rounded-2 ">
            {{-- BG IMG AND STARS --}}
            <div class="row m-0 p-0 bg-primary-subtle topProfilePic">
                {{-- <img class="rounded-top" src="{{ asset('banner.png') }}" alt=""> --}}
                @if ($user->bg_dev)
                    <img src="{{ asset('storage/' . $user->bg_dev) }}" class="rounded-top">
                @else
                    <img src="https://picsum.photos/1200/600?random" class="rounded-top">
                @endif
                {{-- profile picture --}}
                <div class="col p-0 ContainerProfilePicture">
                    @if ($user->img_path)
                        <img src="{{ asset('storage/' . $user->img_path) }}" class="img-fluid">
                    @else
                        <img src="https://picsum.photos/300/300?random" class="img-fluid">
                    @endif
                </div>
                {{-- stars --}}
                <div class="col p-4 startsProfileVote">

                    @if (isset($mediaVoti))

                        @for ($i = 0; $i < $mediaVoti; $i++)
                            <i class="fa-solid fa-star orangeText"></i>
                        @endfor

                    @endif

                </div>
                <div class="col delateAccountContainer d-flex justify-content-end">
                    <button class="btnDelateAccount">
                        <svg viewBox="0 0 15 17.5" height="17.5" width="15" xmlns="http://www.w3.org/2000/svg"
                            class="iconDelateAccount">
                            <path transform="translate(-2.5 -1.25)"
                                d="M15,18.75H5A1.251,1.251,0,0,1,3.75,17.5V5H2.5V3.75h15V5H16.25V17.5A1.251,1.251,0,0,1,15,18.75ZM5,5V17.5H15V5Zm7.5,10H11.25V7.5H12.5V15ZM8.75,15H7.5V7.5H8.75V15ZM12.5,2.5h-5V1.25h5V2.5Z"
                                id="Fill"></path>
                        </svg>
                    </button>
                </div>
            </div>
            {{-- 2 Big container --}}
            <div class="d-flex flex-column flex-sm-row m-0 px-2">
                {{-- Info Utente Left --}}
                <div class="row m-0 flex-grow-1 flex-column mb-3 row-gap-3 px-0 pe-2 py-3 border rounded-2">
                    {{-- Nome e Cognome --}}
                    <div class="col p-0 d-flex">
                        <div class="flex-shrink-1 p-2">
                            <i class="fa-regular fa-user"></i>
                        </div>
                        <div class="textInputBox w-100">
                            <strong>
                                {{ $user->name }} {{ $user->surname }}
                            </strong>
                            <small class="tagInputBox">Nome utente</small>
                        </div>
                    </div>
                    {{-- Email --}}
                    <div class="col p-0 d-flex">
                        <div class="flex-shrink-1 p-2">
                            <i class="fa-regular fa-envelope"></i>
                        </div>
                        <div class="textInputBox w-100">
                            <strong>
                                {{ $user->email }}
                            </strong>
                            <small class="tagInputBox">Email</small>
                        </div>
                    </div>
                    {{-- Data di nascita --}}
                    <div class="col p-0 d-flex">
                        <div class="flex-shrink-1 p-2">
                            <i class="fa-regular fa-calendar"></i>
                        </div>
                        <div class="textInputBox w-100">
                            <strong>
                                {{ $user->date_of_birth }}
                            </strong>
                            <small class="tagInputBox">Data di nascita</small>
                        </div>
                    </div>
                    {{-- Indirizzo --}}
                    <div class="col p-0 d-flex">
                        <div class="flex-shrink-1 p-2">
                            <i class="fa-solid fa-map-pin"></i>
                        </div>
                        <div class="textInputBox w-100">
                            <strong>
                                {{ $user->address }}
                            </strong>
                            <small class="tagInputBox">Indirizzo</small>
                        </div>
                    </div>
                    {{-- P. IVA --}}
                    <div class="col p-0 d-flex">
                        <div class="flex-shrink-1 p-2">
                            <i class="fa-solid fa-receipt"></i>
                        </div>
                        <div class="textInputBox w-100">
                            <strong>
                                {{ $user->vat_number }}
                            </strong>
                            <small class="tagInputBox">P. Iva</small>
                        </div>
                    </div>
                    {{-- Numero di telefono --}}
                    <div class="col p-0 d-flex">
                        <div class="flex-shrink-1 p-2">
                            <i class="fa-solid fa-mobile-screen-button"></i>
                        </div>
                        <div class="textInputBox w-100">
                            <strong>
                                {{ $user->phone_number }}
                            </strong>
                            <small class="tagInputBox">Telefono</small>
                        </div>
                    </div>
                </div>
                {{-- RIGHT USER --}}
                <div class="row m-0 flex-column align-items-center">
                    {{-- Social and CV --}}
                    <div
                        class="col d-flex flex-column gap-2 flex-sm-row flex-wrap justify-content-between align-items-center mb-3 rounded-2">
                        {{-- LINKEDIN --}}
                        <div class="div">
                            <a href="{{ $user->linkedin_link }}" target="_blank">
                                <button class="SocialBtnCustom">
                                    <span class="svgSocialContainer">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512" height="1.6em"
                                            fill="white">
                                            <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                            <path
                                                d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z" />
                                        </svg>
                                    </span>
                                    <span class="bgSocialIcon"></span>
                                </button>
                            </a>
                        </div>
                        {{-- Download CV --}}
                        <div class="div mx-1">
                            <a href="{{ asset('storage/' . $user->cv) }}" download="cv">
                                <div class="btnDownloadProfile" data-tooltip="Size: 20Mb">
                                    <div class="btnDownloadProfile-wrapper">
                                        <div class="textBtnDownloadProfile">Download CV</div>
                                        <span class="iconBtnDownloadProfile">
                                            <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img"
                                                width="2em" height="2em" preserveAspectRatio="xMidYMid meet"
                                                viewBox="0 0 24 24">
                                                <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M12 15V3m0 12l-4-4m4 4l4-4M2 17l.621 2.485A2 2 0 0 0 4.561 21h14.878a2 2 0 0 0 1.94-1.515L22 17">
                                                </path>
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        {{-- LINKEDIN --}}
                        <div class="div">
                            <a href="{{ $user->github_link }}" target="_blank">
                                <div class="div">
                                    <button class="SocialBtnCustom">
                                        <span class="svgSocialContainer ">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512" height="1.6em"
                                                viewBox="0 0 480 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                <style>
                                                    svg {
                                                        fill: #ffffff
                                                    }
                                                </style>
                                                <path
                                                    d="M186.1 328.7c0 20.9-10.9 55.1-36.7 55.1s-36.7-34.2-36.7-55.1 10.9-55.1 36.7-55.1 36.7 34.2 36.7 55.1zM480 278.2c0 31.9-3.2 65.7-17.5 95-37.9 76.6-142.1 74.8-216.7 74.8-75.8 0-186.2 2.7-225.6-74.8-14.6-29-20.2-63.1-20.2-95 0-41.9 13.9-81.5 41.5-113.6-5.2-15.8-7.7-32.4-7.7-48.8 0-21.5 4.9-32.3 14.6-51.8 45.3 0 74.3 9 108.8 36 29-6.9 58.8-10 88.7-10 27 0 54.2 2.9 80.4 9.2 34-26.7 63-35.2 107.8-35.2 9.8 19.5 14.6 30.3 14.6 51.8 0 16.4-2.6 32.7-7.7 48.2 27.5 32.4 39 72.3 39 114.2zm-64.3 50.5c0-43.9-26.7-82.6-73.5-82.6-18.9 0-37 3.4-56 6-14.9 2.3-29.8 3.2-45.1 3.2-15.2 0-30.1-.9-45.1-3.2-18.7-2.6-37-6-56-6-46.8 0-73.5 38.7-73.5 82.6 0 87.8 80.4 101.3 150.4 101.3h48.2c70.3 0 150.6-13.4 150.6-101.3zm-82.6-55.1c-25.8 0-36.7 34.2-36.7 55.1s10.9 55.1 36.7 55.1 36.7-34.2 36.7-55.1-10.9-55.1-36.7-55.1z" />
                                            </svg>
                                        </span>
                                        <span class="bgSocialIcon bgSocialIconGitHub"></span>
                                    </button>
                                </div>
                            </a>
                        </div>
                    </div>
                    {{-- Bio --}}
                    <div class="col">
                        <p class="d-flex gap-1">
                            <button class="btn border w-100" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                Bio
                            </button>
                        </p>
                        <div class="collapse" id="collapseExample">
                            <div class="card card-body bg-transparent">
                                @if ( $user->bio)
                                    {{$user->bio}}
                                @else
                                   
                                    Modifica il tuo profilo e aggiungi la tua Biografia
                                   
                                @endif
                               
                            </div>
                        </div>
                    </div>
                    {{-- Soft Skills --}}
                    <div class="col py-3">
                        <p class="d-flex gap-1">
                            <button class="btn border w-100" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseExample1" aria-expanded="false" aria-controls="collapseExample">
                                Soft Skills
                            </button>
                        </p>
                        <div class="collapse" id="collapseExample1">
                            <div class="card card-body bg-transparent">
                                @if ( $user->soft_skill)
                                    {{$user->soft_skill}}
                                @else
                                   
                                    Modifica il tuo profilo e aggiungi le tue Soft Skills
                                   
                                @endif
                            </div>
                        </div>
                    </div>
                    {{-- Linguaggi --}}
                    <div class="col">
                        <p class="d-flex gap-1">
                            <button class="btn border w-100" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseExample3" aria-expanded="false" aria-controls="collapseExample">
                                Linguaggi
                            </button>
                        </p>
                        <div class="collapse" id="collapseExample3">
                            <div class="card card-body bg-transparent">
                                @if ($user->programmingLanguages)
                                    <ul class="border-0 row justify-content-center m-0 p-0">
                                        @foreach ($user->programmingLanguages as $language)
                                            <li
                                                class="col-lg-3 text-white list-group-item border-0 rounded-4 orangeBg p-1 m-1">
                                                {{ $language->language }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col d-flex align-items-center">
                        <div class="flex-shrink-1 p-2">
                            <i class="fa-regular fa-handshake"></i>
                        </div>
                        <div class="textInputBox w-100">
                            <strong>
                                {{-- Sponsorizzate --}}
                                @if (empty($user->sponsors))
                                    <ul class="list-group border-0">
                                        <h3>Sponsor</h3>
                                        @foreach ($user->sponsors as $sponsor)
                                            <li class="list-group-item border-0">{{ $sponsor->name }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </strong>
                            <small class="tagInputBox">Sponsor</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var currentUserId = {{ Auth::user()->id }};

        window.onload = function() {
            var pathSegments = window.location.pathname.split("/");
            var userIdFromUrl = parseInt(pathSegments[pathSegments.length - 1]);

            if (!isNaN(userIdFromUrl) && userIdFromUrl !== currentUserId) {
                window.location.href = "/admin/users/" + currentUserId;
                alert("Non sei autorizzato ad accedere a questa pagina.");
            }
        };
    </script>
@endsection
