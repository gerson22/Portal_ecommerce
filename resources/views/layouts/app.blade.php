@extends('layouts.master')

@section('css')
  <style>
    .navbar-nav.ml-auto > li > .nav-link{
        padding: 1rem;
    }
    .navbar-nav.ml-auto > li:not(:last-child){
        border-right: 2px solid #2E2E2E;
    }
  </style>
  @yield('css')
@endsection
@section('navbar')
    <nav class="navbar navbar-expand-lg navbar-light fixed-top scrolling-navbar">

        <!-- Navbar brand -->
        <span class="navbar-brand align-middle">Portal</span>

        <!-- Collapse button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

        <!-- Collapsible content -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <!-- Links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Inicio <span class="sr-only">(Incio)</span></a>
                </li>
                @yield('navbar-guest')
                <li class="nav-item">
                    <a class="nav-link" href="/login">Iniciar Sesión</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/register">Crear cuenta</a>
                </li>

            </ul>
            <!-- Links -->

            <!-- Search form -->
            <div class="md-form">
                <input type="search" id="form-autocomplete" placeholder="Buscar" class="form-control mdb-autocomplete pc">
            </div>
        </div>
        <!-- Collapsible content -->

    </nav>
    <!--/.Navbar-->
<!-- Barra de Navegación de la Página -->

@endsection
@section('content_search')
  @yield('content')
@endsection
<!-- /. Busqueda de productos (marcas, nombre producto, categoria) -->
<div class="finded" style="display:none;">
  <br><br><br><br><br>
  <div class="row">
    <div class="container">
      <button type="button" class="close close-sc btn-floating btn-small elegant-color-dark" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <div class="row">
        <div class="col-md-12">
          <div class="header">
            <h2>Busqueda por producto</h2>
          </div>
          <div class="body_products">
            <p class="jumbotron">Sin resultados</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="header">
            <h2>Busqueda por categoria</h2>
          </div>
          <div class="body_category">
            <p class="jumbotron">Sin resultados</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="header">
            <h2>Busqueda por marcas</h2>
          </div>
          <div class="body_provider">
            <p class="jumbotron">Sin resultados</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@section('jvs')
  @yield('js')
@endsection

