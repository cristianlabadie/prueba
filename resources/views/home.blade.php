@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">Dashboard</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                @if(Auth::user()->isAdmin())
                    @if($polls->count() > 0)
                    <div class="alert alert-info" role="alert">
                        <ul>
                            <li>Notas entre 1 y 10</li>
                            <li>Numero de encuesta realizadas hasta el momento: {{ $polls->count() }}</li>
                            <li>La nota promedio de las encuestas es: {{ $polls->pluck('score')->avg() }}</li>
                        </ul>
                    </div>
                    <div>
                        <canvas id="myChart" width="400" height="400"></canvas>
                    </div>
                    @else
                        <div class="alert alert-info" role="alert">
                            Aún no se han registrado respuestas a la encuesta de Rateinc.
                        </div>
                    @endif
                @endif
            </div>
        </div>
    </div>
</div>
@section('js')
<script>
var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Nota mínima", 'Nota máxima', 'Promedio de las encuestas'],
        datasets: [{
            label: {{ $polls->count() }} + ' respuestas',
            data: [{{ $polls->pluck('score')->min() }},
            {{ $polls->pluck('score')->max() }},
            {{ $polls->pluck('score')->avg() }}],

            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>
@endsection
@endsection
