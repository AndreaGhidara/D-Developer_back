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
    <div class="row rounded-5 m-5">
        {{-- Inizio del ciclo --}}
        @foreach ($messages as $message)
        <div class="col-12 bg-light p-2 mb-5 rounded-5">
            <div class="row p-5">
                <div class="col-sm-7">
                    <h4 class="rounded-3 text-center text-white mandarinBg titleW p-2">
                        <i class="fa-solid fa-envelope-open-text"></i>
                        Hai ricevuto un messaggio da :
                    </h4>
                </div>
                {{-- Info utente che ha mandato il messaggio --}}
                <div class="col-sm-2 text-center rounded-3 text-white orangeBg m-2 p-2">
                    <h4>{{$message->name}} {{$message->surname}}</h4>
                </div>
                <div class="col-sm-2 text-center rounded-3 text-white orangeBg m-2 p-2">
                    <h5><i class="fa-regular fa-envelope"></i> {{$message->email}}</h5>
                </div>
            </div>
            <div class="row rounded-3 text-white orangeBg p-2 m-5">
                <div class="col">
                    <p>{{$message->text}}</p>
                </div>
            </div>
            <hr class="mandarinText">
        </div>
        @endforeach
        {{-- Fine del ciclo --}}
    </div>
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
