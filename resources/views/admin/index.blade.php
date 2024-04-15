@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card shadow">
            <div class="card-body">
                <h5 class="card-title">Properties</h5>
                <p class="card-text">Number of properties: {{$propertyCount}}</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow">
            <div class="card-body">
                <h5 class="card-title">Home Types</h5>
                <p class="card-text">Number of home types: {{$homeCount}}</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow">
            <div class="card-body">
                <h5 class="card-title">Admins</h5>
                <p class="card-text">Number of admins: {{$adminCount}}</p>
            </div>
        </div>
    </div>

    <div class="col-md-4">
      <div class="card shadow">
          <div class="card-body">
              <h5 class="card-title">Admins</h5>
              <p class="card-text">Buy Props: {{$buyCount}}</p>
          </div>
      </div>
  </div>
</div>
@endsection
