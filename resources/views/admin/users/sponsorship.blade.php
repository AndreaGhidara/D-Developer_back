@extends('layouts.admin')

@section('content')
<div class="container my-3">
    <div class="row g-4">
        <div class="col">
            <div class="d-flex flex-column">
                <!--TIPI DI SPONSORIZZAZIONI-->
                <div class="">
                    <h1 class="text-white">Sponsorizzazioni</h1>
                    <h3 class="text-white">Scegli il tipo di sponsorizzazione che vuoi acquistare</h3>
                    <br>
                    @foreach ($sponsorships as $sponsorship)
                    <div class="form-check card m-4">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            <h2>{{$sponsorship->name}}</h2>
                            <h4>Il prezzo è di {{$sponsorship->price}} €</h4>
                            <h5>La durata della sponsorizzazione è di {{$sponsorship->time_sponsor}} ore.</h5>
                            <br>
                        </label>
                    </div>
                    @endforeach
                </div>
                <!--SEZIONE DI PAGAMENTO-->
                <div class="container p-0">
                    <div class="card px-4">
                        <p class="h8 py-3">Dettagli di pagamento</p>
                        <div class="row gx-3">
                            <div class="col-12">
                                <div class="d-flex flex-column">
                                    <p class="text mb-1">Proprietario della carta</p>
                                    <input class="form-control mb-3" type="text" placeholder="Nome e Cognome" value="">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex flex-column">
                                    <p class="text mb-1">Numero carta</p>
                                    <input class="form-control mb-3" type="text" placeholder="Inserisci il numero di carta">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex flex-column">
                                    <p class="text mb-1">Scadenza carta</p>
                                    <input class="form-control mb-3" type="text" placeholder="MM/YYYY">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex flex-column">
                                    <p class="text mb-1">CVC</p>
                                    <input class="form-control mb-3 pt-2 " type="password" placeholder="***">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="btn btn-primary mb-3">
                                    <span class="ps-3">Paga</span>
                                    <span class="fas fa-arrow-right"></span>
                                </div>
                            </div>
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
        var userIdFromUrl = parseInt(pathSegments[pathSegments.length - 2]);

        if (!isNaN(userIdFromUrl) && userIdFromUrl !== currentUserId) {
                window.location.href = "/admin/users/" + currentUserId + "/messages";
                alert("Non sei autorizzato ad accedere a questa pagina.");
            }
        };

</script>
@endsection
