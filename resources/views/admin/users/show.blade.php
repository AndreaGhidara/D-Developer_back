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
                {{-- Dati anagrafici developer --}}
                <div class="card p-2 text-center px-5">
                    <h1>{{$user->name}} {{$user->surname}}</h1>
                    <p>{{ $user->email}}</p>
                    <p>{{ $user->date_of_birth}}</p>
                    <p>{{ $user->address}}</p>

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

                    {{-- Link collegamenti social --}}
                    <div class="row">
                        <div class="col-12 py-5 d-flex justify-content-evenly">
                            <a href="{{ $user->github_link}}" target="_blank"><i class="fa-brands fa-github"></i></a>
                            <a href="{{ $user->linkedin_link}}" target="_blank"><i class="fa-brands fa-linkedin"></i></a>
                        </div>
                    </div>

                    {{-- Informazioni generali + skills --}}
                    <p>{{ $user->bio}}</p>
                    <p>{{ $user->vat_number}}</p>
                    <a href="{{asset('storage/' . $user->cv)}}" download="cv">Scarica il mio CV</a>
                    <p>Tel. {{ $user->phone_number}}</p>
                    <p>{{ $user->soft_skill}}</p>
                    @if($user->programmingLanguages)
                        <ul class="list-group border-0">
                            <h3>Linguaggi</h3>
                            @foreach ($user->programmingLanguages as $language)
                            <li  class="list-group-item border-0">{{$language->language}}</li>
                            @endforeach
                        </ul>
                    @endif
                    @if(empty($user->sponsors))
                        <ul class="list-group border-0">
                            <h3>Sponsor</h3>
                            @foreach ($user->sponsors as $sponsor)
                            <li  class="list-group-item border-0">{{$sponsor->name}}</li>
                            @endforeach
                        </ul>
                    @endif
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
