@extends('layouts.app')
@section('content')
    <div class="walpaperHome d-flex align-items-center justify-content-center gradient-background">
        <div class="container">
            <div class="row flex-column flex-md-row gap-2">
                <div class="col-12 col-md-6 text-center welcomeText rounded-2 d-flex justify-content-center align-items-center">
                    <h1 class="display-5 fw-bold w-100">
                        Benvenuto nel portale dei <br>
                        <span class="text-warning">
                            Developer
                        </span>
                    </h1>
                </div>
                <div class="col-12 col-sm-7 col-md-5 p-0 rounded-2">
                    <img class="img-fluid object-fit-cover" src="codingConcept.png" alt="">
                </div>
                <div class="col-12 py-3 d-flex flex-column justify-content-between">
                    <a class="d-flex " href="{{ route('register') }}">
                        <button class="cta">
                            <span class="hover-underline-animation"> Register | Login </span>
                            <svg class="text-white" viewBox="0 0 46 16" height="10" width="30" xmlns="http://www.w3.org/2000/svg"
                                id="arrow-horizontal">
                                <path transform="translate(30)"
                                    d="M8,0,6.545,1.455l5.506,5.506H-30V9.039H12.052L6.545,14.545,8,16l8-8Z"
                                    data-name="Path 10" id="Path_10" style="fill: white"></path>
                            </svg>
                        </button>
                    </a>
                    <a class="text-white" href="{{ url('/homepage') }}">
                        <button class='btnCustomGo'>
                            <div class="btnCustomGoText text-warning">
                                <span>Vi</span>
                                <span>si</span>
                                <span>tatore</span>
                            </div>
                            <div class="btnCustomGoClone">
                                <span>Entra</span>
                                <span class="ps-1 text-warning">subito</span>
                            </div>
                            <svg width="20px" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 svgBtnCustomGoClone" fill="none"
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
<script src="{{ asset('js/function.js') }}"></script>
@endsection
