@extends('layouts.alayout')
@section('content')
<br><br><br><br>
<div class="container">
    <div class="row justify-content-center">
   
        <div class="col-md-8">
        <h3>Welcome {{ Auth::User()->name}}</h3>
            <div class="card">
                <div class="card-body">
                    <h1>{{ $chart->options['chart_title'] }}</h1>
                    {!! $chart->renderHtml() !!}
                    <hr>
                    <h1>{{ $chart1->options['chart_title'] }}</h1>
                    {!! $chart1->renderHtml() !!}
                </div>
            </div>
        </div>
    </div>
</div>

{!! $chart->renderChartJsLibrary() !!}
{!! $chart->renderJs() !!}
{!! $chart1->renderChartJsLibrary() !!}
{!! $chart1->renderJs() !!}

@endsection
 