<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Portal @yield('title')</title>
    <link rel="stylesheet" type="text/css" href="assets/css/landing.css">
    <link rel="shortcut icon"  href="assets/img/portal_logo.png">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="/libs/mdb/css/bootstrap.min.css">
    <link rel="stylesheet" href="/libs/mdb/css/mdb.min.css">
    <link rel="stylesheet" href="/libs/pnotify/pnotify.custom.min.css">
    <link rel="stylesheet" href="/assets/css/general.css">
    <link rel="stylesheet" href="{{url('/assets/css/libs.css')}}">

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
        .navbar-right > li{
            margin-top: .1rem;
            margin-bottom: .1rem;
        }
        .navbar-right > li:not(:last-child){
            border-right: 2px solid #2E2E2E;
        }
        .panel > .bg-y{
            background-color: #FFB400;
            color: #fff;
        }
        .form-group .form-control.pc:focus {
            outline: none !important;
            border-color: #fff;
            border-bottom-color: #2E2E2E;
            box-shadow: 0 0 .1px #2E2E2E;
        }
        .input-group .form-control.pc:focus {
            outline: none !important;
            border-color: #fff;
            border-bottom-color: #2E2E2E;
            box-shadow: 0 0 .1px #2E2E2E;
        }
        .file-path-wrapper .file-path.pc:focus {
            outline: none !important;
            border-color: #fff;
            border-bottom-color: #2E2E2E;
            box-shadow: 0 0 .1px #2E2E2E;
        }
        [type=checkbox]:checked+label:before{
            border-right: 2px solid #2E2E2E;
            border-bottom: 2px solid #2E2E2E;
        }
        a {color:#FFFFFF;}
        a:visited {color:#FFFFFF;}
        a:active {color:#FFB6C1;}
        a:hover {color:#FFFFFF;}
    </style>
    @yield('css')
</head>


<body id="fixed-sn blue-skin">

    @yield('navbar')


    <!-- JavaScripts -->
    <script src="/libs/mdb/js/jquery-3.1.1.min.js"></script>
    <script src="/libs/mdb/js/tether.min.js"></script>
    <script src="/libs/mdb/js/bootstrap.min.js"></script>
    <script src="/libs/mdb/js/mdb.min.js"></script>
    <script src="/assets/js/inputMask.js"></script>
    <script src="/libs/pnotify/pnotify.custom.min.js"></script>
    <script src="{{url('/assets/js/libs.js')}}"></script>
    <script>
        $(function(){
            $(document).ready(function() {
                fixBugMDB();
            });

            function fixBugMDB(){
                if($('span').hasClass('caret')){
                    $('span').removeClass('caret');
                }
            }
        });
    </script>
    @yield('jvs')
</body>
</html>
