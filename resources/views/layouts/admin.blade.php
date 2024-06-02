<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-vTdGLjo1f3q6QGe+paT5FK2njl9J9yJxuVbRlTpsGLDez2N4ucXk2mmikG/nX4P3w+tt5gO5PFMEmfnleXlW5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('assets/styles/style.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.css">

    <style>
        /* Navigation Bar */
        .navbar {
            background-color: #343a40; /* Dark background color */
            padding: 10px 20px; /* Add padding */
            border-radius: 0; /* Remove border radius */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Add shadow */
        }

        .navbar-brand {
            color: #fff; /* White text color */
            font-weight: 600; /* Bold font weight */
        }

        .navbar-nav .nav-link {
            color: #fff; /* White text color */
            font-weight: 500; /* Medium font weight */
            transition: color 0.3s ease; /* Smooth color transition */
        }

        .navbar-nav .nav-link:hover {
            color: #ffc107; /* Yellow hover color */
        }

        /* Sidebar */
        .side-nav {
            background-color: #343a40; /* Dark background color */
            padding-top: 20px; /* Add top padding */
            border-radius: 0 10px 10px 0; /* Rounded corners on the right side */
        }

        .side-nav .nav-link {
            color: #fff; /* White text color */
            font-weight: 500; /* Medium font weight */
            transition: background-color 0.3s ease; /* Smooth background color transition */
        }

        .side-nav .nav-link:hover {
            background-color: #495057; /* Darker background color on hover */
        }

        .side-nav .active {
            background-color: #ffc107; /* Active item highlight color */
        }
    </style>
</head>
<body>

<div id="wrapper">
    <nav class="navbar header-top fixed-top navbar-expand-lg navbar-dark bg-dark navbar-custom" id="navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="#">HIYA</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
                    aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>


            <div class="collapse navbar-collapse" id="navbarText">
                @auth('admin')
                    <ul class="navbar-nav side-nav">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{route('admin.dashboard')}}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.agents.list')}}">Agents</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.hometypes')}}">Home Types</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.properties')}}">Properties</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.requests')}}">Requests</a>
                        </li>
                    </ul>
                @endauth

                <ul class="navbar-nav ml-md-auto d-md-flex">
                    @auth('admin')
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::guard('admin')->user()->name }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('admin.change.password') }}">
                                    Change Password
                                </a>
                                <a class="dropdown-item" href="{{ route('admin.logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('view.login') }}">Login</a>
                        </li>
                    @endauth
                </ul>

            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <main class="py-4">
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            @yield('content')
        </main>
    </div>
</div>

<!-- Feather Icons script to render icons -->
<script src="https://unpkg.com/feather-icons"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        feather.replace();
    });
</script>

</body>
</html>
