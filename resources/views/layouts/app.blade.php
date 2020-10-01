<!DOCTYPE hmtl>
<html>
    <head>
        <title> AbdullRahman Ismael </title>
        <!-- Meta -->
        <meta charset="utf-8">
        <!-- IE Compatibility Meta -->
        <meta http-equiv="X-UA-Compatibale" content="IE-=edge">
        <!-- Mobile meta-->
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <!-------------------------------------- start favicon  -----------------------------> 
        <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('images/favicon/apple-icon-57x57.png')}}" >
        <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('images/favicon/apple-icon-60x60.png')}}" >
        <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('images/favicon/apple-icon-72x72.png')}}" >
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('images/favicon/apple-icon-76x76.png')}}" >
        <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('images/favicon/apple-icon-114x114.png')}}" >
        <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('images/favicon/apple-icon-120x120.png')}}" >
        <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('images/favicon/apple-icon-144x144.png')}}" >
        <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('images/favicon/apple-icon-152x152.png')}}" >
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/favicon/apple-icon-180x180.png')}}" >
        <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('images/favicon/android-icon-192x192.png')}}" >
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon/favicon-32x32.png')}}" >
        <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('images/favicon/favicon-96x96.png')}}" >
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon/favicon-16x16.png')}}" >
        <link rel="manifest" href="{{ asset('images/favicon/manifest.json')}}" >
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="images/favicon/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff"> 
        <!-------------------------------------- End favicon  ------------------------------->  
        <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=El+Messiri&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.css')}}" >
        <link rel="stylesheet" href="{{ asset('css/custom.css')}}" >
    </head>
    <body data-spy="scroll" data-target=".navbar-fixed-top" data-offset="65" >


        <div id="app">
            <!----- Page Content ------>
            @yield('content')
        </div>

        <!-- App -->
        <script src="{{ asset("js/app.js") }}" ></script>
        
        <!-- JQUERY Framwork -->
        <script src="{{ asset('js/jquery.js')}}"></script>

        <!-- bootstrap Framwork -->
        <script src="{{ asset('js/bootstrap.js')}}"></script>

        <!-- Custom File -->
        <script src="{{ asset('js/custom.js')}}"></script>

    </body>


</html>


