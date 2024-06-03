@extends('layouts.agent')

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card bg-primary text-white">
            <div class="card-body">
                <h5 class="card-title"><i data-feather="home"></i> Properties</h5>
                <p class="card-text">Number of Properties: {{$propertyCount}}</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card bg-success text-white">
            <div class="card-body">
                <h5 class="card-title"><i data-feather="box"></i> Home Types</h5>
                <p class="card-text">Number of Home Types: {{$homeCount}}</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card bg-info text-white">
            <div class="card-body">
                <h5 class="card-title"><i data-feather="clipboard"></i> Property for Rent</h5>
                <p class="card-text">For Rent: {{$rentCount}}</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card bg-warning text-dark">
            <div class="card-body">
                <h5 class="card-title"><i data-feather="dollar-sign"></i> Property for Sell</h5>
                <p class="card-text">For Sell: {{$buyCount}}</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card bg-danger text-white">
            <div class="card-body">
                <h5 class="card-title"><i data-feather="message-square"></i> Requests</h5>
                <p class="card-text">Number of Requests: </p>
            </div>
        </div>
    </div>
</div>
<!-- Chart.js canvas elements -->
<div class="row justify-content-center">
    <!-- Chart.js canvas elements -->
    <div class="col-md-6 mb-4">
        <div class="card bg-light shadow rounded-lg">
            <div class="card-body">
                <h5 class="card-title text-primary mb-4">Property Status Bar Chart</h5>
                <canvas id="propertyStatusBarChart" width="600" height="300"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="card bg-light shadow rounded-lg">
            <div class="card-body">
                <h5 class="card-title text-primary mb-4">Property Status Pie Chart</h5>
                <canvas id="propertyStatusPieChart" width="400" height="200"></canvas>
            </div>
        </div>
    </div>
</div>
<!-- Chart.js library -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Feather Icons script to render icons -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    feather.replace();
});
</script>

<!-- Script to render the charts -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Data for the charts
    const propertyStatusData = {
        labels: ['propertyCount', 'Buy', 'Rent'],
        datasets: [{
            label: 'Property Count',
            data: [ {{$propertyCount}},{{ $buyCount }}, {{ $rentCount }}],
            backgroundColor: [
                'rgba(255, 99, 132, 0.5)',
                'rgba(54, 162, 235, 0.5)',
                'rgba(255, 206, 86, 0.5)',
                'rgba(75, 192, 192, 0.5)',
                'rgba(153, 102, 255, 0.5)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)'
            ],
            borderWidth: 1
        }]
    };

    // Render the bar chart
    const barCtx = document.getElementById('propertyStatusBarChart').getContext('2d');
    new Chart(barCtx, {
        type: 'bar',
        data: propertyStatusData,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Render the pie chart
    const pieCtx = document.getElementById('propertyStatusPieChart').getContext('2d');
    new Chart(pieCtx, {
        type: 'pie',
        data: propertyStatusData,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return tooltipItem.label + ': ' + tooltipItem.raw;
                        }
                    }
                }
            }
        }
    });
});
</script>
@endsection

