<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar has-shadow">
            <div class="container">
                <div class="navbar-start">
                    <a class="navbar-item" href="{{ route('home') }}">
                        <img src="{{ asset('image/logo.png') }}" alt="Logo">
                    </a>
                    <a href="#" class="navbar-item is-tab is-hidden-mobile m-l-10">Learn</a>
                    <a href="#" class="navbar-item is-tab is-hidden-mobile">Discuss</a>
                    <a href="#" class="navbar-item is-tab is-hidden-mobile">Share</a>
                </div>
                <div class="navbar-end" style="overflow: visible;">
                    @if(Auth::guest())
                    <a href="{{ route('login') }}" class="navbar-item is-tab">Login</a>
                    <a href="{{ route('register') }}" class="navbar-item is-tab">Join Our Community</a>
                    @else
                    <button id="hia" class="dropdown is-aligned-right navbar-item is-tab">
                        Hey Phoud <span class="icon"><i class="fa fa-caret-down"></i></span>
                        <ul class="dropdown-menu">
                            <li><a href="#">
                            <span class="icon"><i class="fa fa-fw m-r-10 fa-user-circle-o"></i></span>
                            Profile</a></li>
                            <li><a href="#">
                            <span class="icon"><i class="fa fa-fw m-r-10 fa-bell"></i></span>
                            Notification</a></li>
                            <li><a href="#">
                            <span class="icon"><i class="fa fa-fw m-r-10 fa-cog"></i></span>
                            Settings</a></li>
                            <li class="seperator"></li>
                            <li><a href="#">
                            <span class="icon"><i class="fa fa-fw m-r-10 fa-sign-out"></i></span>
                            Logout</a></li>
                        </ul>
                    </button>
                    @endif
                </div>
               
            </div>
             </nav>
             @yield('content')
        </div>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

</body>
</html>
