<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link href="/css/app.css" rel="stylesheet">
    <script src="js/app.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"
        integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"
        integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous">
    </script>

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{route('index')}}">
                    Вернуться на сайт
                </a>

                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li @routeactive('categories.index')><a href="{{route('categories.index')}}">Категории</a></li>
                        <li @routeactive('products.index')><a href="{{route('products.index')}}">Товары</a>
                        </li>
                        <li @routeactive('orders.index')><a href="{{route('orders.index')}}">Заказы</a></li>
                        <li><a href="{{route('admin.reset')}}">Сбросить проект в начальное состояние</a></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        @guest
                            <li><a href="{{ route('login') }}">Войти</a></li>
                        @endguest
                        @auth
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <li><button type="submit">Выйти</button></li>
    
                            </form>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>

        <div class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">@yield('title')</div>

                            <div class="card-body">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
