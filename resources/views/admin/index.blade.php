@extends('layouts.admin')

@section('content')
    <div class="row">
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <p>{!! \Session::get('success') !!}</p>
            </div>
        @endif
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">Properties</h5>
                    <p class="card-text">Number of properties: {{ $propertyCount }}</p>
                    <p class="card-text">Sold properties: {{ $soldCount }}</p>
                    <p class="card-text">Pending properties: {{ $processingCount }}</p>
                    <p class="card-text">Rented properties: {{ $rentedCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">Home Types</h5>
                    <p class="card-text">Number of home types: {{ $homeCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">Agents</h5>
                    <p class="card-text">Number of agents: {{ $agentCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">Buy</h5>
                    <p class="card-text">Buy Property: {{ $buyCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">Requests</h5>
                    <p class="card-text">Total requests: {{ $requestCount }}</p>
                </div>
            </div>
        </div>

        <!-- Chart.js canvas elements -->
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">Property Status Bar Chart</h5>
                    <canvas id="propertyStatusBarChart" width="400" height="200"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">Property Status Pie Chart</h5>
                    <canvas id="propertyStatusPieChart" width="400" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Script to render the charts -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Data for the charts
            const propertyStatusData = {
                labels: ['Processing', 'Sold', 'Rented', 'Buy', 'Rent'],
                datasets: [{
                    label: 'Property Count',
                    data: [{{ $processingCount }}, {{ $soldCount }}, {{ $rentedCount }}, {{ $buyCount }}, {{ $rentCount }}],
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
