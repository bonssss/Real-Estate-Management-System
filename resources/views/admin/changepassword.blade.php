@extends('layouts.admin')

@section('content')
<div class="password-change-container">
    <form method="POST" action="{{ route('changeowner.password.post') }}" class="password-change-form">
        @csrf

        <h2>Change Password</h2>

        <div class="form-group">
            <input type="password" name="current_password" placeholder="Current Password" class="form-control @error('current_password') is-invalid @enderror">
            @error('current_password')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <input type="password" name="new_password" placeholder="New Password" class="form-control @error('new_password') is-invalid @enderror">
            @error('new_password')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <input type="password" name="new_password_confirmation" placeholder="Confirm New Password" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Change Password</button>
    </form>
</div>
@endsection
