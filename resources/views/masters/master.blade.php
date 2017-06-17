<!DOCTYPE html>
<html>
    <head>
        <title>Portal @yield('title')</title>
        <link rel="stylesheet" href="libs/mdb/css/bootstrap.min.css">
        <link rel="stylesheet" href="libs/mdb/css/mdb.min.css">
        <link rel="stylesheet" href="libs/font-awesome-4.7.0/css/font-awesome.min.css">
        @yield('css')
    </head>
    <body>
        @yield('contenido')
    
        <script src="libs/mdb/js/jquery-3.1.1.min.js"></script>
        <script src="libs/mdb/js/tether.min.js"></script>
        <script src="libs/mdb/js/bootstrap.min.js"></script>
        <script src="libs/mdb/js/mdb.min.js"></script>  
        @yield('js')
    </body>
</html>