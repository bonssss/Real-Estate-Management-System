@extends('layouts.agent')

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

                    @if (\Session::has('images'))
                        <div class="alert alert-success">
                            <p>{!! \Session::get('images') !!}</p>
                        </div>
                    @endif

                    @if (\Session::has('delete'))
                        <div class="alert alert-success">
                            <p>{!! \Session::get('delete') !!}</p>
                        </div>
                    @endif
                    <h5 class="card-title mb-4 d-inline">Properties</h5>
                    <a href="{{ route('agent.properties.create') }}"
                        class="btn btn-primary mb-4 text-center float-right ">Create Properties</a>
                    <a href="{{ route('admin.images.create') }}"
                        class="btn btn-primary mb-4 text-center float-right mr-5">Create Gallery</a>

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

                            @foreach ($allproperty as $allprops)
                                <tr>
                                    <th scope="row">{{ $allprops->id }}</th>
                                    <td>{{ $allprops->title }}</td>
                                    <td>{{ $allprops->price }}</td>
                                    <td>{{ $allprops->home_type }}</td>
                                    <td>{{ $allprops->type }}</td>
                                    <td>{{ $allprops->city }}</td>

                                    <td>
                                        {{-- <button onclick="confirmDelete({{ $allprops->id }})" class="btn btn-danger text-center">Delete</button> --}}

                                        <a href="{{ route('admin.properties.delete',$allprops->id) }}" class="btn btn-danger text-center" onclick="return confirmDelete();">Delete</a>
                                    </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    function confirmDelete() {
        // Show a confirmation dialog using JavaScript's native `confirm()` function
        if (confirm('Are you sure you want to delete this property?')) {
            // If user confirms, proceed with the deletion by following the link
            return true; // Allow the link to proceed
        } else {
            // If user cancels, prevent the deletion action
            return false; // Cancel the link action
        }
    }
</script>
