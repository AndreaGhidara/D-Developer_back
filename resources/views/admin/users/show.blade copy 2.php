@extends('layouts.admin')

@section('content')
    <div class="w-100 h-100 ps-0 p-3 overflow-y-auto">
        <div class="container-fluid gradient-background h-100 p-2 rounded-2 ">
            <div class="row m-0 p-0">
                <div class="col p-0 border rounded-2">
                    <div class="profileBackground gradient-background d-flex align-items-center justify-content-center">

                        <div class="profilePicture">

                        </div>
                    </div>
                </div>
            </div>
            {{-- Dati personali --}}
            <div class="row row-cols-1 m-0">
                <div class="row row-gap-3 m-0 mt-3 border">
                    {{-- Name Utente --}}
                    <div class="col-12 d-flex p-0">
                        <div class="flex-shrink-1 p-2">
                            <i class="fa-regular fa-user"></i>
                        </div>
                        <div class="textInputBox w-100">
                            <strong>
                                Marshal D. Teach
                            </strong>
                            <small class="tagInputBox">Nome utente</small>
                        </div>
                    </div>
                    {{-- Numero di telefono --}}
                    <div class="col-12 d-flex p-0">
                        <div class="flex-shrink-1 p-2">
                            <i class="fa-regular fa-user"></i>
                        </div>
                        <div class="textInputBox w-100">
                            33332531525
                            <small class="tagInputBox">Numero di telefono</small>
                        </div>
                    </div>
                    {{-- Email --}}
                    <div class="col-12 d-flex p-0">
                        <div class="flex-shrink-1 p-2">
                            <i class="fa-regular fa-user"></i>
                        </div>
                        <div class="textInputBox w-100">
                            Marshal@gmail.com
                            <small class="tagInputBox">Email</small>
                        </div>
                    </div>
                    {{-- Data di nascita --}}
                    <div class="col-12 d-flex p-0">
                        <div class="flex-shrink-1 p-2">
                            <i class="fa-regular fa-user"></i>
                        </div>
                        <div class="textInputBox w-100">
                            18/02/1999
                            <small class="tagInputBox">Data di nascita</small>
                        </div>
                    </div>
                    {{-- Indirizzo --}}
                    <div class="col-12 d-flex p-0">
                        <div class="flex-shrink-1 p-2">
                            <i class="fa-regular fa-user"></i>
                        </div>
                        <div class="textInputBox w-100">
                            Via gold d.roger
                            <small class="tagInputBox">Indirizzo</small>
                        </div>
                    </div>
                    {{-- Partita IVA --}}
                    <div class="col-12 d-flex p-0">
                        <div class="flex-shrink-1 p-2">
                            <i class="fa-regular fa-user"></i>
                        </div>
                        <div class="textInputBox w-100">
                            3151354515
                            <small class="tagInputBox">Partita Iva</small>
                        </div>
                    </div>
                </div>
                {{-- SOCIAL --}}
                <div class="row p-0 m-0 mt-3 border">
                    <div class="col-12 d-flex justify-space-between p-0">
                        {{-- Accordion --}}
                        <div>
                            <div class="dropdown">
                                <button class="SocialBtnCustom dropdown-toggle">
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
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </div>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Dropdown button
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </div>
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
