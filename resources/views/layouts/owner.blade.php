<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Owner Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/owner/style.css') }}">
</head>

<body>
    @if (Auth::check())
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="#">Owner Dashboard</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item d-lg-none"> <!-- Hide in large screens -->
                            <a class="nav-link" href="{{ route('about') }}">About</a>
                        </li>
                        <li class="nav-item d-lg-none"> <!-- Hide in large screens -->
                            <a class="nav-link" href="{{route('view.owner.dashboard')}}">Dashboard</a>
                        </li>
                        <li class="nav-item d-lg-none"> <!-- Hide in large screens -->
                            <a class="nav-link" href="{{route('property.all.owner')}}">Properties</a>
                        </li>
                        {{-- <li class="nav-item d-lg-none"> <!-- Hide in large screens -->
                            <a class="nav-link" href="#" id="settings-link">Settings</a>
                        </li> --}}
                    </ul>
                    <ul class="navbar-nav ml-md-auto d-md-flex">
                        @auth('owner')
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::guard('owner')->user()->name }}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('owner.change.password') }}">
                                        Change Password
                                    </a>
                                    <a class="dropdown-item" href="{{ route('owner.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('owner.logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endauth
                    </ul>

                </div>
            </div>
        </nav>


        <!-- Sidebar Container -->
        <div class="sidebar-container">
            <!-- Sidebar -->
            <div class="sidebar">
                <div class="sidebar-header">
                    {{-- <button class="close-btn">
                    <i class="fas fa-times"></i>
                </button> --}}
                </div>
                <ul class="sidebar-list">
                    <li><a href="{{route('view.owner.dashboard')}}"><i class="fas fa-home"></i> Dashboard</a></li>
                    <li><a href="{{route('property.all.owner')}}"><i class="fas fa-chart-line"></i> Properties</a></li>
                    {{-- <li><a href="#" id="settings-link"><i class="fas fa-cog"></i> Settings</a>
                    </li>
                    <li><a href="#"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                    <li id="change-password-link" class="d-lg-none" style="display: none;">
                        <!-- Hide in large screens -->
                        <a href="#"><i class="fas fa-key"></i> Change Password</a>
                    </li> --}}
                </ul>
            </div>
    @endif
    <!-- Main Content -->
    <div class="main-content">
        <div class="container">
            <main class="py-4">
                @yield('content')
            </main>
            <!-- Main content goes here -->
        </div>
    </div>
    </div>


    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('assets/owner/script.js') }}"></script>

    <script>
        $(document).ready(function() {
            // Handle settings link click to toggle change password link visibility
            $('#settings-link').click(function(event) {
                event.preventDefault();
                $('#change-password-link').toggle();
            });
        });
    </script>
</body>

</html>
