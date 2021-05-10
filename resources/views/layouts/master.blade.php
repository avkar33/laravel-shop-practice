
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link href="/css/app.css" rel="stylesheet">
    <script src="js/app.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

</head>

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{route('index')}}">Интернет Магазин</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="{{route('index')}}">Все товары</a></li>
                    <li class="active"><a href="{{route('categories')}}">Категории</a>
                    </li>
                    <li><a href="{{route('basket')}}">В корзину</a></li>
                    <li><a href="/reset">Сбросить проект в начальное состояние</a></li>
                    <li><a href="/locale/en">en</a></li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                            aria-expanded="false">₽<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="http://internet-shop.tmweb.ru/currency/RUB">₽</a></li>
                            <li><a href="http://internet-shop.tmweb.ru/currency/USD">$</a></li>
                            <li><a href="http://internet-shop.tmweb.ru/currency/EUR">€</a></li>
                        </ul>
                    </li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="/login">Войти</a></li>

                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
</body>

</html>
