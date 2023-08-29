@extends('layouts.admin')

@section('content')
<div class="container my-3">

    <div class="row g-4 align-items-center justify-content-between">
        <div class="col-8">
            <a class="btn bg_lightgreen" href="{{ route("admin.users.edit", $user) }}">
                <i class="fa fa-pencil" aria-hidden="true"></i> Modifica il tuo profilo
            </a>
        </div>

    </div>
    <br>
    <div class="row g-4">
        <div class="col">
            <div>
                <div class="card p-2 text-center px-5">
                    <h1>{{$user->name}} {{$user->surname}}</h1>
                    <p>{{ $user->email}}</p>
                    <p>{{ $user->date_of_birth}}</p>
                    <p>{{ $user->address}}</p>

                    <div class="col-12 relative">
                        @if ($user->bg_dev)
                        <img src="{{asset($user->bg_dev)}}" class="img-fluid border border-success border-5">
                        @else
                        <img src="https://www.ivins.com/wp-content/uploads/2020/09/placeholder-1.png" class="img-fluid border border-success border-5">
                        @endif
                        <div class="absolute">
                            @if ($user->img_path)
                            <img src="{{asset($user->img_path)}}" class="img-fluid rounded-circle border border-success border-5">
                            @else
                            <img src="https://t3.ftcdn.net/jpg/05/16/27/58/360_F_516275801_f3Fsp17x6HQK0xQgDQEELoTuERO4SsWV.jpg" class="img-fluid rounded-circle border border-success border-5">
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 py-5 d-flex justify-content-evenly">
                            <a href="{{ $user->github_link}}" target="_blank"><i class="fa-brands fa-github"></i></a>
                            <a href="{{ $user->linkedin_link}}" target="_blank"><i class="fa-brands fa-linkedin"></i></a>
                        </div>
                    </div>
                    <p>{{ $user->bio}}</p>
                    <p>{{ $user->vat_number}}</p>
                    <a href="{{asset('storage/' . $user->cv)}}" download="cv">Scarica il mio CV</a>
                    <p>Tel. {{ $user->phone_number}}</p>
                    <p>{{ $user->soft_skill}}</p>
                    @if($user->code_languages)
                        <ul class="list-group border border-0">
                            <h3>Linguaggi</h3>
                            @foreach ($user->code_languages as $language)
                            <li  class="list-group-item border border-0">{{$language->technology}}</li>
                            @endforeach
                        </ul>
                    @endif
                        <p>{{$sponsorship}}</p>
                    <!--DELETE ACCOUNT BUTTON-->
                    <div class="col-3 d-flex justify-content-end">
                        <form action="{{ route('admin.users.destroy', $user) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                                Cancella profilo
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    var currentUserId = {{ Auth::user()->id }};

    window.onload = function() {
        var pathSegments = window.location.pathname.split("/");
        var userIdFromUrl = parseInt(pathSegments[pathSegments.length - 1]);

        if (!isNaN(userIdFromUrl) && userIdFromUrl !== currentUserId) {
                window.location.href = "/admin/users/" + currentUserId;
                alert("Non sei autorizzato ad accedere a questa pagina.");
            }
        };

</script>
@endsection
