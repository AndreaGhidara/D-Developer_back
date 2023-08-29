@extends('layouts.admin')

@section('content')
<div class="container my-3">
    <div class="row g-4">
        <div class="col">
            <div>
                <h3>Recensioni</h3>
                <br>
                @foreach ($reviews as $review)
                <div class="list-group border border-0">
                    <h4>{{$review->date}}</h4>
                    <h4>{{$review->name}}</h4>
                    <h5>{{$review->email}}</h5>
                    <p>{{$review->review}}</p>
                    <br>
                @endforeach
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
                window.location.href = "/admin/users/" + currentUserId + "/messages";
                alert("Non sei autorizzato ad accedere a questa pagina.");
            }
        };

</script>
@endsection
