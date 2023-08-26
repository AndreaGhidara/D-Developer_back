@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center ">
        <div class="col-md-8 ">
            <div class="card bg_gradiant text-light">
                <div class="card-header ">
                    <h1>REGISTRAZIONE AVVENUTA CON SUCCESSO!</h1>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <h4>BENVENUTO! GRAZIE PER ESSERTI REGISTRATO NEL NOSTRO SITO.</h4>
                    <br>
                   DAI SUBITO UN OCCHIO AL TUO PROFILO E APPORTA ALCUNE MODIFICHE!!
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection