@extends('layouts.admin')

@section('content')
    <div class="container my-3">
        <div class="row d-flex justify-content-center">
            <div class="col">

            </div>
            <h1>Sponsorizzazioni</h1>
            <h3>Scegli il tipo di sponsorizzazione che vuoi acquistare e boosta il tuo profilo !</h3>
        </div>
        <div class="row g-4">
            <div class="col">
                <div class="d-flex flex-column">
                    <!--TIPI DI SPONSORIZZAZIONI-->
                    <div>
                        {{-- FORM --}}
                        <form action="{{ route('admin.payments.form', $user) }}" method="GET">
                            @csrf
                            <div class="plan-choser">
                                {{--PIANO 1--}}
                                <div class="d-flex justify-content-evenly">
                                    <div class="plan-option">
                                            <div class="plan-info">
                                                <div class="d-flex mb-4 plan">
                                                    <input value="{{ $sponsorships[0]->id}}" id="{{ $sponsorships[0]->id }}" name="sponsorships[]" type="radio">
                                                    <label for="{{ $sponsorships[0]->id }}">
                                                    <div class="inner">
                                                        <span class="pricing">
                                                            <span>
                                                                {{ $sponsorships[0]->price}} €<small>/ {{ $sponsorships[0]->time_sponsor }} H</small>
                                                            </span>
                                                        </span>
                                                        <p class="title mt-3">Piano {{ $sponsorships[0]->name }}</p>
                                                        <p class="info">Sponsorizza il tuo profilo per 24h ! Mostrati in home e allarga la scelta </p>
                                                        <ul class="features">
                                                            <li>
                                                                <span class="icon">
                                                                    <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M0 0h24v24H0z" fill="none"></path>
                                                                        <path fill="currentColor" d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
                                                                    </svg>
                                                                </span>
                                                                <span><strong>20</strong> team members</span>
                                                            </li>
                                                            <li>
                                                                <span class="icon">
                                                                    <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M0 0h24v24H0z" fill="none"></path>
                                                                        <path fill="currentColor" d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
                                                                    </svg>
                                                                </span>
                                                                <span>Plan <strong>team meetings</strong></span>
                                                            </li>
                                                            <li>
                                                                <span class="icon">
                                                                    <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M0 0h24v24H0z" fill="none"></path>
                                                                        <path fill="currentColor" d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
                                                                    </svg>
                                                                </span>
                                                                <span>File sharing</span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                {{--PIANO 2--}}
                                <div class="plan-option">
                                    <div class="plan-info">
                                        <div class="d-flex mb-4 plan">
                                            <input value="{{ $sponsorships[1]->id}}" id="{{ $sponsorships[1]->id }}" name="sponsorships[]" type="radio">
                                            <label for="{{ $sponsorships[1]->id }}">
                                            <div class="inner">
                                                <span class="pricing">
                                                    <span>
                                                        {{ $sponsorships[1]->price}} €<small>/ {{ $sponsorships[1]->time_sponsor }} H</small>
                                                    </span>
                                                </span>
                                                <p class="title mt-3">Piano {{ $sponsorships[1]->name }}</p>
                                                <p class="info">Sponsorizza il tuo profilo per 24h ! Mostrati in home e allarga la scelta </p>
                                                <ul class="features">
                                                    <li>
                                                        <span class="icon">
                                                            <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M0 0h24v24H0z" fill="none"></path>
                                                                <path fill="currentColor" d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
                                                            </svg>
                                                        </span>
                                                        <span><strong>20</strong> team members</span>
                                                    </li>
                                                    <li>
                                                        <span class="icon">
                                                            <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M0 0h24v24H0z" fill="none"></path>
                                                                <path fill="currentColor" d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
                                                            </svg>
                                                        </span>
                                                        <span>Plan <strong>team meetings</strong></span>
                                                    </li>
                                                    <li>
                                                        <span class="icon">
                                                            <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M0 0h24v24H0z" fill="none"></path>
                                                                <path fill="currentColor" d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
                                                            </svg>
                                                        </span>
                                                        <span>File sharing</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            {{--PIANO 3--}}
                            <div class="plan-option">
                                <div class="plan-info">
                                    <div class="d-flex mb-4 plan">
                                        <input value="{{ $sponsorships[2]->id}}" id="{{ $sponsorships[2]->id }}" name="sponsorships[]" type="radio">
                                        <label for="{{ $sponsorships[2]->id }}">
                                        <div class="inner">
                                            <span class="pricing">
                                                <span>
                                                    {{ $sponsorships[2]->price}} €<small>/ {{ $sponsorships[2]->time_sponsor }} H</small>
                                                </span>
                                            </span>
                                            <p class="title mt-3">Piano {{ $sponsorships[2]->name }}</p>
                                            <p class="info">Sponsorizza il tuo profilo per 24h ! Mostrati in home e allarga la scelta </p>
                                            <ul class="features">
                                                <li>
                                                    <span class="icon">
                                                        <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M0 0h24v24H0z" fill="none"></path>
                                                            <path fill="currentColor" d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
                                                        </svg>
                                                    </span>
                                                    <span><strong>20</strong> team members</span>
                                                </li>
                                                <li>
                                                    <span class="icon">
                                                        <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M0 0h24v24H0z" fill="none"></path>
                                                            <path fill="currentColor" d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
                                                        </svg>
                                                    </span>
                                                    <span>Plan <strong>team meetings</strong></span>
                                                </li>
                                                <li>
                                                    <span class="icon">
                                                        <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M0 0h24v24H0z" fill="none"></path>
                                                            <path fill="currentColor" d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
                                                        </svg>
                                                    </span>
                                                    <span>File sharing</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </label>
                        </div>
                            </div>
                                <button type="submit" class="choose-btn">
                                    Start
                                </button>
                            </div>
                        </form>
                    </div>
                    <!--SEZIONE DI PAGAMENTO-->
                </div>
            </div>
        </div>
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
