@extends('layouts.admin')

@section('content')
<div class="container gradient-background-blue rounded-3 p-lg-2 overflow-auto h-75 messageBoxMt">
    <img class="relative d-none d-xxl-block imgChatPosition img-fluid" src="/notif.png" alt="">
    <div class="row rounded-5 m-lg-5 m-1">
        {{-- Inizio del ciclo --}}
        @foreach ($messages as $message)
        <div class="col-12 p-2 mb-1 rounded-5">
            <div class="row p-lg-5">
                <div class="col">
                    <div class="card">
                        <p class="rounded-4 text-center text-white gradient-background-blue titleW p-2 cardText w-50">
                            Hai ricevuto un <i class="fa-solid fa-envelope"></i> da :
                        </p>
                        <p class="text-center cardText">
                            {{$message->name}} {{$message->surname}}
                            <br>
                            {{$message->email}}
                        </p>
                        <div class="card__content">
                            <p class="card__title"></p>
                            <p class="card__description">
                                <i class="fa-solid fa-envelope-open"></i>
                                <br>
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
    <img class="d-none d-xxl-block relative imgMessPosition" src="/mess.png" alt="">
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
