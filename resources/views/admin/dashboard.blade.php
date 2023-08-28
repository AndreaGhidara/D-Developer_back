@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center py-3">
        <div class="col-md-8 ">
            <div class="card bg_green text-light text-center">
                <div class="card-header border border-0">
                    <h2>REGISTRAZIONE AVVENUTA CON SUCCESSO!</h2>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <h6>BENVENUTO! GRAZIE PER ESSERTI REGISTRATO NEL NOSTRO SITO.</h6>
                    <br>
                    <p>DAI SUBITO UN OCCHIO AL TUO PROFILO E APPORTA ALCUNE MODIFICHE!!</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
