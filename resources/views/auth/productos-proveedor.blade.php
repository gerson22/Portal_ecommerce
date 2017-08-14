@extends('layouts.app')

<!---- CSS ---->
@section('css')
    <link rel="stylesheet" href="assets/css/landing.css" type="text/css">
@stop

@section('content')

@if(count($productos) > 0)
  <!--/. Main container -->
<br><br><br><br>
<div class="main">
  <div class="container">
    <div class="row" id="productos">
      <div class="col-md-2 jumbotron grey lighten-2" style="padding: 0rem;">
        <div class="elegant-color">
          <h3 style="padding:.5rem;">Rango de precio</h3>
        </div>
        <div class="">
          <div class="row col-md-12" style="padding:1.5rem;">
            <form class="range-field">
              <label for="min-price" id="min-price-l" class="blue-grey-text" >De: $<span>0</span></label>
              <input type="range" id="min-price" data-id="{{$productos[0]->proveedor_id}}" data-self="provider" min="0" max="5000" />
            </form>
            <form class="range-field">
              <label for="max-price" id="max-price-l" class="blue-grey-text">A: $<span>0</span></label>
              <input type="range" id="max-price" data-id="{{$productos[0]->proveedor_id}}" data-self="provider" min="0" max="5000" />
            </form>
          </div>
        </div>
      </div>
      <div class="jumbotron col-md-10 ">
        <div class=""><h3>Productos encontrados</h3></div>
        <div class="body">
          <div class="row">
            @foreach($productos as $producto)
              <!--Card-->
              <div class="card col-md-3 col-sm-5 col-xs-12 hoverable card-finded card-body-l">

                  <!--Card image-->
                  <div class="view overlay hm-black-slight z-depth-1">
                      <img src="{{$producto->imagen}}" class="img-fluid" style="height:100%;" alt="Imagen del producto {{$producto->nombre}}">
                      <a>
                          <div class="mask"></div>
                      </a>
                  </div>
                  <!--Card image-->

                  <!--Card content-->
                  <div class="card-body text-center no-padding elegant-color">
                      <!--Category & Title-->
                      <a href="" class="text-muted"><h5>{{$producto->nombreCategoria}}</h5></a>
                      <h4 class="card-title black"><strong><a href="">{{$producto->nombre}}</a></strong></h4>

                      <!--Description-->
                      <p class="card-text"><?php echo substr($producto->descripcion, 1,((65*strlen($producto->descripcion)/100)*(-1)))."..."; ?>
                      </p>

                      <!--Card footer-->
                      <div class="card-footer">
                          <span class="left">
                              <div class="row">
                                @if($producto->descuento)
                                  <span>$<?php echo (($producto->precio)*(100-$producto->descuento)*.01); ?>
                                        <span class="discount"> ${{$producto->precio}}</span>
                                  </span>
                                @else
                                  <span class="${(dta.descuento)?"hide":""}"> ${{$producto->precio}}</span>
                                @endif
                              </div>
                          </span>
                          <span class="right">
                            <div class="row">
                              <a class="tooltips" data-toggle="tooltip" data-placement="top" data-info="{{json_encode($producto)}}" title="Vista rápida"><i class="fa fa-eye"></i></a>
                              <a data-toggle="tooltip" data-placement="top" class="tooltips addCart" data-info="{{json_encode($producto)}}" title="Agregar al carrito"><span class="fa fa-shopping-cart"></span></a>
                            </div>
                          </span>
                      </div>

                  </div>
                  <!--Card content-->

              </div>
              <!--Card-->
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@else
<?php return redirect('/'); ?>
@endif
<!--/. End container -->
@stop



<!---- Javascripts ---->
@section('js')
  <script type="text/javascript" src="assets/js/landing.js" charset="utf-8"></script>
@stop

