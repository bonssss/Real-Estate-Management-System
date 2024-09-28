


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

                @if (\Session::has('update'))
                <div class="alert alert-success">
                    <p>{!! \Session::get('update') !!}</p>
                </div>
                @endif

                @if (\Session::has('delete'))
                <div class="alert alert-success">
                    <p>{!! \Session::get('delete') !!}</p>
                </div>
                @endif

                <h5 class="card-title mb-4 d-inline">Hometypes</h5>
                <a href="{{ route('admin.hometypes.create') }}" class="btn btn-primary mb-4 text-center float-right">Create Hometypes</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Update</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allproperytypes as $hometype)
                        <tr>
                            <th scope="row">{{ $hometype->id }}</th>
                            <td>{{ $hometype->propstype }}</td>
                            <td><a href="{{ route('admin.hometypes.update', $hometype->id) }}" class="btn btn-warning text-white text-center">Update</a></td>
                            <td>
                                <!-- Delete Confirmation using JavaScript -->
                                <button onclick="confirmDelete({{ $hometype->id }})" class="btn btn-danger text-center">Delete</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript for Delete Confirmation -->
<script>
    function confirmDelete(id) {
        if (confirm("Are you sure you want to delete this hometype?")) {
            // Redirect to the delete route upon confirmation
            window.location.href = "{{ url('admin/hometypes/delete') }}/" + id;
        }
    }
</script>

@endsection
