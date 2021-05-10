@extends('layouts.master')

@section('title', 'Товар')

@section('content')
    <div class="container">
        <div class="starter-template">
            <h1>iPhone X 64GB</h1>
            <h2>{{$product}}</h2>
            <p>Цена: <b>71990 ₽</b></p>
            <img src="http://internet-shop.tmweb.ru/storage/products/iphone_x.jpg">
            <p>Отличный продвинутый телефон с памятью на 64 gb</p>

            <form action="http://internet-shop.tmweb.ru/basket/add/1" method="POST">
                <button type="submit" class="btn btn-success" role="button">Добавить в корзину</button>

                <input type="hidden" name="_token" value="kl4dkt26jzaasYQBTpBYO9myFLI2ewKz22h3ZOix">
            </form>
        </div>
    </div>
@endsection
