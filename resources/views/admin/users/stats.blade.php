@extends('layouts.admin')

@section('content')
<div class="container my-3 gradient-background-blue rounded-3 p-2">
    <p>hello</p>
    @foreach ($messageGroup as $mes)
        <div class="form-check card m-4">
            <p>{{$mes->numero}}</p>
            <p>{{$mes->tempo}}</p>
        </div>
    @endforeach
</div>

<script>

    var currentUserId = {{ Auth::user()->id }};

    window.onload = function() {
        var pathSegments = window.location.pathname.split("/");
        var userIdFromUrl = parseInt(pathSegments[pathSegments.length - 2]);

        if (!isNaN(userIdFromUrl) && userIdFromUrl !== currentUserId) {
                window.location.href = "/admin/users/" + currentUserId + "/stats";
                alert("Non sei autorizzato ad accedere a questa pagina.");
            }
        };

</script>
@endsection
