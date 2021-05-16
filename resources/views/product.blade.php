@extends('layouts.master')

@section('title', 'Товар')

@section('content')
    <h1>iPhone X 64GB</h1>
    <h2>{{ $product }}</h2>
    <p>Цена: <b>{{$product->price}} ₽</b></p>
    <img src="{{Storage::url($product->image)}}">
    <p>Отличный продвинутый телефон с памятью на 64 gb</p>

    <form action="http://internet-shop.tmweb.ru/basket/add/1" method="POST">
        <button type="submit" class="btn btn-success" role="button">Добавить в корзину</button>

        <input type="hidden" name="_token" value="kl4dkt26jzaasYQBTpBYO9myFLI2ewKz22h3ZOix">
    </form>
@endsection
