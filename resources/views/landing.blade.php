@extends('layouts.app')

<!---- CSS ---->
@section('css')
    <link rel="stylesheet" href="assets/css/landing.css" type="text/css">
@stop

<!---- Items en la navbar ---->
@section('navbar-guest')
	 <li><a href="">Portal Platería</a></li>
	 <li><a href="">Destacados</a></li>
	 <li><a href="">Socios</a></li>
@stop
<!---- Contenido de la pagina ---->
@section('content')

<!---- Carrousel ---->
  
<!--Carousel Wrapper-->
<div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel">
    <!--Indicators-->
    <ol class="carousel-indicators">
        <li data-target="#carousel-example-2" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-2" data-slide-to="1"></li>
        <li data-target="#carousel-example-2" data-slide-to="2"></li>
    </ol>
    <!--/.Indicators-->
    <!--Slides-->
    <center>
    <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
            <div class="view hm-black-light">
                <img class="carousel_img" src="assets/img/fondo1.jpg" alt="First slide">
            </div>
            <div class="carousel-caption Portal_titles">
                <h6 class="h6-responsive">Calidad en cada uno de nuestros productos</h6>            
                <h1 class="h1-responsive">Accesorios para cualquier ocasión</h1>
                <button class="btn btn-warning Portal_catalogo">VER CATALOGO</button>
            </div>
        </div>
      <!----   
      <div class="carousel-item">
            <div class="view hm-black-strong">
                <img class="carousel_img" src="assets/img/fondo2.jpg" alt="Second slide">
            </div>
        </div>
        <div class="carousel-item">
            <div class="view hm-black-slight">
                <img class="carousel_img" src="assets/img/fondo3.jpg" alt="Third slide">
            </div>
        </div> ---->
    </div>
    <!--/.Slides-->
    <!--Controls-->
    <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
         
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    <!--/.Controls-->
</div>
</center>

<!--/.Información del Portal-->

<div class="Portal_container col-md-12">
	<div class="conten Portal_about col-md-3 ">
		Todos los días estamos actualizando nuestro catálogo de joyería de mayoreo con: anillos, aretes, pulseras, collares, cadenas, dijes, gargantillas, brazaletes y muy lindos sets.
	</div>
	<div class="conten Portal_l col-md-6 ">
		<img class="Portal_about_logo" src="assets/img/Portal_logo.png" alt="">
	</div>
	<div class="conten Portal_about col-md-3 ">
		Nuestro catálogo online esta enfocado a la venta de plata al mayoreo. Si buscas comprar joyeria para uso personal, verifica si alguna de nuestras sucursales de menudeo estan cerca de ti.
	</div>
</div>

<!--/.Información del Portal-->

<!--/.Productos Destacados-->

<div class="Portal_destacados col-md-12">
	<h1 class="col-md-12">Productos Destacados</h1>
	<h5 class="col-md-6 col-md-offset-3">Te presentamos la joyería que más ventas a tenido y las favoritas de nuestros clientes</h5>
</div>
<div class="Portal_vercatalogo col-md-12">
	<div class="Portal_divbtn col-md-2 col-md-offset-5">
		<button class="btn Portal_catalogo_ col-md-12">VER CATALOGO</button>
	</div>
</div> 
<!--/.Productos Destacados-->

<!--/.Productos a la venta-->
<!--/.Productos a la venta-->
<!--/.Productos a la venta-->
<div class="Portal_productos col-md-12">
	<div class="row col" id="Portal_cards">
		<div class="col-md-3">
			<div class="card">
				   <!--Card image-->
			    <div class="view overlay hm-white-slight">
			        <img src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20%2851%29.jpg" class="img-fluid" alt="">
			        <a>
			            <div class="mask waves-effect waves-light"></div>
			        </a>

			    </div>
			    <div class="card-block">
			        <h4 class="card-title fa fa-shopping-bag fa-lg">&nbsp;&nbsp;Agregar a mi carrito</h4>
			    </div>
			    <!--/.Card content-->
			</div>
		</div>
		<div class="col-md-3">
			<div class="card">
				   <!--Card image-->
			    <div class="view overlay hm-white-slight">
			        <img src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20%2851%29.jpg" class="img-fluid" alt="">
			        <a>
			            <div class="mask waves-effect waves-light"></div>
			        </a>

			    </div>
			    <div class="card-block">
			        <h4 class="card-title fa fa-shopping-bag fa-lg">&nbsp;&nbsp;Agregar a mi carrito</h4>
			    </div>
			    <!--/.Card content-->
			</div>
		</div>
		<div class="col-md-3">
			<div class="card">
				   <!--Card image-->
			    <div class="view overlay hm-white-slight">
			        <img src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20%2851%29.jpg" class="img-fluid" alt="">
			        <a>
			            <div class="mask waves-effect waves-light"></div>
			        </a>

			    </div>
			    <div class="card-block">
			        <h4 class="card-title fa fa-shopping-bag fa-lg">&nbsp;&nbsp;Agregar a mi carrito</h4>
			    </div>
			    <!--/.Card content-->
			</div>
		</div>
		<div class="col-md-3">
			<div class="card">
				   <!--Card image-->
			    <div class="view overlay hm-white-slight">
			        <img src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20%2851%29.jpg" class="img-fluid" alt="">
			        <a>
			            <div class="mask waves-effect waves-light"></div>
			        </a>

			    </div>
			    <div class="card-block">
			        <h4 class="card-title fa fa-shopping-bag fa-lg">&nbsp;&nbsp;Agregar a mi carrito</h4>
			    </div>
			    <!--/.Card content-->
			</div>
		</div>
		<div class="col-md-3">
			<div class="card">
				   <!--Card image-->
			    <div class="view overlay hm-white-slight">
			        <img src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20%2851%29.jpg" class="img-fluid" alt="">
			        <a>
			            <div class="mask waves-effect waves-light"></div>
			        </a>

			    </div>
			    <div class="card-block">
			        <h4 class="card-title fa fa-shopping-bag fa-lg">&nbsp;&nbsp;Agregar a mi carrito</h4>
			    </div>
			    <!--/.Card content-->
			</div>
		</div>
		<div class="col-md-3">
			<div class="card">
				   <!--Card image-->
			    <div class="view overlay hm-white-slight">
			        <img src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20%2851%29.jpg" class="img-fluid" alt="">
			        <a>
			            <div class="mask waves-effect waves-light"></div>
			        </a>

			    </div>
			    <div class="card-block">
			        <h4 class="card-title fa fa-shopping-bag fa-lg">&nbsp;&nbsp;Agregar a mi carrito</h4>
			    </div>
			    <!--/.Card content-->
			</div>
		</div>
		<div class="col-md-3">
			<div class="card">
				   <!--Card image-->
			    <div class="view overlay hm-white-slight">
			        <img src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20%2851%29.jpg" class="img-fluid" alt="">
			        <a>
			            <div class="mask waves-effect waves-light"></div>
			        </a>

			    </div>
			    <div class="card-block">
			        <h4 class="card-title fa fa-shopping-bag fa-lg">&nbsp;&nbsp;Agregar a mi carrito</h4>
			    </div>
			    <!--/.Card content-->
			</div>
		</div>
		<div class="col-md-3">
			<div class="card">
				   <!--Card image-->
			    <div class="view overlay hm-white-slight">
			        <img src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20%2851%29.jpg" class="img-fluid" alt="">
			        <a>
			            <div class="mask waves-effect waves-light"></div>
			        </a>

			    </div>
			    <div class="card-block">
			        <h4 class="card-title fa fa-shopping-bag fa-lg">&nbsp;&nbsp;Agregar a mi carrito</h4>
			    </div>
			    <!--/.Card content-->
			</div>
		</div>
	</div>
</div>
<!--/.Productos a la venta-->
<!--/.Productos a la venta-->
<!--/.Productos a la venta-->


<!--/.Carousel Wrapper-->

<!---- Carrousel ----> 







	
	<!-- Inicio de la landig -->
	    
	<!-- ./Fin de la landig -->
@stop

<!---- Javascripts ---->
@section('js')
  <script type="text/javascript" src="assets/js/landing.js" charset="utf-8"></script>
@stop

