@extends('layouts.admin')

@section('content')
<div class="container my-3">
    <div class="row g-4">
        <div class="col">
            <div>
                <h3>Sponsorizzazioni</h3>
                <br>
                @foreach ($sponsorships as $sponsorship)
                <div class="list-group border border-0">
                    <h4>{{$sponsorship->name}}</h4>
                    <h4>{{$sponsorship->price}}</h4>
                    <h5>{{$sponsorship->time_sponsor}}</h5>
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
