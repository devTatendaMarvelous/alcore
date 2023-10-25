<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <!-- Scripts -->
    <!-- bootstrap css -->
    <link id="rtl-link" rel="stylesheet" type="text/css" href="{{asset('frontend/css/vendors/bootstrap.css')}}">

    <!-- wow css -->
    <link rel="stylesheet" href="{{asset('frontend/css/animate.min.css')}}" />

    <!-- font-awesome css -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/vendors/font-awesome.css')}}">

    <!-- feather icon css -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/vendors/feather-icon.css')}}">

    <!-- slick css -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/vendors/slick/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/vendors/slick/slick-theme.css')}}">

    <!-- Iconly css -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/bulk-style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/vendors/animate.css')}}">

    <!-- Template css -->
    <link id="color-link" rel="stylesheet" type="text/css" href="{{asset('frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{ URL::to('toastr.min.css') }}">
    <script src="{{ URL::to('toastr_jquery.min.js') }}"></script>
    <script src="{{ URL::to('toastr.min.js') }}"></script>




</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand row" href="{{ url('/') }}">
                <div class="col-md-4">
                    <img src="{{asset('logo.png')}}" width="80" >
                </div>
                <h3 class="col-md-8 text-700">Gadget Management System</h3>

            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else

                        <li class="nav-item">
                            <a class="nav-link" href="/clients">{{ __('Clients') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/gadgets">{{ __('Gadgets') }}</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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
    </nav>

    <main class="py-4">
        <div class="d-flex align-content-center">
            <div class="justify-content">

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
            </div>
        </div>
        @yield('content')
    </main>
</div>



<!-- latest jquery-->
<script src="{{asset('frontend/js/jquery-3.6.0.min.js')}}"></script>

<!-- jquery ui-->
<script src="{{asset('frontend/js/jquery-ui.min.js')}}"></script>

<!-- Bootstrap js-->
<script src="{{asset('frontend/js/bootstrap/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('frontend/js/bootstrap/bootstrap-notify.min.js')}}"></script>
<script src="{{asset('frontend/js/bootstrap/popper.min.js')}}"></script>

<!-- feather icon js-->
<script src="{{asset('frontend/js/feather/feather.min.js')}}"></script>
<script src="{{asset('frontend/js/feather/feather-icon.js')}}"></script>

<!-- Lazyload Js -->
<script src="{{asset('frontend/js/lazysizes.min.js')}}"></script>

<!-- Slick js-->
<script src="{{asset('frontend/js/slick/slick.js')}}"></script>
<script src="{{asset('frontend/js/slick/slick-animation.min.js')}}"></script>
<script src="{{asset('frontend/js/slick/custom_slick.js')}}"></script>

<!-- Auto Height Js -->
<script src="{{asset('frontend/js/auto-height.js')}}"></script>

<!-- Timer Js -->
<script src="{{asset('frontend/js/timer1.js')}}"></script>

<!-- Fly Cart Js -->
<script src="{{asset('frontend/js/fly-cart.js')}}"></script>

<!-- Quantity js -->
<script src="{{asset('frontend/js/quantity-2.js')}}"></script>

<!-- WOW js -->
<script src="{{asset('frontend/js/wow.min.js')}}"></script>
<script src="{{asset('frontend/js/custom-wow.js')}}"></script>

<!-- script js -->
<script src="{{asset('frontend/js/script.js')}}"></script>

<!-- thme setting js -->
<script src="{{asset('frontend/js/theme-setting.js')}}"></script>


</body>
</html>
