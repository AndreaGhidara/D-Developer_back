@extends('layouts.admin')

@section('content')
<div class="container my-3 gradient-background-blue rounded-3 p-2">
    <div style="width: 80%; margin: auto;">
        <canvas id="messageChart"></canvas>
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
    //spiego alla libreria come voglio utilizzare i dati
    const dataMessageGraph = {
                labels: messageValues.map(item => item.tempo),
                datasets: [{
                    label: 'Messaggi al mese',
                    data: messageValues.map(item => item.numero),
                    borderColor: '#FF66CC',
                    backgroundColor: '#FF66CC'
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
    //inizializzo un nuovo grafico dicendo a quale elemento attaccarsi e con quali configurazioni
    new Chart(
        document.getElementById('messageChart'),
        configMessageGraph
    );
</script>
@endsection
