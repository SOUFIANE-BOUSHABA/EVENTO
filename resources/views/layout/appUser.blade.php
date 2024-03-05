<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Evento - Your Event Platform</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Ubuntu">
    <style>
        .hero{
            
            min-height:80vh;
            margin-bottom: 100px;
            margin-top: 100px;
            
        }
        .mt-10{
            margin-top: 100px;
        }
        .text{
            font-size: 1.2rem;
            opacity: .6;
            font-family: 'Ubuntu', sans-serif;
        }
        h1{
            font-size: 3rem;
            opacity: .9;
            font-family: 'Ubuntu', sans-serif;
        }
        .thissss{
            position: relative;
            display: grid;
            place-items: center;
            align-items: center;
            background-image: url('https://via.placeholder.com/500x300');
            min-height: 30vh;
            border-radius: 10px;
        }
        .margin-bottom{
            margin-bottom: 100px;
        }
        .category-card {
            transition: box-shadow 0.3s;
        }
    
        .category-card:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .fixxx {
            display: flex;
        }
        footer {
          margin-top: 100px;
        }
        @media screen and (max-width: 990px) {
            .fixxx {
                display: grid;
            }
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
                        <a class="nav-link" href="index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="event.html">Events</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                </ul>
    
                <div class="navbar-nav">
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            My Account
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

@yield('content')



<footer>
    <div class="container ">
        <hr>
        <div class="d-flex sm:d-grid justify-content-between"> 
            <p>&copy; 2024 soufianboushaba. All rights reserved.</p>
            <p>Contact us at: <a href="mailto:soufianboushaba12@gmail.com">soufianboushaba12@gmail.com</a></p>
          </div>
       
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


