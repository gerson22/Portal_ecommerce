@extends('layouts.app')

<!---- CSS ---->
@section('css')
    <link rel="stylesheet" href="assets/css/landing.css" type="text/css">
@stop

@section('content')

<!--/. Main container -->
<br><br><br><br>
<div class="main">
  <div class="container">
    <div class="row" id="productos">
      <div class="col-md-1" style="padding: 0rem;">

      </div>
      <div class="jumbotron col-md-10 ">
        <div class=""><h3>Productos encontrados</h3></div>
        <div class="body">
          <div class="row">
              <h5 class="pt-1 pb-5">Mi carrito</h5>

            <!--Grid row-->
            <div class="row">

                <!--Grid column-->
                <div class="col-md-12">

                    <!--Shopping Cart table-->
                    <div class="table-responsive">
                        <table class="table product-table">
                            <!--Table head-->
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Producto</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <!--/Table head-->

                            <!--Table body-->
                            <tbody>
                                <?php
                                  $total = 0;
                                  $total_neto = 0;
                                ?>
                                @if(is_array($productos))
                                   @foreach($productos as $producto)
                                      <?php
                                        $total = $producto->count * $producto->precio;
                                        $total_neto = $total + $total_neto;
                                      ?>
                                      <!--First row-->
                                      <tr data-id="{{$producto->id}}" id="tr_{{$producto->id}}"" data-count="{{$producto->count}}" data-precio="{{$producto->precio}}">
                                          <th scope="row">
                                              <img src="{{$producto->imagen}}" alt="" class="img-fluid">
                                          </th>
                                          <td>
                                              <h5><strong>{{$producto->nombre}}</strong></h5>
                                          </td>
                                          <td>$ {{$producto->precio}}</td>
                                          <td>
                                              <span class="qty" id="qty_{{$producto->id}}">{{$producto->count}} </span>
                                              <div class="btn-group" data-toggle="buttons" data-id="{{$producto->id}}">
                                                  <label class="btn btn-tb btn-primary btn-rounded" id="countSubstract">
                                                      <input type="radio" name="count">&mdash;
                                                  </label>
                                                  <label class="btn btn-tb btn-primary btn-rounded" id="countAdd">
                                                      <input type="radio" name="count">+
                                                  </label>
                                              </div>
                                          </td>
                                          <td>${{$producto->count * $producto->precio}}</td>
                                          <td>
                                              <button type="button" data-id="{{$producto->id}}" id="btn_remove_item" class="btn btn-tb btn-primary" data-toggle="tooltip" data-placement="top" title="Remove item">X
                                              </button>
                                          </td>
                                      </tr>
                                      <!--/First row-->

                                    @endforeach
                                @endif
                                <!--Fourth row-->
                                <tr>
                                    <td colspan="3"></td>
                                    <td>
                                        <h4><strong>Total</strong></h4></td>
                                    <td>
                                        <h4><strong id="total_neto">$ {{$total_neto}}</strong></h4></td>
                                    <td colspan="3"><button type="button" class="btn btn-primary btn-rounded mb-3" id="buy">Compra completa  <i class="fa fa-angle-right right"></i></button></td>
                                </tr>
                                <!--/Fourth row-->

                            </tbody>
                            <!--/Table body-->
                        </table>
                    </div>
                    <!--/Shopping Cart table-->

                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--/. End container -->
@stop



<!---- Javascripts ---->
@section('js')
  <script type="text/javascript" src="assets/js/landing.js" charset="utf-8"></script>
@stop

