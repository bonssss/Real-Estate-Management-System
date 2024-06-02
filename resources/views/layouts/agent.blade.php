<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>Agent Panel</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
     <link href="{{asset('assets/styles/style.css')}}" rel="stylesheet">

    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-QVg5ZY79EEj3nK3m2JHvAg6A5S0ljIB+t6tMWqJ+fQQxSQfT9LojEsfEMrxLDYJh+G44e0b4PLh8k4lWTckEgw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ionicons@5.0.0/dist/css/ionicons.min.css">

</head>
<body>
<div id="wrapper">
    <nav class="navbar header-top fixed-top navbar-expand-lg  navbar-dark bg-dark">
      <div class="container">
      <a class="navbar-brand" href="#">LOGO</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarText">
        @auth('agent')
          <ul class="navbar-nav side-nav" >
              <li class="nav-item">
                <a class="nav-link text-white" style="margin-left: 20px;" href="{{ route('agent.dashboard')}}">Home
                  <span class="sr-only">(current)</span>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="{{route('agents.hometypes')}}" style="margin-left: 20px;">Hometypes</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('property.all') }}" style="margin-left: 20px;">Properties</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('requests.all') }}" style="margin-left: 20px;">Requests</a>
              </li>
          </ul>
        @endauth
        <ul class="navbar-nav ml-md-auto d-md-flex">
          @auth('agent')
            <li class="nav-item">
              <a class="nav-link" href="{{ route('agent.dashboard')}}">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::guard('agent')->user()->name }}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('agent.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('agent.logout') }}" method="POST" class="d-none">@csrf</form>
                </div>
            </li>

          @else

            <li class="nav-item">
              <a class="nav-link" href="{{ route('view.login')}}">login
                <span class="sr-only">(current)</span>
              </a>
            </li>
          @endauth

        </ul>
      </div>
    </div>
    </nav>
        <div class="container-fluid">
            <main class="py-4">
                    @yield('content')
            </main>
        </div>
    </div>
  </div>
<script type="text/javascript">


</script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
<script>
    feather.replace();
</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


</body>
</html>
