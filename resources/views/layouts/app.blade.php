<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="assets/css/landing.css">
    <link rel="shortcut icon"  href="assets/img/portal_logo.png">

    <title> Portal | Platería</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="/libs/mdb/css/bootstrap.min.css">
    <link rel="stylesheet" href="/libs/mdb/css/mdb.min.css">
    <link rel="stylesheet" href="/libs/font-awesome-4.7.0/css/font-awesome.min.css">

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
        .navbar-right > li{
            margin-top: .1rem;
            margin-bottom: .1rem;
        }
        .navbar-right > li:not(:last-child){
            border-right: 2px solid #FFB400;
        }
        .panel > .bg-y{
            background-color: #FFB400;
            color: #fff;
        }
        .form-group .form-control.in-y:focus {
            outline: none !important;
            border-color: #fff;
            border-bottom-color: #FFB400;
            box-shadow: 0 0 .1px #FFB400;
        }
        [type=checkbox]:checked+label:before{
            border-right: 2px solid #FFB400;
            border-bottom: 2px solid #FFB400;
        }
        a {color:#FFFFFF;} 
        a:visited {color:#FFFFFF;} 
        a:active {color:#FFB6C1;} 
        a:hover {color:#FFFFFF;} 
    </style>
    @yield('css')
</head>


<body id="app-layout">
<!-- Barra de Informacion de la Empresa -->
    <div class="portal_info">
    <a href="" class="portal_email"><i class="fa fa-envelope-o fa-lg" aria-hidden="true"></i>&nbsp;correo@portalplateria.com.mx</a>
    <i class="portal_info_icons fa fa-facebook fa-lg" aria-hidden="true"></i>
    <i class="portal_info_icons fa fa-instagram fa-lg" aria-hidden="true"></i>
    <a class="portal_phone"><i class="portal_info_icons fa fa-phone fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;615 4640 3090</a>
    <i class="portal_info_icons fa fa-clock fa-lg" aria-hidden="true"></i>
    <i class="portal_info_icons fa fa-clock-o fa-lg" aria-hidden="true"></i>Lun - Sab 8:00am - 8:00pm | Dom cerrado
    </div>
<!-- Barra de Informacion de la Empresa -->

<!-- Barra de Navegación de la Página -->
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Portal</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    <a href="{{  url('/home')}}">
                        <img class="portal_logo" src="assets/img/portal_logo.png" alt="">
                    </a>
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/home') }}">Inicio</a></li>
                        @yield('navbar-guest')
                        <li><a href="{{ url('/login') }}">Iniciar sesión</a></li>
                        <li><a href="{{ url('/register') }}">Crear cuenta</a></li>
                        <li><a href="" class="fa fa-search fa-lg" aria-hidden="true"></i></a>        
                        </li>
                    @else
                        @yield('navbar-auth')
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Salir</a></li>
                                @yield('navbar-dropdown-auth')
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
<!-- Barra de Navegación de la Página -->

    @yield('content')

    <!-- JavaScripts -->
    <script src="/libs/mdb/js/jquery-3.1.1.min.js"></script>
    <script src="/libs/mdb/js/tether.min.js"></script>
    <script src="/libs/mdb/js/bootstrap.min.js"></script>
    <script src="/libs/mdb/js/mdb.min.js"></script>
    @yield('js')
</body>
</html>
