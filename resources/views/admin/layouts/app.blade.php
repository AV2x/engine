<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Prometium</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css"
    />
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="{{asset('bootstrap-5.2.0-dist/css/bootstrap.css')}}">
    <script type="text/javascript" src="/ckeditor/ckeditor.js"></script>
    <style>
        #sidebar a {
            text-decoration: none;
        }
    </style>
</head>
<body class="antialiased">
<div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar">
        <div class="custom-menu">
            <button type="button" id="sidebarCollapse" class="btn btn-primary">
                <i class="fa fa-bars"></i>
                <span class="sr-only">Toggle Menu</span>
            </button>
        </div>
        <div class="img bg-wrap text-center py-4" style="background-image: url(/images/bg_1.jpg);">
            <div class="user-logo">
                <div class="img" style="background-image: url('{{asset('/storage/images/avatars/'.Auth::user()->avatar)}}');"></div>
                <h3>{{Auth::user()->name}}</h3>
            </div>
        </div>
        <ul class="list-unstyled components mb-5">
            <li class="active">
                <a href="/admin"><span class="fa fa-cart-plus mr-3 notif"><small class="d-flex align-items-center justify-content-center">5</small></span>Заказы</a>
            </li>
            {{--            <li>--}}
            {{--                <a href="#"><span class="fa fa-download mr-3 notif"><small class="d-flex align-items-center justify-content-center">5</small></span> Download</a>--}}
            {{--            </li>--}}
            <li>
                <a href="/admin/categories"><span class="fa fa-cloud mr-3"></span>Категории</a>
            </li>
            <li>
                <a href="/admin/services"><span class="fa fa-usd mr-3"></span>Услуги</a>
            </li>
            <li>
                <a href="/admin/products"><span class="fa fa-usd mr-3"></span>Товары</a>
            </li>
            <li>
                <a href="/admin/users"><span class="fa fa-user-circle-o mr-3"></span>Пользователи</a>
            </li>
            <li>
                <a href="/admin/site"><span class="fa fa-pencil-square mr-3"></span>Сайт</a>
            </li>
            <li>
                <a href="/admin/tasks"><span class="fa fa-commenting mr-3"></span>Поддержка</a>
            </li>
            <li>
                <a href="/logout"><span class="fa fa-sign-out mr-3"></span>Выйти</a>
            </li>
        </ul>

    </nav>

    <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5 pt-5">
        @yield('content')
    </div>
</div>

<script src="/js/jquery.min.js"></script>
<script src="/js/popper.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/main.js"></script>


<script type="text/javascript" src="{{asset('bootstrap-5.2.0-dist/js/bootstrap.bundle.js')}}"></script>
<script
    src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js">
</script>

<script
    src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js">
</script>
</body>
</html>
