@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          @if (\Session::has('success'))
                <div class="alert alert-success">
                    <p>{!! \Session::get('success') !!}</p>
                </div>
                @endif
          <h5 class="card-title mb-4 d-inline">Properties</h5>
          <a href="{{route('admin.properties.create')}}" class="btn btn-primary mb-4 text-center float-right ">Create Properties</a>
          <a href="create-Gallery.html" class="btn btn-primary mb-4 text-center float-right mr-5">Create Gallery</a>

          <table class="table mt-4">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">price</th>
                <th scope="col">home type</th>
                <th scope="col">Type</th>
                <th scope="col">City</th>
                <th scope="col">delete</th>
              </tr>
            </thead>
            <tbody>

                @foreach ($allproperty as $allprops )


              <tr>
                <th scope="row">{{$allprops->id}}</th>
                <td>{{$allprops->title}}</td>
                <td>{{$allprops->price}}</td>
                <td>{{$allprops->home_type}}</td>
                <td>{{$allprops->type}}</td>
                <td>{{$allprops->city}}</td>

                 <td><a href="delete-posts.html" class="btn btn-danger  text-center ">delete</a></td>
              </tr>
              @endforeach

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
