<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="/js/app.js" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito"
          rel="stylesheet">

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light">
        <div class="container">
            <h2 class="font-weight-bold" href="{{ url('/') }}">
                <a class="nav-link text-dark"
                   href="{{route('welcome')}}">{{ config('app.name', 'Laravel') }}</a>

            </h2>
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end"
                 id="navbarSupportedContent">
                <!-- Right Side Of Navbar -->
                <ul id="navbar" class="navbar-nav align-items-center justify-content-around w-50">

                    <li class="nav-item">
                        <a class="nav-link text-dark"
                           href="{{route('welcome')}}">Home</a></li>
                    <li class="nav-item dropdown text">
                        <a class="nav-link dropdown-toggle text-dark" href="#"
                           id="navbarDropdownMenuLink" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            Sneakers
                        </a>
                        <div class="dropdown-menu"
                             aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item"
                               href="{{route('products.index')}}">All
                                Sneakers</a>

                            @foreach($brands as $brand)
                                <a class="dropdown-item"
                                   href="{{route('brand.show', $brand->id)}}">{{$brand->name}}</a>
                            @endforeach
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{route('news.index')}}">News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{route('contact.form')}}">Contact</a>
                    </li>
                    @guest
                        <li class="nav-item">
                            <button class="nav-link btn btn-dark">
                                <a class="text-light"
                                   href="{{ route('login') }}">{{ __('Login') }}</a>
                            </button>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <button class="nav-link btn btn-warning">
                                    <a class=" text-dark"
                                       href="{{ route('register') }}">{{ __('Register') }}</a>
                                </button>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown"
                               class="nav-link dropdown-toggle" href="#"
                               role="button" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span
                                    class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right"
                                 aria-labelledby="navbarDropdown">
                                <a class="dropdown-item"
                                   href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form"
                                      action="{{ route('logout') }}"
                                      method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="pt-4">
        @yield('content')
    </main>
</div>
</body>

</html>
