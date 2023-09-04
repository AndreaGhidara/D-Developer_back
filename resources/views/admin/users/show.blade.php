@extends('layouts.admin')

@section('content')
<div class="container my-3 gradient-background-dark">
    <div class="row justify-content-center">
        {{-- Sezione a sinistra--}}
        <div class="col-lg-5 p-5 m-3 lightBg rounded-3">
            <div class="row justify-content-center">
                {{-- Immagine background --}}
                <div class="col-12 justify-center relative">
                    @if ($user->bg_dev)
                    <img src="{{asset("storage/".$user->bg_dev)}}" class="imgBorderColor border-success border-5 w-100" height="150">
                    @else
                    <img src="https://picsum.photos/1200/600?random" class="imgBorderColor border-success border-5 w-100" height="150">
                    @endif
                </div>

                {{-- Immagine profilo --}}
                <div class="row relative justify-content-center imgPosition mb-5">
                    <div class="col-4 absolute">
                        @if ($user->img_path)
                        <img src="{{asset("storage/".$user->img_path)}}" class="imgBorderColor img-fluid rounded-circle border-success border-5">
                        @else
                        <img src="https://picsum.photos/300/300?random" class="imgBorderColor img-fluid rounded-circle border-success border-5">
                        @endif
                    </div>
                </div>
                {{-- Nome e Cognome --}}
                <div class="row py-2 text-center mt-4 align-items-center">
                    <div class="col-lg-6 ">
                        <h3 class="orangeText">{{$user->name}} {{$user->surname}}</h3>
                    </div>
                    {{-- Social e CV --}}
                    <div class="col-lg-6">
                        <a class="mx-1 text-dark" href="{{asset('storage/' . $user->cv)}}" download="cv">Il mio CV</a>
                        <a class="mx-1" href="{{ $user->github_link}}" target="_blank"><i class="fa-brands fa-github text-dark"></i></a>
                        <a class="mx-1" href="{{ $user->linkedin_link}}" target="_blank"><i class="fa-brands fa-linkedin text-dark"></i></a>
                    </div>
                </div>
                {{-- Altre info utente --}}
                <div class="row text-center mt-5">
                    <div class="col-lg-6">
                        <p class="orangeText">Email:</p>
                    </div>
                    <div class="col-lg-6">
                        <p class="orangeText">{{ $user->email}}</p>
                    </div>
                    <hr>
                </div>
                <div class="row text-center">
                    <div class="col-lg-6">
                        <p class="orangeText">Data di nascita:</p>
                    </div>
                    <div class="col-lg-6">
                        <p class="orangeText">{{ $user->date_of_birth}}</p>
                    </div>
                    <hr>
                </div>
                <div class="row text-center">
                    <div class="col-lg-6">
                        <p class="orangeText">Indirizzo:</p>
                    </div>
                    <div class="col-lg-6">
                        <p class="orangeText">{{ $user->address}}</p>
                    </div>
                    <hr>
                </div>
                <div class="row text-center">
                    <div class="col-lg-6">
                        <p class="orangeText">Numero di telefono:</p>
                    </div>
                    <div class="col-lg-6">
                        <p class="orangeText">{{ $user->phone_number}}</p>
                    </div>
                    <hr>
                </div>
                <div class="row text-center">
                    <div class="col-lg-6">
                        <p class="orangeText">P.IVA:</p>
                    </div>
                    <div class="col-lg-6">
                        <p class="orangeText">{{ $user->vat_number}}</p>
                    </div>
                    <hr>
                </div>
                {{-- EDIT E DELETE --}}
                <div class="row text-center mt-4">
                    <div class="col-lg-6">
                        <a class="btn bg_lightgreen" href="{{ route("admin.users.edit", $user) }}">
                            <i class="fa fa-pencil" aria-hidden="true"></i> Modifica profilo
                        </a>
                    </div>
                    <div class="col-lg-6">
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
        {{-- Sezione a destra--}}
        <div class="col-lg-5 p-0 m-3">
            <div class="row lightBg rounded-3 p-3 mb-3">
                <div class="col text-center">
                    <h3>I tuoi Linguaggi</h3>
                    <hr>
                    @if($user->programmingLanguages)
                        <ul class="border-0 row justify-content-center p-0">
                            @foreach ($user->programmingLanguages as $language)
                            <li class="col-lg-3 list-group-item border-0 rounded-4 orangeBg p-1 m-1">{{$language->language}}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
            <div class="row lightBg rounded-3 p-3 mt-3">
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <h3>La tua Bio</h3>
                            <p>{{ $user->bio}}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col">
                            <h3>Le tue Soft Skills</h3>
                            <p>{{ $user->soft_skill}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center text-center lightBg rounded-3 mx-5">
        <div class="col">
            {{-- Sponsorizzate --}}
            @if(empty($user->sponsors))
                <ul class="list-group border-0">
                    <h3>Sponsor</h3>
                    @foreach ($user->sponsors as $sponsor)
                    <li  class="list-group-item border-0">{{$sponsor->name}}</li>
                    @endforeach
                </ul>
            @endif
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
