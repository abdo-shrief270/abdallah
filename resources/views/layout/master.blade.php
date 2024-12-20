<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>{{env("APP_NAME")}}</title>
    <link rel="icon" type="image/x-icon" href="{{asset("assets/img/favicon.ico")}}"/>
    <link href="{{asset("assets/css/loader.css")}}" rel="stylesheet" type="text/css" />
    <script src="{{asset("assets/js/loader.js")}}"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="{{asset("bootstrap/css/bootstrap.min.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{asset("assets/css/plugins.css")}}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    @yield('head')
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

</head>
<body class="alt-menu sidebar-noneoverflow">
<!-- BEGIN LOADER -->
<div id="load_screen"> <div class="loader"> <div class="loader-content">
            <div class="spinner-grow align-self-center"></div>
        </div></div></div>
<!--  END LOADER -->
@include('layout.navbar')

<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container" id="container">

    <div class="overlay"></div>
    <div class="search-overlay"></div>
<!--  BEGIN CONTENT PART  -->
@yield('content')
<!--  END CONTENT PART  -->
    <div class="footer-wrapper">
        <div class="footer-section f-section-1">
            <p class="">Copyright © 2025 <a class="text-primary" target="_blank" href="https://github.com/abdo-shrief270">Abdo Shrief</a>, All rights reserved.</p>
        </div>
    </div>
</div>
</div>
<!-- END MAIN CONTAINER -->
@include('layout.footer')
