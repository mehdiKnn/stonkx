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
    @trixassets
</head>
<body>

<div id="app">
    <nav class="navbar navbar-expand-md navbar-light">
        <div class="container">
            <h2 class="font-weight-bold" href="{{ url('/') }}">
                <a class="nav-link text-dark"
                   href="{{route('welcome')}}">{{ config('app.name', 'Laravel') }} Admin</a>

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
                <ul id="navbar"
                    class="navbar-nav align-items-center justify-content-around w-50">
                    <li class="nav-item">
                        <a class="nav-link text-dark"
                           href="{{route('admin.user.index')}}">Users</a></li>

                    <li class="nav-item">
                        <a class="nav-link text-dark"
                           href="{{route('admin.news.index')}}">News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark"
                           href="{{route('admin.brands.index')}}">Brands</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark"
                           href="{{route('admin.order.index')}}">Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark"
                           href="{{route('admin.products.index')}}">Products</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="pt-4">
        @yield('content')
    </main>

</body>

</html>


