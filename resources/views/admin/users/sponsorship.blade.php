@extends('layouts.admin')

@section('content')
    <div class="container my-3">
        <div class="row g-4">
            <div class="col">
                <div class="d-flex flex-column">
                    <!--TIPI DI SPONSORIZZAZIONI-->
                    <div class="">
                        <h1>Sponsorizzazioni</h1>
                        <h3>Scegli il tipo di sponsorizzazione che vuoi acquistare</h3>
                        <br>
                        {{-- FORM --}}
                        <form action="{{ route('admin.payments.form', $user) }}" method="GET">
                            @csrf

                            <div class="plan-choser">
                                @foreach ($sponsorships as $sponsorship)
                                    <div class="plan-option">
                                        <input value="{{ $sponsorship->id}}" id="{{ $sponsorship->id }}" name="sponsorships[]" type="radio">
                                        <label for="{{ $sponsorship->id }}">
                                            <div class="plan-info">
                                                <span class="plan-cost">{{ $sponsorship->price}} &euro;</span>
                                                <span class="plan-name">{{ $sponsorship->name }}</span>
                                                <span class="plan-name">{{ $sponsorship->time_sponsor }} H</span>
                                            </div>
                                            <div class="w-75">
                                                descrizione Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, vero dolor pariatur reprehenderit nostrum eos porro consequuntur vitae nemo doloremque consectetur aliquid eaque natus tempora molestias. Doloremque quis blanditiis ea.
                                            </div>
                                        </label>
                                    </div>
                                @endforeach
                                    <button type="submit" class="choose-btn"> 
                                        Start 
                                    </button>
                                </div>
                        </form>
                    </div>
                    <!--SEZIONE DI PAGAMENTO-->
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
                window.location.href = "/admin/users/" + currentUserId + "/sponsorship";
                alert("Non sei autorizzato ad accedere a questa pagina.");
            }
        };
    </script>
@endsection
