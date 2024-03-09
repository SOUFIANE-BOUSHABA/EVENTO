<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Evento - Your Event Platform</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Ubuntu">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <style>
        .thissss{
            background-image: url('{{ asset('storage/images/testtt.jpg') }}');
        }
    </style>
</head>
<body>

<header class="navbar navbar-expand-lg navbar-white bg-white shadow sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">EVEN<span class="text-primary">TO</span> </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse  justify-content-end" id="navbarNav">
            <div class="col-md-8    fixxx  justify-content-between">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('home')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('event')}}">Events</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                </ul>
    
                <div class="navbar-nav">
                   
                    @guest
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          
                            My Account
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{route('register')}}">Register</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-danger" href="{{route('login')}}">Login</a></li>
                        </ul>
                    </div>
                    @endguest
                  


                    @auth
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          
                           {{Auth::user()->firstname}}
                        </a>
                        <ul class="dropdown-menu" style="margin-left: -70px" aria-labelledby="navbarDropdown">
                            @role('admin')
                            <li><a class="dropdown-item" href="{{url('admin-getUsers')}}">dashboard</a></li>
                            @endrole
                            @role('organisateur')
                            <li><a class="dropdown-item" href="{{url('show.events')}}">dashboard</a></li>
                            @endrole
                            <li><a class="dropdown-item" href="{{route('myResevations')}}">Reservations</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-danger" href="{{route('logout')}}">Logout</a></li>
                        </ul>
                    </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</header>

<main>
    @yield('content')
</main>




<footer>
    <div class="container ">
        <hr>
        <div class="d-flex sm:d-grid justify-content-between"> 
            <p>&copy; 2024 soufianboushaba. All rights reserved.</p>
            <p>Contact us at: <a href="mailto:soufianboushaba12@gmail.com">soufianboushaba12@gmail.com</a></p>
          </div>
       
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>


