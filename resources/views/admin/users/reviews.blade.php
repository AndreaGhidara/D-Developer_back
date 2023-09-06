@extends('layouts.admin')

@section('content')
<div class="container my-3 gradient-background-blue rounded-3 p-2">
    <div class="row">
        <div class="col text-center p-3">
            <h1 class="text-white orangeBg rounded-5 p-2">
                Recensioni ricevute
            </h1>
        </div>
    </div>
    @foreach ($reviews as $review)
        <div class="row d-flex justify-content-center text-center m-3 mb-3 rounded-3 bg-light">
            <div class="col-sm-4 p-3">
                <p class="text-white orangeBg rounded-3">
                  <i class="fa-regular fa-user"></i>
                </p>

                <h4>{{$review->name}}</h4>
            </div>
            <div class="col-sm-3 p-3">
                <p class="text-white orangeBg rounded-3">
                    <i class="fa-regular fa-envelope"></i>
                    Email
                </p>
                <h5>{{$review->email}}</h5>
            </div>
            <div class="col-sm-3 p-3">
                <p class="text-white orangeBg rounded-3">Ricevuta in data:</p>
                <h4>{{$review->date}}</h4>
            </div>
        </div>
        <div class="row m-3 rounded-3 bg-light">
            <div class="col pt-3">
                <p>{{$review->review}}</p>
            </div>
        </div>
        <hr class="mandarinText">
    @endforeach
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
