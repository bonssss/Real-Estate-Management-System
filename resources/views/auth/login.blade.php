@extends('layouts.app')

@section('content')
                <div class="site-blocks-cover inner-page-cover overlay" style=" margin-top:-25px; background-image: url({{asset('assets/images/hero_bg_2.jpg')}});" data-aos="fade">
                    <div class="container">
                    <div class="row align-items-center justify-content-center text-center">
                        <div class="col-md-10">
                        <h1 class="mb-2">Log In</h1>
                        </div>
                    </div>
                    </div>
                </div>


                <div class="site-section">
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
                              @enderror                          </div>
                          <div class="form-group">
                              <input type="submit" id="phone" name="submit" class="btn btn-primary" value="Login">
                          </div>
                          </form>
                        </div>
                       
                      </div>
                    </div>
                  </div>



                {{-- <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div> --}}
            
@endsection
