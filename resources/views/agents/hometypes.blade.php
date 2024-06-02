@extends('layouts.agent')

@section('content')
    <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
                @if(\Session::has('success'))
                    <div class="alert alert-success">
                        <p>{!! \Session::get('success') !!}</p>
                    </div>
                @endif

                @if(\Session::has('update'))
                    <div class="alert alert-success">
                        <p>{!! \Session::get('update') !!}</p>
                    </div>
                @endif

                @if(\Session::has('delete'))
                    <div class="alert alert-success">
                        <p>{!! \Session::get('delete') !!}</p>
                    </div>
                @endif
              <h5 class="card-title mb-4 d-inline">Hometypes</h5>
              <a href="{{ route('hometypes.create') }}" class="btn btn-primary mb-4 text-center float-right">Create Hometypes</a>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Number</th>
                    <th scope="col">name</th>
                    <th scope="col">update</th>
                    <th scope="col">delete</th>
                  </tr>
                </thead>
                
                <tbody>
                    @foreach ( $allHomeTypes as $PropertyTypes)
                        <tr>
                            <th scope="row">{{ $PropertyTypes->id }}</th>
                            <td>{{ $PropertyTypes->propstype }}</td>
                            <td><a  href="{{ route('hometypes.update', $PropertyTypes->id) }}" class="btn btn-warning text-white text-center ">Update</a></td>
                            <td><a href="{{ route('hometypes.delete', $PropertyTypes->id) }}" class="btn btn-danger  text-center ">Delete</a></td>
                        </tr>
                    @endforeach
                </tbody>                                                          
              </table> 
            </div>
          </div>
        </div>
      </div>
@endsection