@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">Properties</h5>
                    <p class="card-text">Number of properties: {{ $propertyCount }}</p>
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
        </div> <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">Requests</h5>
                    <p class="card-text">total requests: {{ $requestCount }}</p>
                </div>
            </div>
        </div>

    </div>
@endsection
