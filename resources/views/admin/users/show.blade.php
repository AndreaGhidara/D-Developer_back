@extends('layouts.admin')

@section('content')
<div class="container my-3">

    <div class="row g-4 align-items-center justify-content-between">
        <div class="col-8">
            <a class="btn btn-secondary" href="{{ route("admin.users.edit", $user) }}">
                <i class="fa fa-pencil" aria-hidden="true"></i> Modifica il tuo profilo
            </a>
        </div>

        <!--NEL CASO VOLESSIMO METTERE LA CANCELLAZIONE DEL PROFILO??? MANCA PERO' CONTROLLER ECC-->
        {{-- <div class="col-3 d-flex justify-content-end">
            <form action="{{ route('admin.users.destroy', $user) }}" method="delete">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">
                    <i class="fa fa-trash" aria-hidden="true"></i> Cancella profilo
                </button>
            </form>
        </div> --}}

    </div>
    <br>
    <div class="row g-4">
        <div class="col">
            <div>
                <div class="card p-2">
                    <h1>{{$user->name}}</h1>
                    <h1>{{$user->surname}}</h1>
                    <p>{{ $user->email}}</p>
                    <p>{{ $user->date_of_birth}}</p>
                    <p>{{ $user->address}}</p>
                    <img width="400px" height="400px" src="{{asset('storage/' . $user->img_path)}}">
                    <img width="400px" height="400px" src="{{asset('storage/' . $user->bg_dev)}}">
                    <a href="{{ $user->github_link}}"></a>
                    <a href="{{ $user->linkedin_link}}"></a>
                    <p>{{ $user->bio}}</p>
                    <p>{{ $user->vat_number}}</p>
                    <a href="{{asset('storage/' . $user->cv)}}" download="cv">Scarica il mio CV</a>
                    <p>{{ $user->phone_number}}</p>
                    <p>{{ $user->soft_skill}}</p>
                    <?php if($user->languages != null ){ ?>
                        <ul>
                            @foreach ($user->languages as $language)
                            <li>{{$language->name}}</li>
                            @endforeach
                        </ul>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
