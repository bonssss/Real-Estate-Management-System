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

                    @if (\Session::has('delete'))
                    <div class="alert alert-success">
                        <p>{!! \Session::get('delete') !!}</p>
                    </div>
                @endif


                    <h5 class="card-title mb-4 d-inline">Agents</h5>
                    <a href="{{ route('admin.agents.create') }}"
                        class="btn btn-primary mb-4 text-center float-right ">Create Agent</a>
                    {{-- <a href="{{ route('admin.images.create') }}"
                        class="btn btn-primary mb-4 text-center float-right mr-5">Create Gallery</a> --}}

                    <table class="table mt-4">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">name</th>
                                <th scope="col">email</th>
                                <th scope="col">Phone number</th>
                                <th scope="col">Address</th>

                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($allagents as $allagent)
                                <tr>
                                    <th scope="row">{{ $allagent->id }}</th>
                                    <td>{{ $allagent->name }}</td>
                                    <td>{{ $allagent->email }}</td>
                                    <td>{{ $allagent->phone_number }}</td>
                                    <td>{{ $allagent->address }}</td>

                                    <td>
                                        {{-- <button onclick="confirmDelete({{ $allprops->id }})" class="btn btn-danger text-center">Delete</button> --}}

                                        <a href="{{ route('admin.agent.delete',$allagent->id) }}" class="btn btn-danger text-center" onclick="return confirmDelete();">Delete</a>
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
        if (confirm('Are you sure you want to delete this Agent?')) {
            // If user confirms, proceed with the deletion by following the link
            return true; // Allow the link to proceed
        } else {
            // If user cancels, prevent the deletion action
            return false; // Cancel the link action
        }
    }
</script>
