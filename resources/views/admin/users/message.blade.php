@extends('layouts.admin')

@section('content')
<div class="container my-3 gradient-background-blue rounded-3 p-2">
    <div class="row text-center text-white m-3">
        <div class="col">
            <h1 class="text-white orangeBg rounded-5 p-2">Posta in arrivo</h1>
        </div>
    </div>
    <div class="row bg-light rounded-5 m-5">
        <div class="col">
            @foreach ($messages as $message)
                <h4 class="rounded-3 text-center text-white orangeBg w-50 p-2 m-5">
                    <i class="fa-solid fa-envelope-open-text"></i>
                    Hai ricevuto un nuovo messaggio da :
                </h4>
                <div class="row text-center rounded-3 text-white orangeBg p-2 m-5">
                    <div class="col-md-6 d-flex">
                        <h4><i class="fa-regular fa-user"></i> {{$message->name}} {{$message->surname}}</h4>
                    </div>
                    <div class="col-md-6">
                        <h5><i class="fa-regular fa-envelope"></i> {{$message->email}}</h5>
                    </div>
                </div>
                <div class="row rounded-3 text-white orangeBg p-2 m-5">
                    <div class="col">
                        <p>{{$message->text}}</p>
                    </div>
                </div>
                <hr>
            @endforeach
        </div>
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
