<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- jQuery -->
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>

    <script>
        $(document).ready(function(){

            console.log("document loaded"),

            $('.track-line').hover(makeBigger, returnToOriginalSize);

            function makeBigger() {
                $(this).css({height: '+=5%', width: '+=5%'});
            }

            function returnToOriginalSize() {
                $(this).css({height: "", width: ""});
            }

            $(".shadow").hover(function()
            { 
                $(this).toggleClass('classWithShadow');
            })

            $('li.nav-item:not(.dropdown)').hover(white, returnBlue);

            function white () {
                $(this).addClass('bg-white rounded');
            }

            function returnBlue () {
                $(this).removeClass('bg-white rounded');
            }
        });
    </script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Courier+Prime&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-info shadow-sm h5">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <div class="d-inline-block">
                        <img src="/storage/app/img/logo.png" alt="" height="60" width="60">
                    </div>
                </a>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <div class="">
                            <form class="form-inline my-2 my-lg-0 ml-auto" action="{{route('search_song')}}" method="POST" accept-charset="UTF-8">
                                {{ csrf_field() }}
                                <input class="form-control" type="search" name="q" placeholder="Композиция..." aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="submit">
                                        <span class="fa fa-search"></span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav">
                        @if (auth()->check())

                            @if (auth()->user()->isAdmin())
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('users') }}">Пользователи</a>
                                </li>
                            @endif

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('songs') }}">Композиции</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('artists') }}">Исполнители</a>
                            </li>

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
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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
            @yield('content')
        </main>

        <footer class="py-4 mt-4 text-black-50 bg-info">
            <div class="container text-center">
                <a href="https://vk.com/traphustler" class="h5 nounderline text-dark"> 2019 Roman: VK.com</a>
            </div>
        </footer>
    </div>
</body>
</html>
