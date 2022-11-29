<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BEBRAS | CUBA</title>


    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{ asset('css/mystylesheet.css') }}">
</head>


<body style="background-color:mistyrose; z-index:-2;display:flex; min-height: 100vh; flex-direction: column; justify-content: space-between">

<div>

    <div class="background_gray_decorative_rectangle"></div>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">

        <span class="navbar-brand"><b>BEBRAS</b> CUBA</span>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            
            <ul class="navbar-nav">
                
                <li class="nav-item active">
                    <a class="nav-link" href="/inicio">Inicio</a>
                </li>   
                
                <li class="nav-item">
                    <a class="nav-link" href="/eventos">Eventos</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="/recursos">Recursos</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/acceder">Acceder</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" 
                        href="#" id="navbarDropdownMenuLink" 
                        role="button" data-toggle="dropdown" 
                        aria-haspopup="true" 
                        aria-expanded="false">Registrarse </a>
                    
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="/registro-tutor">Tutor</a>
                        <a class="dropdown-item" href="/registro-estudiante">Estudiante</a>
                    </div>
                </li>
            </ul>
        </div>

    </nav>

    <div class="card megacard" style="width: auto">

        @yield('content')

    </div>
</div>
<div>
    <footer class="main-footer" style="width:100%;justify-self: flex-end;align-self: flex-end">
        <p class="col-md-4 mb-0 text-muted">
            <strong>Copyright © 2022 <a href="/inicio">BEBRAS CUBA</a>.</strong>
        </p>
    </footer>
</div>
   

</body>


<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/pooper.js') }}"></script>
<script src="{{ asset('js/bootstrap.js') }}"></script>


</html>