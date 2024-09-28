
<form method="POST" action="{{ route('change.password.post') }}" class="password-change-form">
    @csrf

    <input type="password" name="current_password" placeholder="Current Password" class="form-control">
    @error('current_password')
        <div class="error-message">{{ $message }}</div>
    @enderror

    <input type="password" name="new_password" placeholder="New Password" class="form-control">
    @error('new_password')
        <div class="error-message">{{ $message }}</div>
    @enderror

    <input type="password" name="new_password_confirmation" placeholder="Confirm New Password" class="form-control">

    <button type="submit" class="btn btn-primary">Change Password</button>
</form>
