@extends('layouts.agent')

@section('content')


    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    @if (\Session::has('success'))
                        <div class="alert alert-success">
                            <p>{!! \Session::get('success')!!}</p>
                        </div>
                    @endif

                    @if (\Session::has('success_gallery'))
                        <div class="alert alert-success">
                            <p>{!! \Session::get('success_gallery')!!}</p>
                        </div>
                    @endif

                    @if (\Session::has('delete'))
                        <div class="alert alert-success">
                            <p>{!! \Session::get('delete')!!}</p>
                        </div>
                    @endif
                <h5 class="card-title mb-4 d-inline">Properties</h5>
                <a href="{{ route('property.create') }}" class="btn btn-primary mb-4 text-center float-right ">Create Properties</a>
                <a href="{{ route('gallery.create') }}" class="btn btn-primary mb-4 text-center float-right mr-5">Create Gallery</a>

                <table class="table mt-4">
                    <thead>
                    <tr>
                        <th scope="col">Number</th>
                        <th scope="col">name</th>
                        <th scope="col">price</th>
                        <th scope="col">home type</th>
                        {{-- <th scope="col">delete</th> --}}
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($property as $prop)
                            <tr>
                                <th scope="row">{{ $prop->id }}</th>
                                <td>{{ $prop->title }}</td>
                                <td>{{ $prop->price }}</td>
                                <td>{{ $prop->home_type }}</td>
                                {{-- <td><a href="{{ route('property.delete', $prop->id) }}" class="btn btn-danger  text-center ">delete</a></td> --}}
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>

@endsection
