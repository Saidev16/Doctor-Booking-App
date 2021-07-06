<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Docbook</title>

    <!-- Scripts -->
    <script src="js/app.js" defer></script>

    <!---Datepicker--->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"defer></script>
  

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="css/app.css" rel="stylesheet">
    		<!-- Favicons -->
		{{-- <link type="image/x-icon" href="assets/img/favicon.png" rel="icon"> --}}
		<link type="image/x-icon" href="{{asset('assets/img/favicon.png')}}" rel="icon">
		
		<!-- Bootstrap CSS -->
		{{-- <link rel="stylesheet" href="assets/css/bootstrap.min.css"> --}}
		<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
		
		<!-- Fontawesome CSS -->
		{{-- <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css"> --}}
		<link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/fontawesome.min.css')}}">
		{{-- <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css"> --}}
		<link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/all.min.css')}}">
		
		<!-- Main CSS -->
		{{-- <link rel="stylesheet" href="assets/css/style.css"> --}}
		<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

</head>
<body>
    <div id="app">
        {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        @if(Auth::check()) 
                            @if(auth()->user()->role->name === 'patient')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('my.booking') }}">{{ __('My Bookings') }}</a>
                                </li>
                            @endif
                            @if(auth()->user()->role->name === 'patient')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('my.prescription') }}">{{ __('My Prescriptions') }}</a>
                                </li>
                            @endif
                        @endif
                        
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @if( auth()->check() && auth()->user()->role->name === 'patient')
                                        <a class="dropdown-item" href="{{ url('user-profile') }}">Profile</a>
                                   @else
                                        <a class="dropdown-item" href="{{ url('dashboard') }}">dashboard</a>
                                    @endif
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav> --}}

			<!-- Header -->
			<header class="header">
				<nav class="navbar navbar-expand-lg header-nav">
					<div class="navbar-header">
						<a id="mobile_btn" href="javascript:void(0);">
							<span class="bar-icon">
								<span></span>
								<span></span>
								<span></span>
							</span>
						</a>
						<a href="{{ url('/') }}" class="navbar-brand logo">
							<img src="{{asset('assets/img/logo.png')}}" class="img-fluid" alt="Logo">
						</a>
					</div>
					<div class="main-menu-wrapper">
						<div class="menu-header">
							<a href="index.html" class="menu-logo">
								<img src="assets/img/logo.png" class="img-fluid" alt="Logo">
							</a>
							<a id="menu_close" class="menu-close" href="javascript:void(0);">
								<i class="fas fa-times"></i>
							</a>
						</div>
						{{-- <ul class="main-nav">
							<li class="">
								<a href="index.html">Home</a>
							</li>
							<li class="login-link">
								<a href="login.html">Se connecter</a>
							</li>
							<li class="login-link">
								<a href="login.html">S'enregistrer</a>
							</li>
						</ul>		  --}}
					</div>		 
					<ul class="nav header-navbar-rht" style="margin-right:22px ;">
                        @if(Auth::check()) 
                            @if(auth()->user()->role->name === 'patient')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('my.booking') }}">{{ __('My Bookings') }}</a>
                                </li>
                            @endif
                            @if(auth()->user()->role->name === 'patient')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('my.prescription') }}">{{ __('My Prescriptions') }}</a>
                                </li>
                            @endif
                        @endif

                        <!-- Authentication Links -->
                        @guest
                            <a href="{{route('doctor.register')}}"> 
                                <button class="btn btn-primary mr-4" >vous êtes professionnel de santé ?</button>
                            </a>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                                    @if( auth()->check() && auth()->user()->role->name === 'patient')
                                        <a class="dropdown-item" href="{{ url('user-profile') }}">Profile</a>
                                   @else
                                        <a class="dropdown-item" href="{{ url('dashboard') }}">dashboard</a>
                                    @endif
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                         
                        @endguest
											
					</ul>
					
				
					
				</nav>
			</header>
			<!-- /Header -->
    <div class="main-wrapper">
        <main>
            @yield('content')
        </main>
    </div>


    </div>

    <style>
        body{
            background:#fff;
        }
        label.btn{
            padding: 0;
        }
        label.btn input{
            opacity: 0;
            position: absolute;
        }
        label.btn span{
            text-align: center;
            padding: 6px 12px;
            display: block;
            min-width: 80px;
        }
        label.btn input:checked + span{
            background-color: rgb(80, 110, 228);
            color: #fff;
        }
    </style>
        
    <script>
        var dateToday = new Date();
        $( function() {
            $('#datepicker').datepicker({
                dateFormat:'yy-mm-dd',
                showButtonPanel : true,
                numberOfMonths: 2,
                minDate: dateToday,
            });
        });
    </script>
    		<!-- jQuery -->
		<script src="{{asset('assets/js/jquery.min.js')}}"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="{{asset('assets/js/popper.min.js')}}"></script>
		<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
		
		<!-- Slick JS -->
		<script src="{{asset('assets/js/slick.js')}}"></script>
		
		<!-- Custom JS -->
		<script src="{{asset('assets/js/script.js')}}"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
      
</body>
</html>
