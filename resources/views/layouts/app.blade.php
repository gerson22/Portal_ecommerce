@extends('layouts.master')

@section('css')
  @yield('css')
@endsection
@section('navbar')

<!-- Barra de Navegación de la Página -->
    <nav class="navbar navbar-default navbar-fixed-top">
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
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out">
                                @yield('navbar-dropdown-auth')
                                </i>Salir</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
<!-- Barra de Navegación de la Página -->
     @yield('content')
@endsection


@section('jvs')
  @yield('js')
@endsection

