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
	    <div class="carousel-item">
            <div class="view hm-black-strong">
                <img class="carousel_img" src="assets/img/fondo2.jpg" alt="Second slide">
            </div>
            <div class="carousel-caption Portal_titles">
                <h6 class="h6-responsive">Calidad en cada uno de nuestros productos</h6>            
                <h1 class="h1-responsive">Accesorios para cualquier ocasión</h1>
                <button class="btn btn-warning Portal_catalogo">VER CATALOGO</button>
            </div>
        </div>
        <div class="carousel-item">
            <div class="view hm-black-slight">
                <img class="carousel_img" src="assets/img/fondo3.jpg" alt="Third slide">
            </div>
            <div class="carousel-caption Portal_titles">
                <h6 class="h6-responsive">Calidad en cada uno de nuestros productos</h6>            
                <h1 class="h1-responsive">Accesorios para cualquier ocasión</h1>
                <button class="btn btn-warning Portal_catalogo">VER CATALOGO</button>
            </div>
        </div>
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

<!--/.Productos a la venta-->
<div class="Portal_productos container ">
	<div class="row ">
		<div class="Portal_destacados col-md-12">
			<h1 class="col-md-12">Productos Destacados</h1>
			<h5 class="col-md-6 col-md-offset-3">Te presentamos la joyería que más ventas a tenido y las favoritas de nuestros clientes</h5>
		</div>
		<div class="Portal_vercatalogo col-md-12">
			<div class="Portal_divbtn col-md-2 col-md-offset-5">
				<button class="btn Portal_catalogo_ col-md-12">VER CATALOGO</button>
			</div>
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
			        <h4 class="card-title fa fa-shopping-bag fa-lg">&nbsp;&nbsp;Agregar a mi carrito</h4>
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
			        <h4 class="card-title fa fa-shopping-bag fa-lg">&nbsp;&nbsp;Agregar a mi carrito</h4>
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
			        <h4 class="card-title fa fa-shopping-bag fa-lg">&nbsp;&nbsp;Agregar a mi carrito</h4>
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
			        <h4 class="card-title fa fa-shopping-bag fa-lg">&nbsp;&nbsp;Agregar a mi carrito</h4>
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
			        <h4 class="card-title fa fa-shopping-bag fa-lg">&nbsp;&nbsp;Agregar a mi carrito</h4>
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
			        <h4 class="card-title fa fa-shopping-bag fa-lg">&nbsp;&nbsp;Agregar a mi carrito</h4>
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
			        <h4 class="card-title fa fa-shopping-bag fa-lg">&nbsp;&nbsp;Agregar a mi carrito</h4>
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
			        <h4 class="card-title fa fa-shopping-bag fa-lg">&nbsp;&nbsp;Agregar a mi carrito</h4>
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
		<div class="mult_opciones col-md-12">
			<div class="mask col-md-12">
				<p class="text_opciones">MULTIPLES OPCIONES</p>
				<p class="text_descripcion">Contamos con los mejores proveedores, para llevarte gran diversidad en joyería mexicana</p>
			</div>		
		</div>
	</div>
	<div class="row col-md-12 Portal_proves">
		<div class="col-md-6 Portal_imgProve">
			<img class="" src="assets/img/Prove_kuyén.png" alt="">
			<button class="btn btn-warning Portal_catalogo">VER PRODUCTOS</button>	
		</div>
		<div class="col-md-6 Portal_imgProve">
			<img class="" src="assets/img/Prove_kuyén.png" alt="">
			<button class="btn btn-warning Portal_catalogo">VER PRODUCTOS</button>
		</div>
	</div>
</div>
<!--/.Proveedores joyeria-->


<!--/.Proveedores joyeria-->
<div class="Portal_Ubicación container">

	<div class="row Portal_Ubi">
		<p class="text_ubicacion">Nuestra Ubicación</p>
		<hr class="Portal_divi">
		<div class="col-md-12 Portal_Mapa">

			<iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d3599.8885587058753!2d-103.41710958539717!3d25.54208878373701!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1scuriosity+boulevard+diagonal+reforma+san+marcos+torre%C3%B3n!5e0!3m2!1ses-419!2smx!4v1499269901206" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>
	</div>
	<div class="row Portal_Ubi">
		<div class="Portal_Pie">
			<!--Footer-->
			<footer class="page-footer blue center-on-small-only">

			    <!--Footer Links-->
			    <div class="container-fluid Portal_Footer">
			        <div class="row">

			            <!--First column-->
			            <div class="col-md-3 box_">
			                <ul>
			                    <li><a href="#!">Socios</a></li>
			                    <li><a href="#!">Kuyén</a></li>
			                    <li><a href="#!">Nombre de otro Socio</a></li>
			                </ul>
			            </div>
			            <!--/.First column-->

			            <!--Second column-->
			            <div class="col-md-3 box_">
			                <ul>
			                    <li><a href="#!">Categorias</a></li>
			                    <li><a href="#!">Nombre categoría</a></li>
			                    <li><a href="#!">Nombre categoría</a></li>
			                </ul>
			            </div>
			            <div class="col-md-offset-2 col-md-1 Portal_iconsContact">
			                <i class="portal_info_icons fa fa-envelope-o fa-lg" aria-hidden="true"></i>
			            </div>
			            <div class="col-md-1 Portal_iconsContact">
			                <i class="portal_info_icons fa fa-facebook fa-lg" aria-hidden="true"></i>
			            </div>
			            <div class="col-md-1 Portal_iconsContact">
			                <i class="portal_info_icons fa fa-instagram fa-lg" aria-hidden="true"></i>
			            </div>
			            <!--/.Second column-->
			        </div>
			    </div>
			    <!--/.Footer Links-->

			    <!--Copyright-->
			    <div class="footer-copyright">
			        <div class="container-fluid derechos">
			            <a class="Portal_copyright" href="https://www.MDBootstrap.com">© 2017 Todos los derechos reservados | Portal Platería </a>
			            <i class="portal_info_icons fa fa-chevron-up fa-lg" aria-hidden="true"></i>			        
			        </div>
			    </div>
			    <!--/.Copyright-->

			</footer>
			<!--/.Footer-->
		</div>
	</div>
</div>
<!--/.Proveedores joyeria--> 
	<!-- Inicio de la landig -->
	    
	<!-- ./Fin de la landig -->
@stop

<!---- Javascripts ---->
@section('js')
  <script type="text/javascript" src="assets/js/landing.js" charset="utf-8"></script>
@stop

