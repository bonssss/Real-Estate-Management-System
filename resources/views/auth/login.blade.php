@extends('layouts.app')

@section('content')
    <style>
        /* Custom CSS for the login page */

        /* Background image styling */
        .login-page .inner-page-cover.overlay {
            background-size: cover;
            background-position: center;
            padding: 100px 0; /* Adjust padding as needed */
        }

        /* Form container styling */
        .login-page .site-section {
            background-color: #f8f9fa; /* Background color for the form section */
            padding: 50px 0; /* Adjust padding as needed */
        }

        .login-page .container {
            max-width: 600px; /* Adjust container width as needed */
        }

        /* Form styling */
        .login-page .form-contact-agent {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); /* Add a subtle box shadow */
        }

        /* Input field styling */
        .login-page .form-group {
            margin-bottom: 20px; /* Adjust spacing between form elements */
        }

        .login-page .form-control {
            border-radius: 5px;
            border: 1px solid #ced4da; /* Add a border color */
            padding: 10px;
        }

        /* Button styling */
        .login-page .btn-primary {
            background-color: #007bff; /* Primary button color */
            border-color: #007bff; /* Border color */
            padding: 10px 20px; /* Adjust padding as needed */
            border-radius: 5px;
            color: #ffffff; /* Text color */
            transition: all 0.3s ease; /* Add transition for smooth hover effect */
        }

        .login-page .btn-primary:hover {
            background-color: #0056b3; /* Darker color on hover */
            border-color: #0056b3; /* Darker border color on hover */
        }

        /* Text color and alignment for form labels */
        .login-page label {
            color: #333333;
        }

        .login-page .text-black {
            color: #333333;
            text-align: center; /* Center align the text */
        }
    </style>

    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url({{asset('assets/images/hero_bg_2.jpg')}});" data-aos="fade">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-md-10">
                    <h1 class="mb-2">Log In</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section login-page">
        <div class="container">
            <div class="row">
                <div class="col-md-12" data-aos="fade-up" data-aos-delay="100">
                    <h3 class="h4 text-black widget-title mb-3">Login</h3>
                    <form action="{{ route('login') }}" method="POST" class="form-contact-agent">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" id="phone" class="btn btn-primary" value="Login">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
