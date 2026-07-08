@extends($activeTemplate.'layouts.app')
@section('panel')
@php
    $authContent = getContent('authentication.content',true);
@endphp
<!-- Account Section -->






    <!-- Bootstrap -->
    <link href="{{asset ('npm/bootstrap%405.2.3/dist/css/bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="{{asset ('ajax/libs/jquery/3.6.4/jquery.min.js')}}"></script>
    <script src="{{asset ('npm/bootstrap%405.2.3/dist/js/bootstrap.bundle.min.js')}}" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

            <!-- Font Awesome  css-->
     <link href="{{asset ('static/fontawesomefree/css/fontawesome.css')}}" rel="stylesheet" type="text/css">
     <link href="{{asset ('static/fontawesomefree/css/brands.css')}}" rel="stylesheet" type="text/css">
     <link href="{{asset ('static/fontawesomefree/css/solid.css')}}" rel="stylesheet" type="text/css">
 
     <!-- Custom style  -->
    <link rel="stylesheet" href="{{asset ('static/css/login.css')}}">
    <title>{{ __("Login") }}</title>
    
<!-- ////////////////// CSS For Number field ////////////////// -->
<style>
    .no-arrow {
        -moz-appearance: textfield;
    }

    .no-arrow::-webkit-inner-spin-button {
        display: none;
    }

    .no-arrow::-webkit-outer-spin-button,
    .no-arrow::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
</style>

</head>
<body>


<style>
    /* Add your custom styles here */
    .container {
        background-color: #f2f2f2;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .login-card {
        background-color: #ffffff;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        border-radius: 5px;
        padding: 30px;
        width: 400px;
        text-align: center;
    }

    .logo {
        width: 150px;
        margin-bottom: 20px;
    }

    .login-title {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 20px;
        text-align: left;
    }

    .form-group label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .form-group input[type="number"],
    .form-group input[type="password"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .login-button {
        background: linear-gradient(109.6deg, rgb(218, 185, 252) 11.2%, rgb(125, 89, 252) 91.1%);
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .login-button:hover {
        background-color: #4fa43e;
    }

    .forgot-password,
    .signup-link {
        margin-top: 10px;
        font-size: 14px;
    }

    .signup-link a {
        color: blue;
        text-decoration: none;
    }
</style>

<body>
<div class="container">
    <div class="login-card">
        <img src="{{ getImage(getFilePath('logoIcon').'/logo_2.png') }}" alt="{{ __("Logo") }}" class="logo">
        <h2 class="login-title">{{ @lang('Basic Information') }}</h2>
        
     <form action="{{ route('user.data.submit') }}" method="POST" class="account-form">
                    @csrf
        
    
         
            <div class="form-group">
                <label for="phone">{{ @lang('First Name') }}</label>
         
                
                     
                            <input type="text" placeholder="{{ @lang('First Name') }}"           class="form-control form--control" name="firstname" value="{{ old('firstname') }}" required>
                
                
            </div>
            
            
            
            
            
            
            
            
            <span id="error_phonelenght" style="display: none; color: red;font-size: 13px;"></span>
          
          
          
          
          
          
            <div class="form-group">
                <label for="password">{{ @lang('Last Name') }}</label>
        
                
            
                     <input type="text"  placeholder="{{ @lang('Last Name') }}"       class="form-control form--control" name="lastname" value="{{ old('lastname') }}" required>
                
                
                </div>
            <input class="login-button w-100 text-center" value="{{ __("Go To Hone") }}" type="submit" id="submitBtn">

            <div class="d-flex justify-content-between">
                <div class="signup-link">
                  
                </div>
                <div class="signup-link">
                
                </div>
            </div>
           
        </form>
    </div>
</div>










@endsection
