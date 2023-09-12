@extends('layouts.admin')

@section('content')
<div class="container my-3 gradient-background-blue rounded-3 p-4 ">
    <div class="row text-center text-white m-3">
        {{-- Titolo pagina --}}
        <div class="col">
            <h1 class="text-white orangeBg rounded-5 p-2">
               Le mie statistiche
            </h1>
        </div>
    </div>
    {{-- Grafico messaggi / recensione--}}
    <div class="row  mb-5 ">
        
        <div class="col-auto col-lg-4 m-auto">
         
            <canvas id="messageChart"></canvas>
            
        </div>
        
        <div class="col-auto col-lg-4 m-auto">
           
            <canvas id="reviewChart"></canvas>

        </div>
    </div>

    {{-- Grafico per valutazione --}}
    <div class="row">
        
        <div class="col-auto col-md-5 m-auto">

           <canvas id="valutationChart"></canvas>
        
        </div>
        
    </div>
</div>

<script>

    var currentUserId = {{ Auth::user()->id }};

    window.onload = function() {
        var pathSegments = window.location.pathname.split("/");
        var userIdFromUrl = parseInt(pathSegments[pathSegments.length - 2]);

        if (!isNaN(userIdFromUrl) && userIdFromUrl !== currentUserId) {
                window.location.href = "/admin/users/" + currentUserId + "/stats";
                alert("Non sei autorizzato ad accedere a questa pagina.");
            }
        };

</script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    //trascrivo in JSON i dati che mi arrivano dal controller
    const messageValues = @json($messageGroup);
    const reviewValues = @json($reviewGroup);
    const valutationValues = @json($valutationGroup);
    //spiego alla libreria come voglio utilizzare i dati
    const dataMessageGraph = {
                labels: messageValues.map(item => item.tempo),
                datasets: [{
                    label: 'Messaggi al mese',
                    data: messageValues.map(item => item.numero),
                    borderColor: '#003399',
                    backgroundColor: ' rgba(4, 72, 119, 0.8)'
                }]
            };

    const dataReviewGraph = {
            labels: reviewValues.map(item => item.tempo),
            datasets: [{
                label: 'Recensioni al mese',
                data: reviewValues.map(item => item.numero),
                borderColor: '#FCB457',
                backgroundColor: ' rgba(254, 167, 93, 0.8)'
            }]
        };
    const dataValutationGraph = {
            labels: valutationValues.map(item => item.tempo),
            datasets: [{
                label: 'Media valutazioni mensili',
                data: valutationValues.map(item => Math.round(item.media)),
                borderColor: '#F87865',
                backgroundColor: '#F87865'
            }]
        };
    //creo la configurazione del grafico (dati da utilizzare e opzioni)
    const configMessageGraph = {
            type: 'bar',
            data: dataMessageGraph,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    }
                }
            }
        };
    const configReviewGraph = {
            type: 'bar',
            data: dataReviewGraph,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    }
                }
            }
        };

    var yLabels = {
        1 : 'Insufficente', 2 : 'Sufficente', 3 : 'Buono', 4 : 'Distinto', 5 : 'Ottimo'
    }
    const configValutationGraph = {
            type: 'line',
            data: dataValutationGraph,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    }
                },
                scales: {
                    y: {
                        ticks: {
                            callback: function(value, index, ticks) {
                                return yLabels[value];
                            }
                        }
                    }
                }
            },
        };
    //inizializzo un nuovo grafico dicendo a quale elemento attaccarsi e con quali configurazioni
    new Chart(
        document.getElementById('messageChart'),
        configMessageGraph
    );
    new Chart(
        document.getElementById('reviewChart'),
        configReviewGraph
    );
    new Chart(
        document.getElementById('valutationChart'),
        configValutationGraph
    );
</script>
@endsection
