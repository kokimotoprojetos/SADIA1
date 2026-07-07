@php
    $promotionCount = App\Models\PromotionTool::count();
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    
    <link rel="icon" type="image/png" href="/static/images/logo.png">
    

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>

    <!-- Font Awesome  css-->
    <link href="{{asset ('core/fontawesome.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset ('core/brands.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset ('core/solid.css')}}" rel="stylesheet" type="text/css">

    <!-- Custom style  -->
    <!-- <link rel="stylesheet" href="/static/css/responsives.css"> -->
    <link rel="stylesheet" href="{{asset ('core/styles.css')}}">








    <!-- style.css -->
    <style>
        @import url('https://fonts.googleapis.com/css?family=Rajdhani:300,400,500,600,700');
        @import url('https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i');
        @import url('https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i');
        @import url('https://fonts.googleapis.com/css?family=Open+Sans:400,600,600i,700,700i,800,800i&display=swap');
        @import url("/static/css/owl.carousel.min.css");

        .bottom-navbar {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: whitesmoke;
            color: #333;
            padding: 10px;
            border-radius: 15px 15px 0px 0px;
        }

        .scrollable-div {
            max-height: 40vh;
            overflow-y: auto;
        }

        .badge-notification {
            position: relative;
            top: -8px;
            left: -47px;
            border: 1px solid black;
            border-radius: 50%;
            font-size: 9px;
        }

        /* Styles for the preloader */
        #preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            backdrop-filter: blur(10px);
            z-index: 9999;
            display: flex;
            justify-content: center;
            align-items: center;
            color: black
        }

        /* Styles for the blurred background */
        #blurred-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            backdrop-filter: blur(2px);
            z-index: 9998;
        }

        .nav-hover:hover {
            border-bottom: 3px solid #9bab07
        }
    </style>

    <title>
        
        xindun
        
        -  Home
    </title>
    <script>
        document.onreadystatechange = function () {
            var state = document.readyState;
            if (state == "interactive") {
                // Show the preloader when the page starts loading
                showPreloader();
            } else if (state == "complete") {
                // Hide the preloader when the page finishes loading
                hidePreloader();
            }
        };

        function showPreloader() {
            document.getElementById("preloader").style.display = "flex";
            document.getElementById("blurred-background").style.display = "block";
        }

        function hidePreloader() {
            document.getElementById("preloader").style.display = "none";
            document.getElementById("blurred-background").style.display = "none";
        }

    </script>
</head>

<body class="main-layout m-0 p-0">
    <!-- loader  -->
    <div id="preloader">
        <i class="fa-regular fa-loader fa-flip fa-10x"></i>
        <div class="loader"><img src="{{asset ('core/img/preview.gif')}}" alt="" style="height: 80; width: 80px;"></div>
    </div>
    <!-- end loader -->

    <header class="m-0 p-o px-3" style="background-color: white;  top: 0;">
        <!-- header inner -->
        <div class="head-top m-0 p-0">
            <div class="">
                <div class="d-flex justify-content-between">
                
                    <div class="profile_info align-self-center">
                        <div class="dropdown">
                 <h1 style="font-family: unset;">{{ @lang('Hello') }}</h1>

                        </div>
                    </div>
                    <div class="logo" style="width: 120px;">
                        
                        <a href="{{ route('user.home') }}"><img src="{{ getImage(getFilePath('logoIcon').'/logo_2.png') }}" /></a>
                        
                    </div>
                </div>
    </header>
    <div class="navbar-bottom">
        <nav class="bottom-navbar mt-5">
            <ul>
                <li class="nav-hover"><a href="{{ route('user.home') }}"><img src="{{asset ('core/img/home.jpg')}}"></i><strong></strong></a></li>
                <!-- <li><a href="/withdraw/"><i class="fa-solid fa-wallet"></i>{{ @lang('Withdraw') }}</a></li> -->
                <li class="nav-hover"><a href="{{ route('user.invest.statistics') }}"><img src="{{asset ('core/img/project.jpg')}}"></i><strong></strong></a></li>
                <li class="nav-hover"><a href="{{ route('user.referrals') }}"><img src="{{asset ('core/img/pl.jpg')}}"></i><strong></strong></a></li>
                <li class="nav-hover"><a href="{{ route('user.twofactor') }}"><img src="{{asset ('core/img/mine.jpg')}}"></i><strong></strong></a></li>
            </ul>
        </nav>
    </div>
    <!-- end header -->
    <br><br>
    