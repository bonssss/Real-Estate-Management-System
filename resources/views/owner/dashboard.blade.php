@extends('layouts.owner')

@section('content')
<style>
    /* Dashboard styles go here */
    .container {
        padding-top: 20px;
    }

    .card {
        margin-bottom: 20px;
    }

    .card-header {
        background-color: #007bff;
        color: #fff;
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
                    <p>Total Properties: <span class="badge badge-primary">67</span></p>
                    <p>Rented: <span class="badge badge-success">6</span></p>
                    <p>Vacant: <span class="badge badge-danger">4</span></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Tenants</div>
                <div class="card-body">
                    <p>Total Tenants: <span class="badge badge-primary">4</span></p>
                    <p>Active: <span class="badge badge-success">6</span></p>
                    <p>Inactive: <span class="badge badge-danger">2</span></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Payments</div>
                <div class="card-body">
                    <p>Total Payments: <span class="badge badge-primary">$5000</span></p>
                    <p>Outstanding: <span class="badge badge-danger">$1000</span></p>
                    <p>Received: <span class="badge badge-success">$4000</span></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
