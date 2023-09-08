@extends('layouts.app')
@section('content')
    <div class="walpaperHome d-flex align-items-center justify-content-center gradient-background">
        <div class="container">
            <div class="row gap-2">
                <div class="col-7 welcomeText rounded-2 d-flex justify-content-center align-items-center">
                    <h1 class="display-5 fw-bold">
                        Benvenuto nel poratale dei <br>
                        <span class="text-warning">
                            Developer
                        </span>
                    </h1>
                </div>
                <div class="col-4 p-0 rounded-2">
                    <img class="w-100 h-100 object-fit-cover" src="codingConcept.png" alt="">
                </div>
                <div class="col-11 py-3 d-flex justify-content-between">
                    <a href="{{ route('register') }}">
                        <button class="btnCustomWelcome rounded text-white">
                            Accedi/Registrati
                        </button>
                    </a>
                    <a class="text-white" href="{{ url('/homepage') }}">
                        <button class='btnCustomGo'>
                            <div class="btnCustomGoText">
                                <span>Vi</span>
                                <span>si</span>
                                <span>tatore</span>
                            </div>
                            <div class="btnCustomGoClone">
                                <span>Entra</span>
                                <span class="ps-1">subito</span>
                            </div>
                            <svg width="20px" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="jumbotron pb-4 py-5 bg-light bg_gradiant">
    <div class="container">
        <div class="row text-center justify-content-center">
            <div class="logoBig">
                <img src="/logoBig.png" alt="" class="img-fluid">
            </div>
            <h1 class="display-5 fw-bold">
                Benvenuto nel poratale dei Developer
            </h1>

            <p class="col-md-8 fs-4">Qui potrai trovare il tuo professionista di fiducia nei linguaggi da te richiesti</p>
        </div>
    </div>
</div>

<div class="content bg_light">
    <div class="container  bg_light">
        <div class="row justify-content-center py-4">
            <div class="col-auto">
                <p>Registarti al nostro sito e non perdere nessun occasione per lavorare con persone nuove</p>
            </div>
        </div>
    </div>
</div> --}}
@endsection
