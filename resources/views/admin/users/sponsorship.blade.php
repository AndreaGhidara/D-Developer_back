@extends('layouts.admin')

@section('content')
    <div class="container my-3">
        <div class="row d-flex text-center my-5">
            <div class="col">
                <h2>Scegli il tipo di sponsorizzazione che vuoi acquistare e boosta il tuo profilo !</h2>
            </div>
        </div>
        <!--TIPI DI SPONSORIZZAZIONI-->
        <!-- FORM -->
        <form action="{{ route('admin.payments.form', $user) }}" method="GET">
            <div class="row plan-choser justify-content-evenly bgSponsorCard p-5 rounded-5 mb-4">
                @csrf
                {{--PIANO SPONSOR 1--}}
                <div class="col-lg-4 plan-option plan-info d-flex mb-4 plan">
                    <input value="{{ $sponsorships[0]->id}}" id="{{ $sponsorships[0]->id }}" name="sponsorships[]" type="radio">
                    <label for="{{ $sponsorships[0]->id }}">
                    <div class="inner">
                        <span class="pricing">
                            <span>
                                {{ $sponsorships[0]->price}} €<small>/ {{ $sponsorships[0]->time_sponsor }} H</small>
                            </span>
                        </span>
                        <h5 class="title mt-3">Piano {{ $sponsorships[0]->name }}</h5>
                        <p class="info">Sponsorizza il tuo profilo per 24h ! Mostrati in home e tra i primi risultati in ricerca</p>
                        <ul class="features">
                            <li>
                                <span class="icon">
                                    <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 0h24v24H0z" fill="none"></path>
                                        <path fill="currentColor" d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
                                    </svg>
                                </span>
                                <span><strong>24 h</strong> in evidenza</span>
                            </li>
                            <li>
                                <span class="icon">
                                    <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 0h24v24H0z" fill="none"></path>
                                        <path fill="currentColor" d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
                                    </svg>
                                </span>
                                <span>Maggior<strong> engagement</strong></span>
                            </li>
                            <li>
                                <span class="icon">
                                    <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 0h24v24H0z" fill="none"></path>
                                        <path fill="currentColor" d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
                                    </svg>
                                </span>
                                <span>Espansione network</span>
                            </li>
                        </ul>
                    </div>
                </div>
                {{--PIANO SPONSOR 2--}}
                <div class="col-lg-4 plan-option plan-info d-flex mb-4 plan">
                    <input value="{{ $sponsorships[1]->id}}" id="{{ $sponsorships[1]->id }}" name="sponsorships[]" type="radio">
                    <label for="{{ $sponsorships[1]->id }}">
                    <div class="inner">
                        <span class="pricing">
                            <span>
                                {{ $sponsorships[1]->price}} €<small>/ {{ $sponsorships[1]->time_sponsor }} H</small>
                            </span>
                        </span>
                        <h5 class="title mt-3">Piano {{ $sponsorships[0]->name }}</h5>
                        <p class="info">Sponsorizza il tuo profilo per 72h ! Mostrati in home e tra i primi risultati in ricerca</p>
                        <ul class="features">
                            <li>
                                <span class="icon">
                                    <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 0h24v24H0z" fill="none"></path>
                                        <path fill="currentColor" d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
                                    </svg>
                                </span>
                                <span><strong>72 h</strong> in evidenza</span>
                            </li>
                            <li>
                                <span class="icon">
                                    <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 0h24v24H0z" fill="none"></path>
                                        <path fill="currentColor" d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
                                    </svg>
                                </span>
                                <span>Maggior<strong> engagement</strong></span>
                            </li>
                            <li>
                                <span class="icon">
                                    <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 0h24v24H0z" fill="none"></path>
                                        <path fill="currentColor" d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
                                    </svg>
                                </span>
                                <span>Espansione network</span>
                            </li>
                        </ul>
                    </div>
                </div>
                {{--PIANO SPONSOR 3--}}
                <div class="col-lg-4 plan-option plan-info d-flex mb-4 plan">
                    <input value="{{ $sponsorships[2]->id}}" id="{{ $sponsorships[2]->id }}" name="sponsorships[]" type="radio">
                    <label for="{{ $sponsorships[2]->id }}">
                    <div class="inner">
                        <span class="pricing">
                            <span>
                                {{ $sponsorships[2]->price}} €<small>/ {{ $sponsorships[2]->time_sponsor }} H</small>
                            </span>
                        </span>
                        <h5 class="title mt-3">Piano {{ $sponsorships[0]->name }}</h5>
                        <p class="info">Sponsorizza il tuo profilo per 144h ! Mostrati in home e tra i primi risultati in ricerca</p>
                        <ul class="features">
                            <li>
                                <span class="icon">
                                    <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 0h24v24H0z" fill="none"></path>
                                        <path fill="currentColor" d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
                                    </svg>
                                </span>
                                <span><strong>144 h</strong> in evidenza</span>
                            </li>
                            <li>
                                <span class="icon">
                                    <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 0h24v24H0z" fill="none"></path>
                                        <path fill="currentColor" d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
                                    </svg>
                                </span>
                                <span>Maggior<strong> engagement</strong></span>
                            </li>
                            <li>
                                <span class="icon">
                                    <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 0h24v24H0z" fill="none"></path>
                                        <path fill="currentColor" d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
                                    </svg>
                                </span>
                                <span>Espansione network</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button type="submit" class="choose-btn">
                        Start
                    </button>
                </div>
            </div>
        </form>
        <!--SEZIONE DI PAGAMENTO-->
    </div>

    <script>
        var currentUserId = {{ Auth::user()->id }};

        window.onload = function() {
            var pathSegments = window.location.pathname.split("/");
            var userIdFromUrl = parseInt(pathSegments[pathSegments.length - 2]);

            if (!isNaN(userIdFromUrl) && userIdFromUrl !== currentUserId) {
                window.location.href = "/admin/users/" + currentUserId + "/sponsorship";
                alert("Non sei autorizzato ad accedere a questa pagina.");
            }
        };
    </script>
@endsection
