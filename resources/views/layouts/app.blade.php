<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css"
    />
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('bootstrap-5.2.0-dist/css/bootstrap.css')}}">
</head>
<body class="antialiased">
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="/index" style="padding-right: 20px;">PrimeEngine</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link @yield('services')" style="font-size: 20px !important;" aria-current="page" href="/services">Автомобили</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('jobs')" style="font-size: 20px !important;" href="/jobs">Как арендовать</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('contacts')" style="font-size: 20px !important;" href="/contacts">Контакты</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('company')" style="font-size: 20px !important;" href="/company">О компании</a>
                    </li>
                </ul>
{{--                <span class="navbar-text">--}}
{{--        Navbar text with an inline element--}}
{{--      </span>--}}
            </div>
        </div>
    </nav>
</header>

@yield('content')
    @include('layouts.footer')
<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{asset('bootstrap-5.2.0-dist/js/bootstrap.bundle.js')}}"></script>
    <script
        src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js">
    </script>

    <script
        src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js">
    </script>
</body>
</html>
