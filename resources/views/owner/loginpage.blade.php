@extends('layouts.owner')

@section('content')
{{-- <style>
 body {
    background-image: url('path/to/your/background-image.jpg');
    background-color: #f8f9fa; /* Light gray background color */
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 0;
    font-family: 'Arial', sans-serif;
}

.container {
    background: rgba(255, 255, 255, 0.9);
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 20px;
    max-width: 500px;
    width: 100%;
}

.card-header {
    background-color: #007bff;
    color: #fff;
    font-size: 1.5rem;
    font-weight: bold;
    text-align: center;
    border-top-left-radius: 8px;
    border-top-right-radius: 8px;
    padding: 15px 0; /* Increased padding */
}

.card-body {
    padding: 20px;
}

.form-group {
    margin-bottom: 1.5rem; /* Increased margin */
}

.form-control {
    border-radius: 0.25rem;
    border: 1px solid #ced4da;
    padding: 0.75rem; /* Increased padding */
    font-size: 1rem; /* Adjusted font size */
}

.form-control:focus {
    border-color: #007bff;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
}

.invalid-feedback {
    display: block;
    color: #dc3545;
    margin-top: 0.25rem; /* Adjusted margin */
}

.btn-primary {
    background-color: #007bff;
    border: none;
    border-radius: 0.25rem;
    padding: 10px 20px;
    font-size: 1rem;
    transition: background-color 0.3s ease;
    width: 100%; /* Make button full width */
}

.btn-primary:hover {
    background-color: #0056b3;
}

.btn-link {
    color: #007bff;
    text-decoration: none;
}

.btn-link:hover {
    text-decoration: underline;
}

.form-check-input {
    margin-top: 0.3rem;
}

.form-check-label {
    margin-left: 1.25rem;
}

.alert {
    margin-top: 20px;
}

</style> --}}
<div class="container">
    @if(session('toast_error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('toast_error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('save.owner.login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>


                                </div>
                            </div>
                        </div> --}}

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" name="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                {{-- @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif --}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
@push('scripts')
@if(session('toast_success'))
    <script>
        toastr.success('{{ session('toast_success') }}', '', { timeOut: 3000 });
    </script>
@endif
@if(session('toast_error'))
    <script>
        toastr.error('{{ session('toast_error') }}', '', { timeOut: 3000 });
    </script>
@endif
@endpush
