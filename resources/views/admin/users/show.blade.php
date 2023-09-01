@extends('layouts.admin')

@section('content')
<div class="container my-3">

    <br>
    <div class="row g-4 gradient-background-dark">
        <div class="col">
            {{-- Immagine background --}}
            <div class="col-12 relative">
                @if ($user->bg_dev)
                <img src="{{asset("storage/".$user->bg_dev)}}" class="img-fluid border border-success border-5">
                @else
                <img src="https://picsum.photos/1200/600?random" class="img-fluid border border-success border-5">
                @endif
                {{-- Immagine profilo --}}
                <div class="absolute">
                    @if ($user->img_path)
                    <img src="{{asset("storage/".$user->img_path)}}" class="img-fluid rounded-circle border border-success border-5">
                    @else
                    <img src="https://picsum.photos/300/300?random" class="img-fluid rounded-circle border border-success border-5">
                    @endif
                </div>
            </div>
            {{-- Dati developer --}}
            <div class="card p-2 text-center px-5">
                <div>
                    <h1>{{$user->name}} {{$user->surname}}</h1>
                </div>
                <div>
                    <hr>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-6">
                            <p>{{ $user->email}}</p>
                            <p>{{ $user->date_of_birth}}</p>
                            <p>{{ $user->address}}</p>
                        </div>
                        <div class="col-6">
                            <p>Tel. {{ $user->phone_number}}</p>
                            <p>P.IVA {{ $user->vat_number}}</p>
                        </div>
                    </div>
                </div>

                {{-- Linguaggi di programmazione selezionati dall'utente --}}
                <div class="container">
                <div class="row">
                    <div class="col">
                        <h3>I tuoi Linguaggi</h3>
                        @if($user->programmingLanguages)
                            <ul class="list-group border-0">
                                @foreach ($user->programmingLanguages as $language)
                                <li  class="list-group-item border-0">{{$language->language}}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
                </div>

                {{-- Bio e Soft Skills --}}
                <div class="container">
                <div class="row">
                    <div class="col-6">
                        <h3>La tua Bio</h3>
                        <p>{{ $user->bio}}</p>
                    </div>
                    <div class="col-6">
                        <h3>Le tue Soft Skills</h3>
                        <p>{{ $user->soft_skill}}</p>
                    </div>
                </div>
                </div>

                    {{-- Sponsorizzate --}}
                    @if(empty($user->sponsors))
                        <ul class="list-group border-0">
                            <h3>Sponsor</h3>
                            @foreach ($user->sponsors as $sponsor)
                            <li  class="list-group-item border-0">{{$sponsor->name}}</li>
                            @endforeach
                        </ul>
                    @endif

                {{-- GitHub Linkedin e CV --}}
                <div class="container">
                    <div class="row">
                        <div class="col-6">
                            <a class="text-dark" href="{{asset('storage/' . $user->cv)}}" download="cv">Scarica il mio CV</a>
                        </div>
                        <div class="col-6">
                            <div class="col-12 py-1 d-flex justify-content-evenly">
                                <a href="{{ $user->github_link}}" target="_blank"><i class="fa-brands fa-github text-dark"></i></a>
                                <a href="{{ $user->linkedin_link}}" target="_blank"><i class="fa-brands fa-linkedin text-dark"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                {{--EDIT E DELETE ACCOUNT BUTTON--}}
                <div class="container p-2">
                    <div class="row">
                        <div class="col-6">
                            <a class="btn bg_lightgreen" href="{{ route("admin.users.edit", $user) }}">
                                <i class="fa fa-pencil" aria-hidden="true"></i> Modifica profilo
                            </a>
                        </div>
                        <div class="col-6">
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
