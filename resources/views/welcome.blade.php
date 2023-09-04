@extends('layouts.app')
@section('content')

<div class="walpaperHome d-flex align-items-center justify-content-center gradient-background" >
    <div class="container">
        <div class="row ">
            <div class="col-8">
                <h1 class="display-5 fw-bold">
                    Benvenuto nel poratale dei <br>
                    <span class="text-warning">
                        Developer
                    </span>
                </h1>
            </div>
            <div class="col-4 p-0">
                <img class="w-100 h-100 object-fit-cover" src="prova.png" alt="">
            </div>
            <div class="col-11 d-flex justify-content-between">
                <a href="{{ route('register') }}">
                    <button class="btn btn-primary text-white">
                        Accedi/Registrati
                    </button>
                </a>
                <button class="btn btn-secondary">
                    <a class="text-white" href="{{ url('/homepage') }}">
                        Visitatore
                    </a>
                </button>
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
