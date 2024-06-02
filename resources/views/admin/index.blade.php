@extends('layouts.admin')

@section('content')
    <style>
        /* CSS for hover effects and transitions */
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: bisque;
        }

        .card {
            transition: transform 0.3s, box-shadow 0.3s; /* Add transition */
            border-radius: 5px;
        }

        .card:hover .card-title {
            color: #007bff; /* Change color on hover */
        }

        .card:hover .card-text {
            color: #6c757d; /* Change color on hover */
        }

        /* Background colors for cards */
        .card-bg-1 { background-color: #f8bbd0; }
        .card-bg-2 { background-color: #90caf9; }
        .card-bg-3 { background-color: #c8e6c9; }
        .card-bg-4 { background-color: #ffe082; }
        .card-bg-5 { background-color: #b0bec5; }
    </style>

    <div class="row">
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <p>{!! \Session::get('success') !!}</p>
            </div>
        @endif
        <div class="col-md-4 mb-4">
            <div class="card shadow rounded-lg card-bg-1">
                <div class="card-body">
                    <h5 class="card-title text-primary mb-4">
                        <span data-feather="home"></span> Properties
                    </h5>
                    <p class="card-text"><strong>Number of properties:</strong> {{ $propertyCount }}</p>
                    <p class="card-text"><strong>Sold properties:</strong> {{ $soldCount }}</p>
                    <p class="card-text"><strong>Pending properties:</strong> {{ $processingCount }}</p>
                    <p class="card-text"><strong>Rented properties:</strong> {{ $rentedCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card shadow rounded-lg card-bg-2">
                <div class="card-body">
                    <h5 class="card-title text-primary mb-4">
                        <span data-feather="home"></span> Home Types
                    </h5>
                    <p class="card-text"><strong>Number of home types:</strong> {{ $homeCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card shadow rounded-lg card-bg-3">
                <div class="card-body">
                    <h5 class="card-title text-primary mb-4">
                        <span data-feather="users"></span> Agents
                    </h5>
                    <p class="card-text"><strong>Number of agents:</strong> {{ $agentCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card shadow rounded-lg card-bg-4">
                <div class="card-body">
                    <h5 class="card-title text-primary mb-4">
                        <span data-feather="shopping-cart"></span> Buy
                    </h5>
                    <p class="card-text"><strong>Buy Property:</strong> {{ $buyCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card shadow rounded-lg card-bg-5">
                <div class="card-body">
                    <h5 class="card-title text-primary mb-4">
                        <span data-feather="file"></span> Requests
                    </h5>
                    <p class="card-text"><strong>Total requests:</strong> {{ $requestCount }}</p>
                </div>
            </div>
        </div>

        <!-- Chart.js canvas elements -->
        <div class="col-md-6 mb-4">
            <div class="card bg-light shadow rounded-lg">
                <div class="card-body">
                    <h5 class="card-title text-primary mb-4">Property Status Bar Chart</h5>
                    <canvas id="propertyStatusBarChart" width="400" height="200"></canvas>
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

