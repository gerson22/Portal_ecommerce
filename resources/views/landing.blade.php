@extends('layouts.app')

<!---- CSS ---->
@section('css')
    <link rel="stylesheet" href="assets/css/landing.css" type="text/css">
@stop

<!---- Items en la navbar ---->
@section('navbar-guest')
      <li class="nav-item">
          <a class="nav-link" href="#">Deestacados</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="#">Socios</a>
      </li>
@stop
<!---- Contenido de la pagina ---->
@section('content')

<!--/. Main container -->
<div class="main">

<!---- Carrousel ---->
  <!--Carousel Wrapper-->
  <div id="carousel-example-1" class="carousel slide carousel-fade" data-ride="carousel" data-interval="false">

      <!--Slides-->
      <div class="carousel-inner" role="listbox">

          <!--First slide-->
          <div class="carousel-item active">
              <div class="view hm-black-light" style="width: 100%;" data-jarallax='{"speed": 0.2}'>
                 <img class="carousel_img" src="assets/img/fondo1.jpg" alt="First slide" style="1800px">
                 <div class="mask  pattern-2 full-bg-img">
                 </div>
              </div>
              <div class="carousel-caption Portal_titles align-middle">
                 <div class="">
                  <h6 class="h6-responsive wow fadeInDown" data-wow-delay="0.5s">Calidad en cada uno de nuestros productos</h6>
                  <h1 class="h1-responsive wow fadeInDown" data-wow-delay="0.7s">Accesorios para cualquier ocasión</h1>
                  <button class="btn Portal_catalogo wow fadeInDown" data-wow-delay="0.9s">VER CATALOGO</button>
                 </div>
              </div>
          </div>
          <!--/.First slide-->
      </div>
  </div>
  <!--/.Carousel Wrapper-->

  <!--/.Información del Portal-->

  <div class="Portal_container col-md-12">
      <div class="row">
        <div class="conten Portal_about col-md-3 wow slideInLeft">
            Todos los días estamos actualizando nuestro catálogo de joyería de mayoreo con: anillos, aretes, pulseras, collares, cadenas, dijes, gargantillas, brazaletes y muy lindos sets.
        </div>
        <div class="conten Portal_l col-md-6 wow fadeInDown">
            <img class="Portal_about_logo" src="assets/img/Portal_logo.png" alt="">
        </div>
        <div class="conten Portal_about col-md-3 wow slideInRight">
            Nuestro catálogo online esta enfocado a la venta de plata al mayoreo. Si buscas comprar joyeria para uso personal, verifica si alguna de nuestras sucursales de menudeo estan cerca de ti.
        </div>
      </div>
  </div>

  <!--/.Información del Portal-->

  <!--/.Productos a la venta-->

  <div class="Portal_productos container ">
      <div class="row ">
          <div class="Portal_destacados col-md-12">
              <h1 class="col-md-12 wow fadeInDown">Productos Destacados</h1>
              <h5 class="col-md-12 wow fadeInDown">Te presentamos la joyería que más ventas a tenido y las favoritas de nuestros clientes</h5>
          </div>
          <div class="Portal_vercatalogo col-md-12">
              <div class="col-lg-5"></div>
              <center><div class="Portal_divbtn col-lg-2">
                  <button class="btn Portal_catalogo_ col-md-12 wow bounce">VER CATALOGO</button>
              </div></center>
          </div>
      </div>
      <div class="row col" id="Portal_cards">
          <div class="col-md-3">
              <div class="card">
                     <!--Card image-->
                  <div class="view overlay hm-white-slight">
                      <img src="assets/img/producto1.jpg" class="img-fluid" alt="">
                      <a>
                          <div class="mask waves-effect waves-light"></div>
                      </a>

                  </div>
                  <div class="card-block">
                      <h6 class="card-title"><span class="fa fa-shopping-bag"></span>&nbsp;&nbsp;Agregar a mi carrito</h6>
                  </div>
                  <!--/.Card content-->
              </div>
              <div class="Portal_infoProducto">
                  <p class="Nombre_producto">Nombre del Producto</p>
                  <p class="Precio_producto">$ 000.00 MX</p>
              </div>
          </div>
          <div class="col-md-3">
              <div class="card">
                     <!--Card image-->
                  <div class="view overlay hm-white-slight">
                      <img src="assets/img/producto2.jpg" class="img-fluid" alt="">
                      <a>
                          <div class="mask waves-effect waves-light"></div>
                      </a>

                  </div>
                  <div class="card-block">
                      <h6 class="card-title"><span class="fa fa-shopping-bag"></span>&nbsp;&nbsp;Agregar a mi carrito</h6>
                  </div>
                  <!--/.Card content-->
              </div>
              <div class="Portal_infoProducto">
                  <p class="Nombre_producto">Nombre del Producto</p>
                  <p class="Precio_producto">$ 000.00 MX</p>
              </div>
          </div>
          <div class="col-md-3">
              <div class="card">
                     <!--Card image-->
                  <div class="view overlay hm-white-slight">
                      <img src="assets/img/producto3.jpg" class="img-fluid" alt="">
                      <a>
                          <div class="mask waves-effect waves-light"></div>
                      </a>

                  </div>
                  <div class="card-block">
                      <h6 class="card-title"><span class="fa fa-shopping-bag"></span>&nbsp;&nbsp;Agregar a mi carrito</h6>
                  </div>
                  <!--/.Card content-->
              </div>
              <div class="Portal_infoProducto">
                  <p class="Nombre_producto">Nombre del Producto</p>
                  <p class="Precio_producto">$ 000.00 MX</p>
              </div>
          </div>
          <div class="col-md-3">
              <div class="card">
                     <!--Card image-->
                  <div class="view overlay hm-white-slight">
                      <img src="assets/img/producto4.jpg" class="img-fluid" alt="">
                      <a>
                          <div class="mask waves-effect waves-light"></div>
                      </a>

                  </div>
                  <div class="card-block">
                      <h6 class="card-title"><span class="fa fa-shopping-bag"></span>&nbsp;&nbsp;Agregar a mi carrito</h6>
                  </div>
                  <!--/.Card content-->
              </div>
              <div class="Portal_infoProducto">
                  <p class="Nombre_producto">Nombre del Producto</p>
                  <p class="Precio_producto">$ 000.00 MX</p>
              </div>
          </div>
          <div class="col-md-3">
              <div class="card">
                     <!--Card image-->
                  <div class="view overlay hm-white-slight">
                      <img src="assets/img/producto5.jpg" class="img-fluid" alt="">
                      <a>
                          <div class="mask waves-effect waves-light"></div>
                      </a>

                  </div>
                  <div class="card-block">
                      <h6 class="card-title"><span class="fa fa-shopping-bag"></span>&nbsp;&nbsp;Agregar a mi carrito</h6>
                  </div>
                  <!--/.Card content-->
              </div>
              <div class="Portal_infoProducto">
                  <p class="Nombre_producto">Nombre del Producto</p>
                  <p class="Precio_producto">$ 000.00 MX</p>
              </div>
          </div>
          <div class="col-md-3">
              <div class="card">
                     <!--Card image-->
                  <div class="view overlay hm-white-slight">
                      <img src="assets/img/producto6.jpg" class="img-fluid" alt="">
                      <a>
                          <div class="mask waves-effect waves-light"></div>
                      </a>

                  </div>
                  <div class="card-block">
                      <h6 class="card-title"><span class="fa fa-shopping-bag"></span>&nbsp;&nbsp;Agregar a mi carrito</h6>
                  </div>
                  <!--/.Card content-->
              </div>
              <div class="Portal_infoProducto">
                  <p class="Nombre_producto">Nombre del Producto</p>
                  <p class="Precio_producto">$ 000.00 MX</p>
              </div>
          </div>
          <div class="col-md-3">
              <div class="card">
                     <!--Card image-->
                  <div class="view overlay hm-white-slight">
                      <img src="assets/img/producto7.jpg" class="img-fluid" alt="">
                      <a>
                          <div class="mask waves-effect waves-light"></div>
                      </a>

                  </div>
                  <div class="card-block">
                      <h6 class="card-title"><span class="fa fa-shopping-bag"></span>&nbsp;&nbsp;Agregar a mi carrito</h6>
                  </div>
                  <!--/.Card content-->
              </div>
              <div class="Portal_infoProducto">
                  <p class="Nombre_producto">Nombre del Producto</p>
                  <p class="Precio_producto">$ 000.00 MX</p>
              </div>
          </div>
          <div class="col-md-3">
              <div class="card">
                     <!--Card image-->
                  <div class="view overlay hm-white-slight">
                      <img src="assets/img/producto8.jpg" class="img-fluid" alt="">
                      <a>
                          <div class="mask waves-effect waves-light"></div>
                      </a>

                  </div>
                  <div class="card-block">
                      <h6 class="card-title"><span class="fa fa-shopping-bag"></span>&nbsp;&nbsp;Agregar a mi carrito</h6>
                  </div>
                  <!--/.Card content-->
              </div>
              <div class="Portal_infoProducto">
                  <p class="Nombre_producto">Nombre del Producto</p>
                  <p class="Precio_producto">$ 000.00 MX</p>
              </div>
          </div>
      </div>
  </div>

  <!--/.Productos a la venta-->


  <!--/.Proveedores joyeria-->


  <div class="Portal_Proveedores container">
      <div class="row">
          <div class="mult_opciones">


              <p>MULTIPLES OPCIONES</p>
              <p>Contamos con los mejores proveedores, para llevarte gran diversidad en joyería mexicana</p>
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

