@extends('layouts.master')

@section('css')
  <style>
    .bg-skin-lp {
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center center;
        background-attachment: fixed;
    }
    .fa {
      margin-right: .5rem;
    }
  </style>
  @yield('css')
@endsection
@section('navbar')
    <header>
      <!-- Sidebar navigation -->
      <ul id="slide-out" class="side-nav fixed sn-bg-1 custom-scrollbar">
          <!-- Logo -->
          <li>
              <div class="logo-wrapper waves-light">
                  <a href="#"><img src="https://mdbootstrap.com/img/logo/mdb-transparent.png" class="img-fluid flex-center"></a>
              </div>
          </li>
          <!--/. Logo -->
          <!--Social-->
          <!--/Social-->
          <!--Search Form-->
          <li>
              <form class="search-form" role="search">
                  <div class="form-group waves-light">
                      <input type="text" class="form-control" placeholder="Search">
                  </div>
              </form>
          </li>
          <!--/.Search Form-->
          <!-- Side navigation links -->
          <li>
              <ul class="collapsible collapsible-accordion">
                  <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-chevron-right"></i> Gestión<i class="fa fa-angle-down rotate-icon"></i></a>
                      <div class="collapsible-body">
                          <ul>
                              <li><a href="/productos" class="waves-effect">Productos</a>
                              </li>
                              <li><a href="/categorias" class="waves-effect">Categorias</a>
                              </li>
                              <li><a href="/proveedores" class="waves-effect">Marcas</a>
                              </li>
                          </ul>
                      </div>
                  </li>
                  <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-chevron-right"></i> Adminstración del sistema<i class="fa fa-angle-down rotate-icon"></i></a>
                      <div class="collapsible-body">
                          <ul>
                              <li><a href="#" class="waves-effect">Página principal</a>
                              </li>
                          </ul>
                      </div>
                  </li>
              </ul>
          </li>
          <!--/. Side navigation links -->
          <div class="sidenav-bg mask-strong"></div>
      </ul>
      <!--/. Sidebar navigation -->
      <!-- Navbar -->
      <nav class="navbar fixed-top navbar-toggleable-md navbar-expand-lg navbar-dark scrolling-navbar double-nav">
          <!-- SideNav slide-out button -->
          <div class="float-xs-left">
              <a href="#" data-activates="slide-out" class="button-collapse"><i class="fa fa-bars"></i></a>
          </div>
          <!-- Breadcrumb-->
          <div class="breadcrumb-dn mr-auto">
              <p>Joyeria</p>
          </div>
          <ul class="nav navbar-nav nav-flex-icons ml-auto">
              <li class="nav-item">
                <a href="/" class="nav-link"></a>
              </li>
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      {{Auth::user()->name}}
                  </a>
                  <div class="dropdown-menu dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="/logout"><span class="fa fa-sign-out"></span>Salir</a>
                  </div>
              </li>
          </ul>
      </nav>
      <!-- /.Navbar -->
  </header>
  <!--/.Double navigation-->

  <!--Main Layout-->
  <main>
      <div class="container-fluid mt-5">
          @yield('content')
      </div>
  </main>
  <!--Main Layout-->

@endsection
@section('jvs')
  <script src="/libs/mdb/js/modules(optional)/sideNav.js"></script>
  <script>
    $(function(){
      // SideNav init
      $(".button-collapse").sideNav();

      // Custom scrollbar init
      var el = document.querySelector('.custom-scrollbar');
      Ps.initialize(el);
    });
  </script>
  @yield('js')
@endsection
