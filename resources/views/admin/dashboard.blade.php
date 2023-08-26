@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>REGISTRAZIONE AVVENUTA CON SUCCESSO!</h1>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <h4>BENVENUTO, GRAZIE PER ESERTI RESGISTRATO NEL NOSTRO SITO.</h4>
                    <p>ti trovi nella tua pagina personale per monitorare e tenere sotto controllo tutto ciò che riguarda il tuo profilo alla tua sinistra avrai la possibilità di apportare alcune modifiche metti quante più nozioni possibili per avere la possibilità di farti notare il più possibile inoltre avrai anche la possibilità di essere sponsorizzato e far si che le tue visualizzazioni aumentino... <br>
                    MA ORA DAI SUBITO UN'OCCHIO AL TUO PROFILO E APPORTA ALCUNE MODIFICHE!!
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection