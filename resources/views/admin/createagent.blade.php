{{-- @extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Create New Agent</h1>
        <form method="POST" action="{{ route('admin.create.agent') }}">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Create Agent</button>
        </form>
    </div>
@endsection --}}


@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Create New Agent</h1>
        <form method="POST" action="{{ route('admin.save.agent') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address">
            </div>
            <div class="form-group">
                <label for="birthdate">Birthdate</label>
                <input type="date" class="form-control" id="birthdate" name="birth_date">
            </div>
            <div class="form-group">
                <label for="birthdate">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone_number">
            </div>
            <div class="form-group">
                <label for="image">Profile Image</label>
                <input type="file" class="form-control-file" id="image" name="image">
            </div>
            <button type="submit"  name="submit" class="btn btn-primary">Create Agent</button>
        </form>
    </div>
@endsection

