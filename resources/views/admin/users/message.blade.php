@extends('layouts.admin')

@section('content')
<div class="container d-flex justify-content-center my-3 rounded-3 p-2">
    <div class="row d-flex text-center text-white m-3">
        {{-- Titolo pagina --}}
        <div class="col">
            <h1 class="text-white mandarinBg rounded-5 p-3 w-100">
                Posta in arrivo
            </h1>
        </div>
    </div>
</div>
<div class="container my-3 gradient-background-blue rounded-3 p-2 overflow-auto h-75">
    <img class="relative imgChatPosition" src="/notif.png" alt="">
    <div class="row rounded-5 m-5">
        {{-- Inizio del ciclo --}}
        @foreach ($messages as $message)
        <div class="col-12 p-2 mb-1 rounded-5">
            <div class="row p-5">
                <div class="col">
                    <div class="card">
                        <h4 class="rounded-3 text-center text-white mandarinBg titleW p-2">
                            Hai ricevuto un <i class="fa-solid fa-envelope"></i> da :
                            <br>
                            {{$message->name}} {{$message->surname}}
                            <br>
                            {{$message->email}}
                        </h4>
                        <div class="card__content">
                            <p class="card__title"></p>
                            <p class="card__description">
                                <i class="fa-solid fa-envelope-open"></i> <br>
                                {{$message->text}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="mandarinText my-1">
        </div>
        @endforeach
        {{-- Fine del ciclo --}}
    </div>
    <img class="relative imgMessPosition" src="/mess.png" alt="">
</div>

<script>

    var currentUserId = {{ Auth::user()->id }};

    window.onload = function() {
        var pathSegments = window.location.pathname.split("/");
        var userIdFromUrl = parseInt(pathSegments[pathSegments.length - 2]);

        if (!isNaN(userIdFromUrl) && userIdFromUrl !== currentUserId) {
                window.location.href = "/admin/users/" + currentUserId + "/messages";
                alert("Non sei autorizzato ad accedere a questa pagina.");
            }
        };

</script>
@endsection
