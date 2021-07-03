@extends('layouts.master')

@section('title', 'Товар')

@section('content')
    <div class="labels">
        @if ($product->isNew())
            <span class="badge badge-success">Новинка</span>
        @endif
        @if ($product->isRecommend())
            <span class="badge badge-warning">Рекомендуемые</span>

        @endif
        @if ($product->isHit())
            <span class="badge badge-danger">Хит</span>

        @endif
    </div>
    <h1>{{ $product->name }}</h1>
    <p>Цена: <b>{{ $product->price }} ₽</b></p>
    <img src="{{ Storage::url($product->image) }}">
    <p>{{ $product->description }}</p>
    @if ($product->isAvailable())
        <form action="{{ route('basket-add', $product) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-success" role="button">Добавить в корзину</button>
        </form>
    @else
        <div class="alert-danger">Товар не доступен</div>
        <br>
        @if (Auth::user())
            @if (Auth::user()->products()->find($product->id))
                <span class="btn-success">Вы подписаны</span>
                <form method="POST" action="{{ route('unsubscribe', $product->id) }}">
                    @csrf
                    <button type="submit" class="btn btn-danger" role="button">Отписаться</button>
                </form>
            @else
                <form method="POST" action="{{ route('subscription', $product->id) }}">
                    @csrf
                    <button type="submit" class="btn btn-success" role="button">В желаемое</button>
                </form>
            @endif
        @else
            <form method="POST" action="{{ route('subscription', $product->id) }}">
                @csrf
                <button type="submit" class="btn btn-success" role="button">В желаемое</button>
            </form>
        @endif
    @endif
@endsection
