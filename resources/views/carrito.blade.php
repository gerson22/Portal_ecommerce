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
    @foreach($productos as $producto)

    @endforeach
  </div>
</div>
@endif
<!--/. End container -->
@stop



<!---- Javascripts ---->
@section('js')
  <script type="text/javascript" src="assets/js/landing.js" charset="utf-8"></script>
@stop

