@extends('layouts.master')

@section('css')
  @yield('css')
@endsection
@section('navbar')
  <!--Double Navigation-->
    <header>

        <!-- Sidebar navigation -->
        <ul id="slide-out" class="side-nav fixed custom-scrollbar elegant-color">

            <!-- Logo -->
            <li>
                @if(!Auth::guest())
                  <div class="logo-wrapper sn-ad-avatar-wrapper">
                      <img src="http://mdbootstrap.com/images/avatars/img%20(6)" class="img-fluid rounded-circle">
                      <div class="rgba-stylish-strong">
                          <p class="user white-text">{{Auth::user()->name}}<br> {{Auth::user()->email}}
                          </p>
                      </div>
                  </div>
                @else
                  <div class="logo-wrapper sn-ad-avatar-wrapper">
                      <img src="http://mdbootstrap.com/images/avatars/img%20(6)" class="img-fluid rounded-circle">
                      <div class="rgba-stylish-strong">
                          <p class="user white-text">Admin<br> admin@gmail.com
                          </p>
                      </div>
                  </div>
                @endif
            </li>
            <!--/. Logo -->

            <!-- Side navigation links -->
            <li class="elegant-color">
                <ul class="collapsible collapsible-accordion">
                    <li><a class="collapsible-header waves-effect arrow-r"><span class="fa fa-gears"></span>Gestión<i class="fa fa-angle-down rotate-icon"></i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="/proveedores" class="waves-effect"><span class="fa fa-chevron-circle-right"></span>Marcas</a>
                                </li>
                                <li><a href="/categorias" class="waves-effect"><span class="fa fa-chevron-circle-right"></span>Categorias</a>
                                </li>
                                <li><a href="/productos" class="waves-effect"><span class="fa fa-chevron-circle-right"></span>Productos</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                </ul>
            </li>
            <!--/. Side navigation links -->

        </ul>
        <!--/. Sidebar navigation -->

        <!--Navbar-->
        <nav class="navbar navbar-inverse navbar-fixed-top scrolling-navbar double-nav">
          <!-- SideNav slide-out button -->
          <div class="float-xs-left">
              <a href="#" data-activates="slide-out" class="button-collapse"><i class="fa fa-bars"></i></a>
          </div>

          <!-- Breadcrumb-->
          <div class="breadcrumb-dn">
              <p>Portal</p>
          </div>


          <ul class="nav navbar-nav float-xs-right">

              <li class="nav-item ">
                  <a class="nav-link" href="/"><i class="fa fa-home"></i> <span class="hidden-sm-down">Inicio</span></a>
              </li>
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> Profile</a>
                  <div class="dropdown-menu dropdown-dark dd-right" aria-labelledby="dropdownMenu1" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                      <a class="dropdown-item" href="/logout"><span class="fa fa-sign-out"></span>Salir</a>
                  </div>
              </li>
          </ul>
      </nav>
        <!--/.Navbar-->

    </header>
    <!--/Double Navigation-->

    <!--Main layout-->
    <main class="">
        <br><br><br>
        @yield('content')
    </main>
    <!--/Main layout-->

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
