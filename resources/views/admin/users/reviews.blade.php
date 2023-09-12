@extends('layouts.admin')

@section('content')
<div class="container gradient-background-blue rounded-3 p-2 overflow-auto h-75 reviewBoxMt">
    @foreach ($reviews as $review)
        <div class="row d-flex justify-content-center text-center m-3 rounded-3 bg-light">
            <div class="col-lg-4 p-3">
                <p class="text-white pillsBg rounded-3">
                  <i class="fa-regular fa-user"></i>
                  Nome Utente
                </p>

                <h4 class="reviewDD">{{$review->name}}</h4>
            </div>
            <div class="col-lg-3 p-3">
                <p class="text-white pillsBg rounded-3">
                    <i class="fa-regular fa-envelope"></i>
                    Email
                </p>
                <h5 class="reviewDD">{{$review->email}}</h5>
            </div>
            <div class="col-lg-3 p-3">
                <p class="text-white pillsBg rounded-3">Ricevuta in data:</p>
                <h4>{{$review->created_at}}</h4>
            </div>
        </div>
        <div class="row m-3 rounded-3 bg-light">
            <div class="col pt-3">
                <p class="reviewDD">{{$review->review}}</p>
            </div>
        </div>
        <hr class="mandarinText">
    @endforeach
    <img class="catImgPosition d-none d-xxl-block" src="/gatito.png" alt="">
</div>

<script>

    var currentUserId = {{ Auth::user()->id }};

    window.onload = function() {
        var pathSegments = window.location.pathname.split("/");
        var userIdFromUrl = parseInt(pathSegments[pathSegments.length - 2]);

        if (!isNaN(userIdFromUrl) && userIdFromUrl !== currentUserId) {
                window.location.href = "/admin/users/" + currentUserId + "/reviews";
                alert("Non sei autorizzato ad accedere a questa pagina.");
            }
        };

</script>
@endsection
