@extends('layouts.owner')

@section('content')
<style>
    /* Dashboard styles go here */
    .container {
        padding-top: 20px;
    }

    .card {
        margin-bottom: 20px;
        background-color: #FEAE6F;

    }

    .card-header {
        background-color: #FEAE6F;
        color: #0e0d0d;
        font-size: 1.5rem;
        font-weight: bold;
        text-align: center;
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
        padding: 10px 0;
    }

    .card-body {
        padding: 20px;
    }

    .chart-container {
        margin-top: 20px;
        text-align: center;
    }

    canvas {
        max-width: 100%;
        height: auto;
    }
</style>

<div class="container">
    @if (\Session::has('success'))
    <div class="alert alert-success">
        <p>{!! \Session::get('success') !!}</p>
    </div>
    @endif
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Properties</div>
                <div class="card-body">
                    <p>Total Properties: <span class="badge badge-primary">{{$propertyCount}}</span></p>
                    <p>Rented: <span class="badge badge-success">{{$rentedCount}}</span></p>
                    <p>Sold: <span class="badge badge-danger">{{$soldCount}}</span></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Types of Props</div>
                <div class="card-body">
                    <p>Total Props: <span class="badge badge-primary">{{$propertyCount}}</span></p>
                    <p> For Sell: <span class="badge badge-success">{{$buyCount}}</span></p>
                    <p>For Rent: <span class="badge badge-danger">{{$rentCount}}</span></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Home Types</div>
                <div class="card-body">
                    <p>Total Home type <span class="badge badge-primary">{{$homeCount}}</span></p>
                    <p>Residential: <span class="badge badge-danger">{{$residential}}</span></p>
                    <p>Apartment: <span class="badge badge-success">{{$apartment}}</span></p>
                    <p>mixed use: <span class="badge badge-success">{{$mixeduse}}</span></p>

                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header"> Registered Customers</div>
                <div class="card-body">
                    <div class="circle-badge">
                        <span class="badge badge-primary">{{$customers}}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header"> Our Agents</div>
                <div class="card-body">
                    <div class="circle-badge">
                        <span class="badge badge-primary">{{$agent}}</span>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <hr>
    <div class="row chart-container">
        <div class="col-md-4">
            <canvas id="propertiesChart" width="400" height="400"></canvas>
        </div>
        <div class="col-md-4">
            <canvas id="typesOfPropsChart" width="400" height="400"></canvas>
        </div>
        <div class="col-md-4">
            <canvas id="homeTypesChart" width="400" height="400"></canvas>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Data from your controller
    var propertyData = {
        labels: ['Total Properties', 'Rented', 'Sold'],
        datasets: [{
            label: 'Properties',
            data: [{{$propertyCount}}, {{$rentedCount}}, {{$soldCount}}],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)'
            ],
            borderWidth: 1
        }]
    };

    var typesOfPropsData = {
        labels: ['For Sell', 'For Rent'],
        datasets: [{
            label: 'Types of Props',
            data: [{{$buyCount}}, {{$rentCount}}],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)'
            ],
            borderWidth: 1
        }]
    };

    var homeTypesData = {
        labels: ['Residential', 'Apartment', 'Mixed Use'],
        datasets: [{
            label: 'Home Types',
            data: [{{$residential}}, {{$apartment}}, {{$mixeduse}}],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)'
            ],
            borderWidth: 1
        }]
    };

    var propertiesChart = new Chart(document.getElementById('propertiesChart').getContext('2d'), {
        type: 'bar',
        data: propertyData,
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    var typesOfPropsChart = new Chart(document.getElementById('typesOfPropsChart').getContext('2d'), {
        type: 'pie',
        data: typesOfPropsData,
        options: {
            responsive: true
        }
    });

    var homeTypesChart = new Chart(document.getElementById('homeTypesChart').getContext('2d'), {
        type: 'bar',
        data: homeTypesData,
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

@endsection
